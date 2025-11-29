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
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-9">

                <!-- tagline kecil hijau -->
                <p class="hero-kicker">MOUNTIFY OUTDOOR</p>

                <!-- judul besar -->
                <h1 class="hero-title">
                    Gear Up for Your <br>
                    Next Adventure.
                </h1>

                <!-- badge benefit -->
                <span class="hero-badge">
                    <div class="hero-icon-circle">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    Fully-Updated Gear
                </span>

                <span class="hero-badge">
                    <div class="hero-icon-circle">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    Quick &amp; Easy Rental
                </span>

                <span class="hero-badge">
                    <div class="hero-icon-circle">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    Tembalang Exclusive Service
                </span>


                <!-- search bar versi baru -->
                <form method="get" action="produk.php" class="hero-search">
                    <div class="input-group input-group-lg">
                        <input
                            type="text"
                            class="form-control hero-search-input"
                            placeholder="What Are You Looking For?"
                            aria-label="Search product"
                            name="keyword"
                        >
                        <button type="submit" class="btn warna2 text-white hero-search-btn">
                            Find
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



        <!-- PILIHAN BRAND (SLIDER) -->
    <div class="container-fluid brand-section py-5">
    <div class="container">
        <h2 class="brand-title">Brand Collection</h2>
        <p class="brand-subtitle">
            Handpicked from top brands for the best experience.
        </p>
    </div>

        <div class="brand-marquee">
            <div class="brand-track">
                <!-- 1 set logo -->
                <div class="brand-card">
                    <img src="image/tnf.png" alt="The North Face">
                </div>
                <div class="brand-card">
                    <img src="image/rei.png" alt="Rei">
                </div>
                <div class="brand-card">
                    <img src="image/salomon.png" alt="Salomon">
                </div>
                <div class="brand-card">
                    <img src="image/osprey.png" alt="Osprey">
                </div>
                <div class="brand-card">
                    <img src="image/quechua.jpeg" alt="Quechua">
                </div>
                <div class="brand-card">
                    <img src="image/eiger.jpg" alt="Eiger">
                </div>
                <div class="brand-card">
                    <img src="image/ortuseight.png" alt="Ortuseight">
                </div>
                <div class="brand-card">
                    <img src="image/naturehike.png" alt="Nature Hike">
                </div>
                <div class="brand-card">
                    <img src="image/hoka.png" alt="Hoka">
                </div>
                <div class="brand-card">
                    <img src="image/greenforest.jpg" alt="Greenforest">
                </div>
                <div class="brand-card">
                    <img src="image/credifox.jpg" alt="Credifox">
                </div>
                <div class="brand-card">
                    <img src="image/consina.png" alt="Consina">
                </div>
                <div class="brand-card">
                    <img src="image/carumby.png" alt="Carumby">
                </div>
                <div class="brand-card">
                    <img src="image/bogaboo.png" alt="Bogaboo">
                </div>
                <div class="brand-card">
                    <img src="image/bigarmour.png" alt="Bigarmour">
                </div>
                <div class="brand-card">
                    <img src="image/aonijie.png" alt="Aonijie">
                </div>
                <div class="brand-card">
                    <img src="image/antarestar.png" alt="Antarestar">
                </div>
                <div class="brand-card">
                    <img src="image/altitude.png" alt="Altitude Gear">
                </div>
                <div class="brand-card">
                    <img src="image/910.png" alt="910 Nineteen">
                </div>

                <!-- duplikat 1 set yang sama biar looping-nya halus -->
                <div class="brand-card">
                    <img src="image/tnf.png" alt="The North Face">
                </div>
                <div class="brand-card">
                    <img src="image/rei.png" alt="Rei">
                </div>
                <div class="brand-card">
                    <img src="image/salomon.png" alt="Salomon">
                </div>
                <div class="brand-card">
                    <img src="image/osprey.png" alt="Osprey">
                </div>
                <div class="brand-card">
                    <img src="image/quechua.jpeg" alt="Quechua">
                </div>
                <div class="brand-card">
                    <img src="image/eiger.jpg" alt="Eiger">
                </div>
                <div class="brand-card">
                    <img src="image/ortuseight.png" alt="Ortuseight">
                </div>
                <div class="brand-card">
                    <img src="image/naturehike.png" alt="Nature Hike">
                </div>
                <div class="brand-card">
                    <img src="image/hoka.png" alt="Hoka">
                </div>
                <div class="brand-card">
                    <img src="image/greenforest.jpg" alt="Greenforest">
                </div>
                <div class="brand-card">
                    <img src="image/credifox.jpg" alt="Credifox">
                </div>
                <div class="brand-card">
                    <img src="image/consina.png" alt="Consina">
                </div>
                <div class="brand-card">
                    <img src="image/carumby.png" alt="Carumby">
                </div>
                <div class="brand-card">
                    <img src="image/bogaboo.png" alt="Bogaboo">
                </div>
                <div class="brand-card">
                    <img src="image/bigarmour.png" alt="Bigarmour">
                </div>
                <div class="brand-card">
                    <img src="image/aonijie.png" alt="Aonijie">
                </div>
                <div class="brand-card">
                    <img src="image/antarestar.png" alt="Antarestar">
                </div>
                <div class="brand-card">
                    <img src="image/altitude.png" alt="Altitude Gear">
                </div>
                <div class="brand-card">
                    <img src="image/910.png" alt="910 Nineteen">
                </div>
            </div>
        </div>
    </div>


    <!-- highlighted kategori -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3 class="top-picks-title">Top Picks</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-sepatu d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="no-decoration" href="produk.php?kategori=Sepatu Hiking">Hiking Shoes</a>
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
                            <a class="no-decoration" href="produk.php?kategori=Tenda">Tent</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tentang kami -->
    <div id="about-section" class="container-fluid warna3 py-5">
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
