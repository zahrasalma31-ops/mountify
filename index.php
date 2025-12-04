<?php
    require "koneksi.php";
    // ambil beberapa produk untuk ditampilkan di home
    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 8");
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
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

    <?php require 'navbar.php'; ?>

    <!-- HERO BANNER-->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-9">

                    <!-- tagline kecil hijau -->
                    <p class="hero-kicker hero-anim hero-anim-1">MOUNTIFY OUTDOOR</p>

                    <!-- judul besar -->
                    <h1 class="hero-title hero-anim hero-anim-2">
                        Gear Up for Your <br>
                        Next Adventure.
                    </h1>

                    <!-- badges benefit (dibungkus .hero-badges agar CSS kepakai) -->
                    <div class="hero-badges hero-anim hero-anim-3">
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
                    </div>

                    <!-- search bar -->
                    <form method="get" action="produk.php" class="hero-search mt-4 hero-anim hero-anim-4">
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

    <!-- BRAND MARQUEE -->
    <div class="container-fluid brand-section py-5">
        <div class="container reveal-on-scroll">
            <h2 class="brand-title">Brand Collection</h2>
            <p class="brand-subtitle">
                Handpicked from top brands for the best experience.
            </p>
        </div>

        <div class="brand-marquee">
            <div class="brand-track">
                <!-- satu set logo -->
                <div class="brand-card"><img src="image/tnf.png" alt="The North Face"></div>
                <div class="brand-card"><img src="image/rei.png" alt="Rei"></div>
                <div class="brand-card"><img src="image/salomon.png" alt="Salomon"></div>
                <div class="brand-card"><img src="image/osprey.png" alt="Osprey"></div>
                <div class="brand-card"><img src="image/quechua.jpeg" alt="Quechua"></div>
                <div class="brand-card"><img src="image/eiger.jpg" alt="Eiger"></div>
                <div class="brand-card"><img src="image/ortuseight.png" alt="Ortuseight"></div>
                <div class="brand-card"><img src="image/naturehike.png" alt="Nature Hike"></div>
                <div class="brand-card"><img src="image/hoka.png" alt="Hoka"></div>
                <div class="brand-card"><img src="image/greenforest.jpg" alt="Greenforest"></div>
                <div class="brand-card"><img src="image/credifox.jpg" alt="Credifox"></div>
                <div class="brand-card"><img src="image/consina.png" alt="Consina"></div>
                <div class="brand-card"><img src="image/carumby.png" alt="Carumby"></div>
                <div class="brand-card"><img src="image/bogaboo.png" alt="Bogaboo"></div>
                <div class="brand-card"><img src="image/bigarmour.png" alt="Bigarmour"></div>
                <div class="brand-card"><img src="image/aonijie.png" alt="Aonijie"></div>
                <div class="brand-card"><img src="image/antarestar.png" alt="Antarestar"></div>
                <div class="brand-card"><img src="image/altitude.png" alt="Altitude Gear"></div>
                <div class="brand-card"><img src="image/910.png" alt="910 Nineteen"></div>

                <!-- duplikat biar looping animasi halus -->
                <div class="brand-card"><img src="image/tnf.png" alt="The North Face"></div>
                <div class="brand-card"><img src="image/rei.png" alt="Rei"></div>
                <div class="brand-card"><img src="image/salomon.png" alt="Salomon"></div>
                <div class="brand-card"><img src="image/osprey.png" alt="Osprey"></div>
                <div class="brand-card"><img src="image/quechua.jpeg" alt="Quechua"></div>
                <div class="brand-card"><img src="image/eiger.jpg" alt="Eiger"></div>
                <div class="brand-card"><img src="image/ortuseight.png" alt="Ortuseight"></div>
                <div class="brand-card"><img src="image/naturehike.png" alt="Nature Hike"></div>
                <div class="brand-card"><img src="image/hoka.png" alt="Hoka"></div>
                <div class="brand-card"><img src="image/greenforest.jpg" alt="Greenforest"></div>
                <div class="brand-card"><img src="image/credifox.jpg" alt="Credifox"></div>
                <div class="brand-card"><img src="image/consina.png" alt="Consina"></div>
                <div class="brand-card"><img src="image/carumby.png" alt="Carumby"></div>
                <div class="brand-card"><img src="image/bogaboo.png" alt="Bogaboo"></div>
                <div class="brand-card"><img src="image/bigarmour.png" alt="Bigarmour"></div>
                <div class="brand-card"><img src="image/aonijie.png" alt="Aonijie"></div>
                <div class="brand-card"><img src="image/antarestar.png" alt="Antarestar"></div>
                <div class="brand-card"><img src="image/altitude.png" alt="Altitude Gear"></div>
                <div class="brand-card"><img src="image/910.png" alt="910 Nineteen"></div>
            </div>
        </div>
    </div>

    <!-- TOP PICKS (HIGHLIGHTED CATEGORY) -->
    <div class="container-fluid py-5">
        <div class="container text-center reveal-on-scroll">
            <h3 class="top-picks-title reveal-on-scroll reveal-delay-1">Top Picks</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-sepatu d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="no-decoration" href="produk.php?kategori=4">Hiking Shoes</a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-carrier d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="no-decoration" href="produk.php?kategori=8">Carrier</a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-tenda d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="no-decoration" href="produk.php?kategori=7">Tent</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ABOUT US -->
    <div id="about-section" class="container-fluid warna3 py-5">
        <div class="container">

            <!-- Judul + subjudul -->
            <div class="text-center mb-5 reveal-on-scroll">
                <p class="about-kicker">ABOUT MOUNTIFY</p>
                <h3 class="about-title">Practical Adventure Made Simple</h3>
                <p class="about-subtitle">
                    Gear rental made easy for students, hikers, and nature lovers in Tembalang, Semarang.
                </p>
            </div>

            <div class="row align-items-center gy-4">
                <!-- KIRI: cerita singkat -->
                <div class="col-lg-6">
                    <p class="about-text">
                        Mountify is your go-to place for practical, ready-to-use outdoor gear. 
                        We offer easy and affordable rentals so you can step into nature without 
                        carrying the extra weight — literally and figuratively.
                    </p>
                    <p class="about-text">
                        We’re based in Tembalang, Semarang, and built for students, weekend hikers, 
                        and anyone who wants to explore more with the right equipment, not with a burden.
                    </p>

                    <div class="about-pill-wrap">
                        <span class="about-pill">Student Friendly</span>
                        <span class="about-pill">Quality Gear</span>
                        <span class="about-pill">Tembalang Area</span>
                    </div>
                </div>

                <!-- KANAN: kartu Why Mountify -->
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="about-card">
                                <i class="fas fa-mountain about-icon"></i>
                                <h5>Curated Gear</h5>
                                <p>Only trusted outdoor brands, checked and cleaned before every trip.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-card">
                                <i class="fas fa-clock about-icon"></i>
                                <h5>Simple Booking</h5>
                                <p>Chat, pick your date, and your gear is ready when you are.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-card">
                                <i class="fas fa-users about-icon"></i>
                                <h5>For Campus & Crew</h5>
                                <p>Perfect for college trips, hiking clubs, and small group adventures.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-card">
                                <i class="fas fa-leaf about-icon"></i>
                                <h5>Rent, Not Buy</h5>
                                <p>Save money, save space, and reduce unused gear at home.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- How it works -->
            <div class="about-steps mt-5 pt-4">
                <h5 class="text-center mb-4">How It Works</h5>
                <div class="row text-center g-4">
                    <div class="col-md-4">
                        <div class="about-step">
                            <span class="step-number">1</span>
                            <h6>Choose Your Gear</h6>
                            <p>Browse products and pick what you need for your next trip.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about-step">
                            <span class="step-number">2</span>
                            <h6>Set Your Dates</h6>
                            <p>Tell us when you’ll go, and we’ll prepare everything on time.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about-step">
                            <span class="step-number">3</span>
                            <h6>Pick Up & Go</h6>
                            <p>Grab your gear in Tembalang and enjoy your adventure.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- PRODUCT GRID  -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3 class="riwayat-title reveal-on-scroll">Product</h3>

            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryProduk)) { ?>
                    <div class="col-6 col-md-3 col-lg-3 mb-4">
                        <div class="produk-card">
                            <img src="image/<?= $data['foto']; ?>" 
                                 class="produk-img" 
                                 alt="<?= htmlspecialchars($data['nama']); ?>">

                            <h4 class="produk-nama">
                                <?= $data['nama']; ?>
                            </h4>

                            <p class="produk-harga">
                                Rp<?= number_format($data['harga'], 0, ',', '.'); ?>
                            </p>

                            <a href="produk-detail.php?id=<?= $data['id']; ?>" class="btn-lihat">
                                Detail
                            </a>
                        </div>
                    </div>
                <?php } ?>
                        </div>

            <a href="produk.php" class="btn-see-more mt-3">
                See More
            </a>
        </div>
    </div>

    <!-- FOOTER -->
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>

  <script>
document.addEventListener('DOMContentLoaded', function () {
    const revealEls = document.querySelectorAll('.reveal-on-scroll');

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal-visible');
                obs.unobserve(entry.target); // biar animasinya cuma sekali
            }
        });
    }, {
        threshold: 0.15  // bagian elemen yang kelihatan sebelum animasi jalan
    });

    revealEls.forEach(el => observer.observe(el));
});
</script>
  
</body>
</html>