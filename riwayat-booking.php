<?php
session_start();
require "koneksi.php";

// wajib login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id_user = (int)$_SESSION['user_id'];

// Ambil semua booking milik user 
$sql = "
    SELECT b.*, p.nama AS nama_produk, p.foto AS foto_produk
    FROM booking b
    JOIN produk p ON b.id_produk = p.id
    WHERE b.id_user = $id_user
    ORDER BY b.created_at DESC
";
$queryBooking = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mountify | Booking History</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<?php $forceSolidNavbar = true; ?>
<?php require "navbar.php"; ?>

<div class="container py-5 mt-5 riwayat-wrapper">

    <!-- SWITCH CART / HISTORY -->
    <div class="cart-switch-wrapper">
        <a href="cart.php" class="cart-switch-btn">
            <i class="fas fa-shopping-cart me-2"></i>
            Booking Cart
        </a>
        <a href="riwayat-booking.php" class="cart-switch-btn active">
            <i class="fas fa-clock-rotate-left me-2"></i>
            Booking History
        </a>
    </div>

    <!-- JUDUL + SUBTITLE  -->
    <h1 class="riwayat-title mb-2 text-center">Booking History</h1>
    <p class="riwayat-subtitle text-center mb-4">
        Review all your past and ongoing bookings in one place.
    </p>

    <?php if (mysqli_num_rows($queryBooking) === 0) { ?>
        <div class="alert alert-info text-center mt-4">
            You don’t have any booking history yet.
        </div>
    <?php } else { ?>

        <!-- CARD PUTIH MENGELILINGI TABEL -->
        <div class="riwayat-card mt-3">
            <div class="table-responsive">
                <table class="table align-middle mb-0 riwayat-table">
                    <thead class="table-light">
                        <tr>
                            <th>Booking Code</th>
                            <th>Product</th>
                            <th class="text-center">Rental Date</th>
                            <th class="text-center">Return Date</th>
                            <th class="text-center">Duration</th>
                            <th class="text-center">Total Price</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_assoc($queryBooking)) { ?>
                        <tr>
                            <!-- KODE BOOKING -->
                            <td><?= htmlspecialchars($row['kode_booking']); ?></td>

                            <!-- PRODUK -->
                            <td>
                                <div class="d-flex align-items-center">
                                    <?php if (!empty($row['foto_produk'])) { ?>
                                        <img src="image/<?= htmlspecialchars($row['foto_produk']); ?>"
                                             alt=""
                                             style="width:50px;height:50px;object-fit:cover;"
                                             class="me-2 rounded">
                                    <?php } ?>
                                    <span><?= htmlspecialchars($row['nama_produk']); ?></span>
                                </div>
                            </td>

                            <!-- RENTAL DATE -->
                            <td class="text-center">
                                <?= date("d M Y", strtotime($row['tgl_ambil'])); ?>
                            </td>

                            <!-- RETURN DATE -->
                            <td class="text-center">
                                <?= date("d M Y", strtotime($row['tgl_kembali'])); ?>
                            </td>

                            <!-- DURATION  -->
                            <td class="text-center">
                                <?php
                                    $d = (int)$row['durasi_hari'];
                                    echo $d . ' day' . ($d > 1 ? 's' : '');
                                ?>
                            </td>

                            <!-- TOTAL PRICE -->
                            <td class="text-center">
                                Rp <?= number_format($row['total_biaya'], 0, ',', '.'); ?>
                            </td>

                            <!-- STATUS -->
                            <td class="text-center">
                                <?php
                                    $status      = strtolower($row['status']);
                                    $statusLabel = ucfirst($status);
                                    $statusClass = 'status-pill--default';

                                    if ($status === 'processing') {
                                        $statusClass = 'status-pill--processing';
                                    } elseif ($status === 'confirmed') {
                                        $statusClass = 'status-pill--confirmed';
                                    } elseif ($status === 'completed') {
                                        $statusClass = 'status-pill--completed';
                                    } elseif ($status === 'cancelled') {
                                        $statusClass = 'status-pill--cancelled';
                                    }
                                ?>
                                <span class="status-pill <?= $statusClass; ?>">
                                    <?= htmlspecialchars($statusLabel); ?>
                                </span>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php } ?>
</div>

<?php require "footer.php"; ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>
</body>
</html>
