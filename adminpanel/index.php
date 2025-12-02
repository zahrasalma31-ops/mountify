<?php
require "session.php";
require "../koneksi.php";

// Ambil data summary
$qKategori  = mysqli_query($con, "SELECT id FROM kategori");
$jumlahKategori = mysqli_num_rows($qKategori);

$qProduk    = mysqli_query($con, "SELECT id FROM produk");
$jumlahProduk   = mysqli_num_rows($qProduk);

$qBooking   = mysqli_query($con, "SELECT * FROM booking");
$jumlahBooking  = mysqli_num_rows($qBooking);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin | Mountify</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<?php require "navbar.php"; ?>

<div class="admin-page">

    <!-- HERO / HEADER HIJAU -->
    <section class="admin-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="admin-hero-title mb-2">
                        <i class="fas fa-mountain me-2"></i>
                        Dashboard Admin
                    </div>
                    <h1 class="admin-hero-greeting">
                        Halo, <?= htmlspecialchars($_SESSION['username']); ?> 👋
                    </h1>
                    <p class="admin-hero-text mt-2">
                        Kelola kategori, produk, booking, dan pesan dari satu tempat.
                        Semua yang kamu butuhkan untuk mengatur Mountify ada di sini.
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="admin-hero-stats">
                        <div class="stat-item">
                            <div class="stat-label">Kategori</div>
                            <div class="stat-value"><?= $jumlahKategori; ?></div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Produk</div>
                            <div class="stat-value"><?= $jumlahProduk; ?></div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Total Booking</div>
                            <div class="stat-value"><?= $jumlahBooking; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KONTEN PUTIH DI BAWAH HERO -->
    <section class="admin-main">
        <div class="container">

            <!-- BREADCRUMB KECIL -->
            <div class="d-flex align-items-center mb-3 admin-breadcrumb">
                <i class="fas fa-home me-2"></i>
                <span>Home</span>
            </div>

            <!-- QUICK ACTION TITLE -->
            <div class="d-flex justify-content-between align-items-end mb-3">
                <h2 class="admin-section-title mb-0">Quick Management</h2>
                <span class="admin-section-subtext">Akses cepat ke halaman pengelolaan utama</span>
            </div>

            <!-- CARD LINK 4 MENU UTAMA -->
            <div class="row g-4">
                <!-- Kategori -->
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <a href="kategori.php" class="admin-link-card">
                        <div class="admin-link-icon kategori">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="admin-link-body">
                            <h5>Kelola Kategori</h5>
                            <p>Tambah, ubah, dan hapus kategori perlengkapan.</p>
                        </div>
                        <div class="admin-link-footer">
                            <span>Lihat kategori</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                </div>

                <!-- Produk -->
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <a href="produk.php" class="admin-link-card">
                        <div class="admin-link-icon produk">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <div class="admin-link-body">
                            <h5>Kelola Produk</h5>
                            <p>Atur detail peralatan outdoor yang disewakan.</p>
                        </div>
                        <div class="admin-link-footer">
                            <span>Lihat produk</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                </div>

                <!-- Booking -->
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <a href="booking-list.php" class="admin-link-card">
                        <div class="admin-link-icon booking">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="admin-link-body">
                            <h5>Daftar Booking</h5>
                            <p>Lihat dan kelola permintaan booking penyewaan.</p>
                        </div>
                        <div class="admin-link-footer">
                            <span>Lihat booking</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                </div>

                <!-- Kontak -->
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <a href="kontak.php" class="admin-link-card">
                        <div class="admin-link-icon kontak">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <div class="admin-link-body">
                            <h5>Pesan Kontak</h5>
                            <p>Baca dan balas pesan dari pengunjung.</p>
                        </div>
                        <div class="admin-link-footer">
                            <span>Lihat pesan</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>

            <!-- OPTIONAL: PANEL INFO / CATATAN -->
            <div class="row g-4 mt-4">
                <div class="col-lg-8">
                    <div class="admin-info-card">
                        <div class="admin-info-header">
                            <i class="fas fa-info-circle me-2"></i>
                            <span>Tips Pengelolaan Booking</span>
                        </div>
                        <p class="mb-2">
                            Tandai booking dengan status <strong>processing</strong>, <strong>confirmed</strong>, atau
                            <strong>completed</strong> agar riwayat penyewaan pelanggan selalu jelas dan rapi.
                        </p>
                        <p class="mb-0">
                            Gunakan WhatsApp untuk konfirmasi cepat, lalu perbarui status booking di sistem agar
                            data tersinkron dengan riwayat booking user.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="admin-info-card admin-info-card--small">
                        <div class="admin-info-header">
                            <i class="fas fa-seedling me-2"></i>
                            <span>Mountify Snapshot</span>
                        </div>
                        <ul class="admin-info-list mb-0">
                            <li><strong><?= $jumlahKategori; ?></strong> kategori aktif</li>
                            <li><strong><?= $jumlahProduk; ?></strong> produk siap disewa</li>
                            <li><strong><?= $jumlahBooking; ?></strong> total booking tercatat</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
</body>
</html>