<?php
session_start();
require 'koneksi.php';

// (OPSIONAL TAPI DISARANKAN) - Wajib login dulu sebelum bisa add to cart
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// pastikan dari form
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: produk.php');
    exit();
}

// validasi basic input
if (
    !isset($_POST['id_produk'], $_POST['tgl_ambil'], $_POST['tgl_kembali'], $_POST['durasi_hari']) ||
    $_POST['tgl_ambil'] === '' ||
    $_POST['tgl_kembali'] === ''
) {
    // bisa kamu ganti dengan redirect + pesan error
    die('Data sewa tidak lengkap.');
}

$id_produk   = (int) $_POST['id_produk'];
$tgl_ambil   = $_POST['tgl_ambil'];    // format: YYYY-MM-DD
$tgl_kembali = $_POST['tgl_kembali'];  // format: YYYY-MM-DD
$durasi_hari = (int) $_POST['durasi_hari'];

// jaga-jaga kalau durasi <= 0
if ($durasi_hari < 1) {
    $durasi_hari = 1;
}

// ambil produk dari database
$q = mysqli_query($con, "SELECT * FROM produk WHERE id = $id_produk");
$produk = mysqli_fetch_assoc($q);

if (!$produk) {
    die('Produk tidak ditemukan.');
}

$harga    = (int) $produk['harga'];
$subtotal = $harga * $durasi_hari;

// kalau cart belum ada di session, buat array kosong
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

/*
    Cek dulu:
    - Kalau produk dengan tanggal sewa yang sama SUDAH ADA di cart,
      → tinggal tambahin qty + hitung ulang subtotal.
    - Kalau BELUM ADA,
      → push item baru ke array cart.
*/
$found = false;

foreach ($_SESSION['cart'] as &$item) {
    if (
        isset($item['id_produk'], $item['tgl_ambil'], $item['tgl_kembali']) &&
        $item['id_produk']   == $id_produk &&
        $item['tgl_ambil']   == $tgl_ambil &&
        $item['tgl_kembali'] == $tgl_kembali
    ) {
        // tambah qty
        $item['qty'] += 1;

        // subtotal = harga x durasi x qty
        $item['subtotal'] = $item['qty'] * $harga * $durasi_hari;

        $found = true;
        break;
    }
}
unset($item); // supaya referensi &$item gak kebawa

// kalau belum ada item yang sama di cart → tambah item baru
if (!$found) {
    $_SESSION['cart'][] = [
        'id_produk'   => $id_produk,
        'nama'        => $produk['nama'],   // kolom "nama" di tabel produk
        'foto'        => $produk['foto'],   // kolom "foto" di tabel produk
        'harga'       => $harga,
        'tgl_ambil'   => $tgl_ambil,
        'tgl_kembali' => $tgl_kembali,
        'durasi_hari' => $durasi_hari,
        'qty'         => 1,
        'subtotal'    => $subtotal,
    ];
}

// setelah masuk cart → arahkan ke halaman cart
header('Location: produk-detail.php?id=' . $id_produk . '&added=1');
exit();
