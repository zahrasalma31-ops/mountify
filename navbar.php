<?php
// pastikan session ada, supaya bisa baca $_SESSION['user_id'], $_SESSION['username']
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// hitung jumlah item di cart
$cartCount = 0;
if (!empty($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cartCount += isset($item['qty']) ? (int)$item['qty'] : 1;
    }
}
?>

<nav class="navbar navbar-expand-lg navbar-dark warna1 custom-navbar<?php
    // kalau halaman minta navbar solid
    if (isset($forceSolidNavbar) && $forceSolidNavbar) {
        echo ' navbar-solid';
    }
?>">
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

                <!-- CART ICON -->
                <a href="cart.php" class="nav-link cart-link position-relative">
                    <i class="fas fa-shopping-cart cart-icon"></i>
                    <span class="cart-badge"><?= $cartCount; ?></span>
                </a>

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
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="logout.php">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>

            </div>

        </div>
    </div>
</nav>
