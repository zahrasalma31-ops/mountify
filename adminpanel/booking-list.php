<?php
// adminpanel/booking-list.php

require "session.php";
require "../koneksi.php";

// GET ALL BOOKINGS + USER + PRODUCT
$sql = "
    SELECT 
        b.*,
        u.username,
        u.email,
        p.nama AS product_name,
        p.foto AS product_photo
    FROM booking b
    JOIN users  u ON b.id_user   = u.id
    JOIN produk p ON b.id_produk = p.id
    ORDER BY b.created_at DESC
";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Booking List</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<?php require "navbar.php"; ?>

<div class="admin-page">
    <section class="admin-main">
        <div class="container">

            <!-- SMALL BREADCRUMB -->
            <div class="d-flex align-items-center mb-2 admin-breadcrumb">
                <i class="fas fa-home me-2"></i>
                <span>Home</span>
                <span class="mx-1">/</span>
                <span>Bookings</span>
            </div>

            <!-- PAGE TITLE -->
            <h1 class="booking-page-title mb-4">Booking List</h1>

            <?php if (isset($_GET['msg']) && $_GET['msg'] === 'updated') { ?>
                <div class="alert alert-success booking-alert" role="alert">
                    Booking status has been updated successfully.
                </div>
            <?php } ?>

            <?php if (mysqli_num_rows($query) === 0) { ?>

                <div class="alert alert-info booking-alert">
                    There are no bookings yet.
                </div>

            <?php } else { ?>

                <div class="admin-list-card booking-card">

                    <div class="table-responsive">
                        <table class="table align-middle booking-table">
                            <thead>
                                <tr>
                                    <th>Booking Code</th>
                                    <th>Customer</th>
                                    <th>Product</th>
                                    <th class="text-center">Pickup Date</th>
                                    <th class="text-center">Return Date</th>
                                    <th class="text-center">Duration</th>
                                    <th class="text-end">Total Price</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <!-- BOOKING CODE -->
                                    <td class="booking-code-cell">
                                        <?= htmlspecialchars($row['kode_booking']); ?>
                                    </td>

                                    <!-- CUSTOMER -->
                                    <td>
                                        <div class="customer-cell">
                                            <span class="customer-name">
                                                <?= htmlspecialchars($row['username']); ?>
                                            </span>
                                            <span class="customer-email">
                                                <?= htmlspecialchars($row['email']); ?>
                                            </span>
                                        </div>
                                    </td>

                                    <!-- PRODUCT -->
                                    <td>
                                        <div class="d-flex align-items-center product-cell">
                                            <?php if (!empty($row['product_photo'])) { ?>
                                                <img
                                                    src="../image/<?= htmlspecialchars($row['product_photo']); ?>"
                                                    alt=""
                                                    class="booking-product-thumb me-2">
                                            <?php } ?>
                                            <span class="product-name">
                                                <?= htmlspecialchars($row['product_name']); ?>
                                            </span>
                                        </div>
                                    </td>

                                    <!-- DATES -->
                                    <td class="text-center text-nowrap">
                                        <?= date("d M Y", strtotime($row['tgl_ambil'])); ?>
                                    </td>
                                    <td class="text-center text-nowrap">
                                        <?= date("d M Y", strtotime($row['tgl_kembali'])); ?>
                                    </td>

                                    <!-- DURATION -->
                                    <td class="text-center">
                                        <?= (int)$row['durasi_hari']; ?> days
                                    </td>

                                    <!-- TOTAL PRICE -->
                                    <td class="text-end text-nowrap">
                                        Rp <?= number_format($row['total_biaya'], 0, ',', '.'); ?>
                                    </td>

                                    <!-- STATUS (COLORED BADGE) -->
                                    <td class="text-center">
                                        <?php
                                        $statusLower = strtolower($row['status']);
                                        $badgeClass  = 'status-pill-other';
                                        switch ($statusLower) {
                                            case 'processing': $badgeClass = 'status-pill-processing'; break;
                                            case 'confirmed': $badgeClass  = 'status-pill-confirmed';  break;
                                            case 'completed': $badgeClass  = 'status-pill-completed';  break;
                                            case 'cancelled': $badgeClass  = 'status-pill-cancelled';  break;
                                        }
                                        ?>
                                        <span class="status-pill <?= $badgeClass; ?>">
                                            <?= htmlspecialchars($row['status']); ?>
                                        </span>
                                    </td>

                                    <!-- ACTION -->
                                    <td class="text-center">
                                        <form action="booking-update-status.php" method="post"
                                              class="d-inline-flex align-items-center gap-2 booking-status-form">
                                            <input type="hidden" name="id_booking"
                                                   value="<?= (int)$row['id_booking']; ?>">

                                            <select name="status"
                                                    class="form-select form-select-sm booking-status-select">
                                                <?php
                                                $statusOptions = [
                                                    'Processing',
                                                    'Confirmed',
                                                    'Completed',
                                                    'Cancelled'
                                                ];
                                                foreach ($statusOptions as $st) {
                                                    $selected = ($row['status'] === $st) ? 'selected' : '';
                                                    echo "<option value=\"$st\" $selected>$st</option>";
                                                }
                                                ?>
                                            </select>

                                            <button type="submit"
                                                    class="btn btn-sm btn-primary booking-save-btn">
                                                Save
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div> <!-- /.admin-list-card -->
            <?php } ?>

        </div>
    </section>
</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
</body>
</html>