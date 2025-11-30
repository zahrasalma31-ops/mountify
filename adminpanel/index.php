<?php
require "session.php";
require "../koneksi.php";

// ambil data summary
$queryKategori   = mysqli_query($con, "SELECT id FROM kategori");
$jumlahKategori  = mysqli_num_rows($queryKategori);

$queryProduk     = mysqli_query($con, "SELECT id FROM produk");
$jumlahProduk    = mysqli_num_rows($queryProduk);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Mountify</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <!-- kalau mau ikut font & tone umum, bisa pakai style utama juga -->
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7f3;
        }

        /* ====== SUMMARY CARD ala Mountify ====== */
        .summary-card {
            border-radius: 20px;
            padding: 22px 26px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 14px 35px rgba(0, 0, 0, 0.10);
            border: 1px solid rgba(255,255,255,0.12);
        }

        .summary-card--kategori {
            background: #294B29;       /* warna1 */
        }

        .summary-card--produk {
            background: #0b4c6a;       /* sejenis biru kehijauan, mirip tone produk */
        }

        .summary-icon {
            font-size: 52px;
            opacity: 0.16;
        }

        .summary-text h3 {
            font-size: 1.7rem;
            font-weight: 650;
            margin-bottom: 4px;
        }

        .summary-text p {
            margin: 0;
            font-size: 1rem;
        }

        .summary-link {
            margin-top: 10px;
            font-size: 0.9rem;
            display: inline-block;
            color: #DBE7C9;              /* warna4 hijau muda */
            text-decoration: none;
            font-weight: 500;
        }

        .summary-link:hover {
            color: #EEC373;              /* kuning soft seperti di footer */
            text-decoration: underline;
        }

        /* breadcrumb + judul biar mirip help / section lain */
        .admin-breadcrumb {
            font-size: 0.9rem;
            color: #6b7280;
        }

        .admin-title {
            font-size: 2rem;
            font-weight: 700;
            color: #294B29;
        }
    </style>
</head>
<body>

<?php require "navbar.php"; ?>

<div class="container mt-4 mb-5">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item active admin-breadcrumb" aria-current="page">
                <i class="fas fa-home me-1"></i> Home
            </li>
        </ol>
    </nav>

    <!-- Greeting -->
    <h2 class="admin-title mb-4">
        Halo <?= htmlspecialchars($_SESSION['username']); ?>
    </h2>

    <!-- Summary cards -->
    <div class="row g-4">
        <!-- Kategori -->
        <div class="col-lg-6 col-md-6 col-12">
            <a href="kategori.php" class="text-decoration-none">
                <div class="summary-card summary-card--kategori">
                    <div class="summary-text">
                        <h3>Kategori</h3>
                        <p><?= $jumlahKategori; ?> Kategori</p>
                        <span class="summary-link">Lihat Detail →</span>
                    </div>
                    <div class="summary-icon">
                        <i class="fas fa-stream"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Produk -->
        <div class="col-lg-6 col-md-6 col-12">
            <a href="produk.php" class="text-decoration-none">
                <div class="summary-card summary-card--produk">
                    <div class="summary-text">
                        <h3>Produk</h3>
                        <p><?= $jumlahProduk; ?> Produk</p>
                        <span class="summary-link">Lihat Detail →</span>
                    </div>
                    <div class="summary-icon">
                        <i class="fas fa-box"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
</body>
</html>