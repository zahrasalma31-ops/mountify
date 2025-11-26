<?php
require "session.php";
require "../koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: kontak.php");
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($con, "DELETE FROM kontak WHERE id='$id'");

if ($query) {
    header("Location: kontak.php?hapus=success");
} else {
    header("Location: kontak.php?hapus=failed");
}
