<?php
require "koneksi.php";

// Pastikan parameter id ada
if (!isset($_GET['id'])) {
    header("Location: produk.php");
    exit();
}

// Ambil data produk berdasarkan ID
$id = intval($_GET['id']);
$queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE id = $id");
$produk = mysqli_fetch_assoc($queryProduk);

// Jika produk tidak ditemukan
if (!$produk) {
    echo "<h1>Produk tidak ditemukan</h1>";
    exit();
}

// Produk terkait berdasarkan kategori_id
$queryProdukTerkait = mysqli_query(
    $con,
    "SELECT * FROM produk 
     WHERE kategori_id = {$produk['kategori_id']} AND id != $id 
     LIMIT 4"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mountify | Detail Produk</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">

  <style>
    .booking-btn {
      display: inline-block;
      background-color: #436d61;
      color: white;
      text-align: center;
      padding: 12px 40px;
      border: none;
      border-radius: 50px;
      font-size: 18px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }
    .booking-btn:hover {
      background-color: #355a50;
      color: #fff;
      text-decoration: none;
    }
  </style>
</head>

<body>
<?php require "navbar.php"; ?>

<!-- Detail Produk -->
<div class="container-fluid py-5">
  <div class="container">
    <div class="row">

      <div class="col-lg-5 mb-5">
        <img src="image/<?= $produk['foto']; ?>" class="w-100" alt="">
      </div>

      <div class="col-lg-6 offset-lg-1">
        <h1 class="product-title"><?= $produk['nama']; ?></h1>

        <p class="fs-5" style="text-align: justify;">
          <?= nl2br($produk['detail']); ?>
        </p>

        <p class="text-harga">
          Rp <?= number_format($produk['harga'], 0, ',', '.'); ?>
        </p>

        <p class="fs-5">
          Status Ketersediaan: <strong><?= $produk['ketersediaan_stok']; ?></strong>
        </p>

        <!-- Tombol booking -->
        <a 
          href="https://wa.me/628988712806?text=Hai%20saya%20ingin%20booking%20produk%20<?= urlencode($produk['nama']); ?>" 
          target="_blank"
          class="booking-btn">
          Booking
        </a>
      </div>

    </div>
  </div>
</div>

<!-- Produk Terkait -->
<div class="container-fluid py-5 warna2">
  <div class="container">
    <h2 class="text-center text-white mb-5">Produk Terkait</h2>

    <div class="row">
      <?php while ($data = mysqli_fetch_assoc($queryProdukTerkait)) { ?>
        <div class="col-md-6 col-lg-3 mb-3">
          <a href="produk-detail.php?id=<?= $data['id']; ?>">
            <img src="image/<?= $data['foto']; ?>" 
                 class="img-fluid img-thumbnail produk-terkait-image" 
                 alt="">
          </a>
        </div>
      <?php } ?>
    </div>

  </div>
</div>


<?php require "footer.php"; ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>

</body>
</html>