<?php
session_start();
require "koneksi.php";

/**
 * 1. Kalau belum login → simpan data booking sementara, lalu paksa login
 */
if (!isset($_SESSION['user_id'])) {

    // simpan data dari form ke session (kalau ada)
    if (!empty($_POST)) {
        $_SESSION['pending_booking'] = $_POST;
    }

    header("Location: login.php");
    exit();
}

// sudah login
$id_user = $_SESSION['user_id'];

/**
 * 2. Ambil data booking
 *    - pertama coba dari $_POST
 *    - kalau kosong (misalnya habis login), ambil dari $_SESSION['pending_booking']
 */
$data = $_POST;

if (empty($data) && isset($_SESSION['pending_booking'])) {
    $data = $_SESSION['pending_booking'];
    unset($_SESSION['pending_booking']); // hapus supaya tidak kepakai lagi
}

if (empty($data)) {
    echo "Data booking tidak ditemukan.";
    exit();
}

$id_produk   = (int)$data['id_produk'];
$tgl_ambil   = $data['tgl_ambil'];
$durasi_hari = (int)$data['durasi_hari'];
$tgl_kembali = $data['tgl_kembali'];

// 3. Ambil data produk
$qProduk = mysqli_query($con, "SELECT nama, harga FROM produk WHERE id = $id_produk");
$produk  = mysqli_fetch_assoc($qProduk);

if (!$produk) {
    echo "Produk tidak ditemukan.";
    exit();
}

$harga_per_hari = (int)$produk['harga'];
$total_biaya    = $harga_per_hari * $durasi_hari;

// 4. Ambil data user (untuk pesan WA)
$qUser = mysqli_query($con, "SELECT username, email FROM users WHERE id = $id_user");
$user  = mysqli_fetch_assoc($qUser);

// 5. Generate kode booking
$kode_booking = 'BK-' . date('YmdHis');

// 6. Simpan ke tabel booking
$created_at = date('Y-m-d H:i:s');
$status     = 'Processing';

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
    '$total_biaya',
    '$status',
    '$created_at'
)");

// 7. Siapkan pesan WA
$noWaAdmin = '628988712806'; 

$pesan  = "Halo admin Mountify,\n\n";
$pesan .= "Saya ingin melakukan booking peralatan outdoor dengan detail berikut:\n\n";

$pesan .= "Data Pemesan\n";
$pesan .= "- Nama          : {$user['username']}\n\n";

$pesan .= "Detail Booking\n";
$pesan .= "- Kode Booking  : $kode_booking\n";
$pesan .= "- Produk        : {$produk['nama']}\n";
$pesan .= "- Tanggal Ambil : " . date("d M Y", strtotime($tgl_ambil)) . "\n";
$pesan .= "- Tanggal Kembali: " . date("d M Y", strtotime($tgl_kembali)) . "\n";
$pesan .= "- Durasi Sewa   : {$durasi_hari} hari\n";
$pesan .= "- Total Biaya   : Rp " . number_format($total_biaya, 0, ',', '.') . "\n\n";

$pesan .= "Mohon konfirmasi ketersediaan barang dan instruksi pembayarannya. Terima kasih.";


// 8. Redirect ke WhatsApp
$waUrl = "https://wa.me/$noWaAdmin?text=" . urlencode($pesan);
header("Location: $waUrl");
exit();
