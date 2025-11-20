<?php
	require "koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

    // get produk by nama produk/keyword
    if(isset($_GET['keyword'])){
        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
    }
    // get produk by kategori
    else if(isset($_GET['kategori'])){
        $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
        $kategoriId = mysqli_fetch_array($queryGetKategoriId);

        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
    }
    // get produk default
    else{
        $queryProduk = mysqli_query($con, "SELECT * FROM produk");
    } 
    
    $countData = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mountify | Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid banner-produk d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Produk</h1>
        </div>
    </div>

    <!-- body -->
    <!-- Kategori Bar -->
    <div class="kategori-container">
        <a href="produk.php" class="kategori-btn <?= $kategoriDipilih == "" ? 'active' : '' ?>">Semua</a>

        <?php while ($kategori = mysqli_fetch_assoc($queryKategori)) { ?>
            <a href="produk.php?kategori=<?= $kategori['kategori_id']; ?>"
            class="kategori-btn <?= $kategoriDipilih == $kategori['kategori_id'] ? 'active' : '' ?>">
            <?= strtoupper($kategori['nama']); ?>
            </a>
        <?php } ?>
    </div>


    <!-- Produk List -->
    <div class="produk-grid">
        <?php while ($produk = mysqli_fetch_assoc($queryProduk)) { ?>
            <div class="produk-card">
                
                <img src="image/<?= $produk['foto']; ?>" class="produk-img" alt="Produk">

                <h4 class="produk-nama"><?= $produk['nama']; ?></h4>

                <p class="produk-harga">Rp<?= number_format($produk['harga'], 0, ',', '.'); ?></p>

                <a href="produk-detail.php?id=<?= $produk['id']; ?>" class="btn-lihat">Lihat</a>
            </div>
        <?php } ?>
    </div>

    <!-- footer -->
    <?php require "footer.php"; ?>

    <script src=”bootstrap/js/bootstrap.bundle.min.js”></script>
	<script src=”fontawesome/js/all.min.js”></script>
</body>
</html>