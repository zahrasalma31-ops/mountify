<?php
session_start();

// pastikan index dikirim
if (!isset($_GET['index'])) {
    header("Location: cart.php");
    exit();
}

$index = (int) $_GET['index'];

// hapus item dari cart jika ada
if (isset($_SESSION['cart'][$index])) {
    unset($_SESSION['cart'][$index]);  // ← INI YANG BENAR
    $_SESSION['cart'] = array_values($_SESSION['cart']); // reset index
}

header("Location: cart.php");
exit();
