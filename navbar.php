<?php
// pastikan session ada, supaya bisa baca $_SESSION['user_id'], $_SESSION['username']
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark warna1 custom-navbar
    <?php
        if (isset($forceSolidNavbar) && $forceSolidNavbar) {
            echo ' navbar-solid';
        }
    ?>
">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            <!-- LEFT MENU -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-4">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="produk.php">Product</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="tentang-kami.php">Help</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="kontak.php">Contact</a>
                </li>
            </ul>

            <!-- RIGHT MENU -->
            <div class="d-flex align-items-center gap-4">

                <?php if (!isset($_SESSION['user_id'])) { ?>
                    <!-- BELUM LOGIN: tampilkan link Login biasa -->
                    <a href="login.php" class="nav-link d-flex align-items-center">
                        <i class="fas fa-user"></i>
                        <span class="ms-2">Login</span>
                    </a>
                <?php } else { ?>
                    <!-- SUDAH LOGIN: tampilkan dropdown nama user -->
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center"
                           href="#"
                           id="userDropdown"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <span class="ms-2"><?= htmlspecialchars($_SESSION['username']); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="riwayat-booking.php">
                                    Riwayat Booking
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="logout.php">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>

                <!-- Keranjang DIHILANGKAN sesuai permintaan, jadi tak ada apa-apa lagi di kanan -->
            </div>

        </div>
    </div>
</nav>
