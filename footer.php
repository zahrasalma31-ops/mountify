<!-- FOOTER UTAMA -->
<div class="footer-main container-fluid">
    <div class="container">
        <div class="row gy-4">

            <!-- KOLOM 1 – MOUNTIFY OUTDOOR -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 footer-col">
                <h3 class="footer-brand-name mb-3">Mountify Outdoor</h3>

                <img src="image/logoutama.png"
                     alt="Mountify Outdoor"
                     class="footer-logo mb-3">

                <ul class="list-unstyled footer-info">
                    <li class="mb-1">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Jl. Banjarsari No. 27, Tembalang – Semarang
                    </li>
                    <li class="mb-1">
                        <i class="fas fa-clock me-2"></i>
                        Senin – Jumat: 08.00 – 20.00 WIB
                    </li>
                    <li class="mb-1 ps-4">
                        Sabtu – Minggu &amp; Hari Libur: 06.00 – 21.00 WIB
                    </li>
                    <li class="mb-1">
                        <i class="fas fa-envelope me-2"></i>
                        mountifyoutdoor@gmail.com
                    </li>
                </ul>
            </div>

            <!-- KOLOM 2 – HELP (TAB DI TENTANG-KAMI.PHP) -->
            <div class="col-lg-2 col-md-3 col-sm-6 col-12 footer-col">
                <h5 class="footer-title">Help</h5>
                <ul class="footer-links list-unstyled">
                    <li><a href="tentang-kami.php#rent">Rent</a></li>
                    <li><a href="tentang-kami.php#tnc">Terms &amp; Conditions</a></li>
                    <li><a href="tentang-kami.php#returns">Returns</a></li>
                    <li><a href="tentang-kami.php#operational">Operational</a></li>
                </ul>
            </div>

            <!-- KOLOM 3 – ABOUT MOUNTIFY (SECTION DI INDEX.PHP) -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 footer-col">
                <h5 class="footer-title">About Mountify</h5>
                <ul class="footer-links list-unstyled">
                    <li><a href="index.php#about-section">About Us</a></li>
                </ul>
            </div>

            <!-- KOLOM 4 – FIND US (SOSMED) -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 footer-col">
                <h5 class="footer-title">Find Us</h5>
                <div class="d-flex gap-3 footer-sosmed mt-2">
                    <a href="https://wa.me/628988712806?text=Hai%20saya%20ingin%20booking%20produk%20"><i class="fab fa-whatsapp"></i></a>
                    <a href="http://instagram.com/zahramylndaaa"><i class="fab fa-instagram"></i></a>
                    <a href="http://x.com/vegarchive"><i class="fab fa-twitter"></i></a>
                    <a href="http://www.tiktok.com/@favviftiesz"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- FOOTER BAWAH -->
<div class="footer-bottom container-fluid">
    <div class="container d-flex justify-content-between">
        <span>&copy; 2025 Mountify Outdoor</span>
        <span>Created by Kelompok 2</span>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const nav = document.querySelector('.custom-navbar');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 40) {
            nav.classList.add('navbar-scrolled');
        } else {
            nav.classList.remove('navbar-scrolled');
        }
    });
});
</script>

