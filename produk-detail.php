<?php
    require "koneksi.php";

    $nama = htmlspecialchars($_GET['nama']);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
    $produk = mysqli_fetch_array($queryProduk);

    $queryProdukTerkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' LIMIT 4");
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

  <!-- detail produk -->
  <div class="container-fluid py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 mb-5">
          <img src="image/<?php echo $produk['foto']; ?>" class="w-100" alt="">
        </div>

        <div class="col-lg-6 offset-lg-1">
          <h1 class="product-title"><?php echo $produk['nama']; ?></h1>
          <p class="fs-5" style="text-align: justify;">
            <?php echo nl2br ($produk['detail']); ?>
          </p>
          <p class="text-harga">
            Rp <?php echo $produk['harga']; ?>
          </p>
          <p class="fs-5">
            Status Ketersediaan:
            <strong><?php echo $produk['ketersediaan_stok']; ?></strong>
          </p>

          <!-- Tombol Booking -->
          <a 
            href="https://wa.me/628988712806?text=Hai%20saya%20ingin%20booking%20produk%20<?php echo urlencode($produk['nama']); ?>" 
            target="_blank"
            class="booking-btn">
            Booking
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- produk terkait -->
  <div class="container-fluid py-5 warna2">
    <div class="container">
      <h2 class="text-center text-white mb-5">Produk Terkait</h2>
      <div class="row">
        <?php while ($data = mysqli_fetch_array($queryProdukTerkait)) { ?>
          <div class="col-md-6 col-lg-3 mb-3">
            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>">
              <img src="image/<?php echo $data['foto']; ?>" class="img-fluid img-thumbnail produk-terkait-image" alt="">
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <!-- footer -->
  <?php require "footer.php"; ?>
  
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="fontawesome/js/all.min.js"></script>
</body>
</html>