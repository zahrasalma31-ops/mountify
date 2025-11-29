<?php
// adminpanel/booking-update-status.php

// kalau pakai session admin:
# require "session.php";

session_start();
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_booking = isset($_POST['id_booking']) ? (int)$_POST['id_booking'] : 0;
    $status     = isset($_POST['status']) ? $_POST['status'] : '';

    // Amankan input status, hanya boleh 3 nilai ini:
    $allowed = ['Processing', 'Confirmed', 'Completed', 'Cancelled'];
    if (!in_array($status, $allowed)) {
        $status = 'Processing';
    }

    $statusEsc = mysqli_real_escape_string($con, $status);

    if ($id_booking > 0) {
        $update = mysqli_query(
            $con,
            "UPDATE booking 
             SET status = '$statusEsc' 
             WHERE id_booking = $id_booking"
        );
    }
}

// setelah update, balik lagi ke daftar booking dengan pesan
header("Location: booking-list.php?msg=updated");
exit();
