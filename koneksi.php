<?php
  $con = mysqli_connect("localhost", "root", "", "mountify_outdoor");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "❌ Koneksi ke database gagal: " . mysqli_connect_error();
    exit();
  }
?>
