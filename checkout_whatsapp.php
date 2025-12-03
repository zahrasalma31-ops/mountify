<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

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
$qUser = mysqli_query($con, "SELECT username FROM users WHERE id = $id_user");
$user  = mysqli_fetch_assoc($qUser);

// 4. Variabel awal
$noWaAdmin   = '628988712806';
$totalAll    = 0;
$detailPesan = "";
$no          = 1;
$now         = date('Y-m-d H:i:s');
$jumlahItem  = 0;

// 5. Loop item yang dipilih
foreach ($selectedIndexes as $idx) {
    if (!isset($cart[$idx])) continue;

    $item = $cart[$idx];

    $id_produk   = (int)$item['id_produk'];
    $tgl_ambil   = $item['tgl_ambil'];
    $tgl_kembali = $item['tgl_kembali'];
    $durasi_hari = (int)$item['durasi_hari'];
    $qty         = (int)$item['qty'];
    $subtotal    = (int)$item['subtotal'];

    $totalAll   += $subtotal;
    $jumlahItem++;

    // Ambil nama produk dari DB
    $qProduk = mysqli_query($con, "SELECT nama FROM produk WHERE id = $id_produk");
    $produk  = mysqli_fetch_assoc($qProduk);
    $namaProduk = $produk ? $produk['nama'] : $item['nama'];

    // Kode booking unik
    $kode_booking = 'BK-' . date('YmdHis') . sprintf('%02d', $idx);

    // Simpan ke DB
    mysqli_query($con, "INSERT INTO booking (
        kode_booking, id_user, id_produk, tgl_ambil, durasi_hari, tgl_kembali,
        total_biaya, status, created_at
    ) VALUES (
        '$kode_booking', '$id_user', '$id_produk', '$tgl_ambil', '$durasi_hari',
        '$tgl_kembali', '$subtotal', 'Processing', '$now'
    )");

    // Format detail barang (SAMA EXACT)
    $detailPesan .= "{$no}) {$kode_booking} — {$namaProduk}\n";
    $detailPesan .= "   Tgl ambil   : " . date('d M Y', strtotime($tgl_ambil)) . "\n";
    $detailPesan .= "   Tgl kembali : " . date('d M Y', strtotime($tgl_kembali)) . "\n";
    $detailPesan .= "   Durasi sewa : {$durasi_hari} day\n";
    $detailPesan .= "   Qty         : {$qty}\n";
    $detailPesan .= "   Subtotal    : Rp " . number_format($subtotal, 0, ',', '.') . "\n\n";

    $no++;
}

// 6. SUSUN PESAN FINAL EXACT SEPERTI TEMPLATE MU
$pesan  = "Halo admin Mountify!👋🏻\n";
$pesan .= "Saya ingin melakukan booking peralatan outdoor dengan detail berikut:\n\n";

$pesan .= "Nama Pemesan   : {$user['username']}\n\n";

$pesan .= "*Ringkasan Booking*\n";
$pesan .= "* Jumlah item   : {$jumlahItem} barang\n";
$pesan .= "* Total biaya   : Rp " . number_format($totalAll, 0, ',', '.') . "\n\n";

$pesan .= "*Detail Barang*\n";
$pesan .= $detailPesan;

$pesan .= "Mohon konfirmasi ketersediaan barang dan metode pembayarannya. Terima kasih!☺️";

// 7. Bersihkan cart dari item yang sudah di-checkout
foreach ($selectedIndexes as $idx) {
    unset($cart[$idx]);
}
$_SESSION['cart'] = array_values($cart);

// 8. Redirect ke WhatsApp
$waUrl = "https://wa.me/$noWaAdmin?text=" . urlencode($pesan);
header("Location: $waUrl");
exit();
