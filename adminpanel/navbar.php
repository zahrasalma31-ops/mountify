<nav class="navbar navbar-expand-lg admin-navbar">
    <div class="container">

        <button class="navbar-toggler border-0 shadow-none" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#adminNavbarMenu">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="adminNavbarMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kategori.php">
                        <i class="fas fa-layer-group"></i> Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produk.php">
                        <i class="fas fa-box-open"></i> Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="booking-list.php">
                        <i class="fas fa-clipboard-list"></i> Booking
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontak.php">
                        <i class="fas fa-envelope-open-text"></i> Kontak
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link logout-link" href="logout.php">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- SCRIPT NAVBAR SCROLL -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.querySelector('.admin-navbar');
    if (!navbar) return;

    function updateNavbar() {
        if (window.scrollY > 10) {
            navbar.classList.add('navbar-solid');
        } else {
            navbar.classList.remove('navbar-solid');
        }
    }

    window.addEventListener('scroll', updateNavbar);
    updateNavbar(); // cek sekali saat awal load
});
</script>