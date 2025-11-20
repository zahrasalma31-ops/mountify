<?php
require "koneksi.php";

// Ambil kategori
$queryKategori = mysqli_query($con, "SELECT * FROM kategori ORDER BY nama ASC");

// Ambil produk berdasarkan kondisi
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$keyword%'");
}
else if (isset($_GET['kategori'])) {
    $kategoriId = $_GET['kategori'];
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId'");
}
else {
    $queryProduk = mysqli_query($con, "SELECT * FROM produk ORDER BY id DESC");
}

$countData = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mountify | Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require "navbar.php"; ?>

<!-- Banner -->
<div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container">
        <h1 class="text-white text-center">Product</h1>
    </div>
</div>

<!-- Kategori Horizontal -->
<div class="kategori-container">
    <a href="produk.php" 
        class="kategori-btn <?= (!isset($_GET['kategori'])) ? 'active' : '' ?>">
        SEMUA
    </a>

    <?php while($kategori = mysqli_fetch_assoc($queryKategori)) { ?>
        <a href="produk.php?kategori=<?= $kategori['id']; ?>"
            class="kategori-btn <?= (isset($_GET['kategori']) && $_GET['kategori'] == $kategori['id']) ? 'active' : '' ?>">
            <?= strtoupper($kategori['nama']); ?>
        </a>
    <?php } ?>
</div>


<!-- Produk Grid -->
<div class="container py-5">
    <?php if ($countData < 1) { ?>
        <h3 class="text-center my-5">Produk tidak ditemukan</h3>
    <?php } ?>

    <div class="produk-grid">

        <?php while($produk = mysqli_fetch_assoc($queryProduk)) { ?>
            <div class="produk-card">

                <img src="image/<?= $produk['foto']; ?>" class="produk-img">

                <h4 class="produk-nama"><?= $produk['nama']; ?></h4>

                <p class="produk-harga">
                    Rp<?= number_format($produk['harga'], 0, ',', '.'); ?>
                </p>

                <a href="produk-detail.php?id=<?= $produk['id']; ?>" class="btn-lihat">
                    Lihat
                </a>

            </div>
        <?php } ?>

    </div>
</div>

<?php require "footer.php"; ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>

</body>
</html>