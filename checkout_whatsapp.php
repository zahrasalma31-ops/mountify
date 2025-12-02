<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

session_start();
require "koneksi.php";
session_start();
require "koneksi.php";

// 1. Wajib login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id_user = (int)$_SESSION['user_id'];
$cart    = $_SESSION['cart'] ?? [];

// 2. Ambil item yang dicentang
if (empty($_POST['selected']) || empty($cart)) {
    header("Location: cart.php");
    exit();
}

$selectedIndexes = array_map('intval', $_POST['selected']);

// 3. Ambil data user
$qUser = mysqli_query($con, "SELECT username, email FROM users WHERE id = $id_user");
$user  = mysqli_fetch_assoc($qUser);

// 4. Mulai pesan WA
$noWaAdmin = '628988712806';
$pesan  = "Halo admin Mountify,\n";
$pesan .= "Saya ingin booking beberapa alat outdoor:\n\n";

$totalAll = 0;
$now = date('Y-m-d H:i:s');

foreach ($selectedIndexes as $idx) {

    if (!isset($cart[$idx])) continue;
    $item = $cart[$idx];

    $id_produk   = (int)$item['id_produk'];
    $tgl_ambil   = $item['tgl_ambil'];
    $tgl_kembali = $item['tgl_kembali'];
    $durasi_hari = (int)$item['durasi_hari'];
    $qty         = (int)($item['qty'] ?? 1);
    $subtotal    = (int)$item['subtotal'];

    $totalAll += $subtotal;

    // Ambil nama produk dari DB
    $qProduk = mysqli_query($con, "SELECT nama FROM produk WHERE id = $id_produk");
    $produk  = mysqli_fetch_assoc($qProduk);
    $namaProduk = $produk ? $produk['nama'] : $item['nama'];

    // Kode booking unik
    $kode_booking = 'BK-' . date('YmdHis') . sprintf('%02d', $idx);

    // Simpan DB
    mysqli_query($con, "INSERT INTO booking (
        kode_booking,
        id_user,
        id_produk,
        tgl_ambil,
        durasi_hari,
        tgl_kembali,
        total_biaya,
        status,
        created_at
    ) VALUES (
        '$kode_booking',
        '$id_user',
        '$id_produk',
        '$tgl_ambil',
        '$durasi_hari',
        '$tgl_kembali',
        '$subtotal',
        'Processing',
        '$now'
    )");

    // Detail produk untuk WA
    $pesan .= "*$kode_booking* - $namaProduk\n";
    $pesan .= "Tgl ambil: " . date('d M Y', strtotime($tgl_ambil)) . "\n";
    $pesan .= "Tgl kembali: " . date('d M Y', strtotime($tgl_kembali)) . "\n";
    $pesan .= "Durasi: {$durasi_hari} day\n";
    $pesan .= "Qty: {$qty}\n";
    $pesan .= "Subtotal: Rp " . number_format($subtotal, 0, ',', '.') . "\n\n";
}

// === FIX: BAGIAN INI CUMA DITULIS SEKALI SAJA ===
$pesan .= "Total semua: *Rp " . number_format($totalAll, 0, ',', '.') . "*\n\n";
$pesan .= "Nama pemesan: {$user['username']}\n";
$pesan .= "Mohon konfirmasi ketersediaan dan metode pembayarannya ya. Terima kasih! 🙂";

// 7. Hapus item dari cart
foreach ($selectedIndexes as $idx) {
    if (isset($cart[$idx])) unset($cart[$idx]);
}
$_SESSION['cart'] = array_values($cart);

// 8. Redirect WA
$waUrl = "https://wa.me/$noWaAdmin?text=" . urlencode($pesan);
header("Location: $waUrl");
exit();
