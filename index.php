<?php
    require "koneksi.php";
    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mountify | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php require 'navbar.php'; ?>

    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Mountify Outdoor</h1>
            <h4>Find Your Adventure Essentials Here!</h4>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="What Are You Looking For?"
                            aria-label="Recipient's username" 
                            aria-describedby="basic-addon2" 
                            name="keyword"
                        >
                        <button type="submit" class="btn warna2 text-white">
                            Find
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- highlighted kategori -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Top Picks</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-sepatu d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="no-decoration" href="produk.php?kategori=Sepatu Hiking">Sepatu Hiking</a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-carrier d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="no-decoration" href="produk.php?kategori=Carrier">Carrier</a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-tenda d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="no-decoration" href="produk.php?kategori=Tenda">Tenda</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tentang kami -->
    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3>About Us</h3>
            <p class="fs-5 mt-3">
                Mountify is your go-to place for practical, ready-to-use outdoor gear.
                We offer easy and affordable gear rentals for anyone who wants to step into nature without the extra weight — literally and figuratively.

                Based in Tembalang, Semarang, we’re here for students, hikers, and nature lovers who believe that every journey begins with the right equipment, not with a burden.

                At Mountify, we like to say that adventures don’t need to be complicated — they just need a little courage and the right gear.
                That’s why we stand by our principle: “Practical Adventure Made Simple.”
            </p>
        </div>
    </div>

    <!-- produk -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Product</h3>

            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryProduk)) { ?>
                <div class="col-6 col-md-3 col-lg-3 mb-4">
                    <div class="card h-100">
                        <div class="image-box">
                            <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                            <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                            <p class="card-text text-harga">Rp<?= number_format($data['harga'], 0, ',', '.'); ?></p>
                            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn warna2 text-white">Detail</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a class="btn btn-outline-warning mt-3 p-1 fs-5" href="produk.php">See More</a>
        </div>
    </div>

    <!-- Footer -->
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html> 
