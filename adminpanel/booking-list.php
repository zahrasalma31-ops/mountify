<?php
// adminpanel/booking_list.php

require "session.php";
require "../koneksi.php";

// AMBIL DATA BOOKING + USER + PRODUK
$sql = "
    SELECT 
        b.*,
        u.username,
        u.email,
        p.nama AS nama_produk,
        p.foto AS foto_produk
    FROM booking b
    JOIN users  u ON b.id_user   = u.id
    JOIN produk p ON b.id_produk = p.id
    ORDER BY b.created_at DESC
";
$query          = mysqli_query($con, $sql);
$jumlahBooking  = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | Daftar Booking</title>

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

            <!-- Breadcrumb -->
            <div class="d-flex align-items-center mb-2 admin-breadcrumb">
                <i class="fas fa-home me-2"></i>
                <span>Home</span>
                <span class="mx-1">/</span>
                <span>Booking</span>
            </div>

            <!-- Header -->
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                <div>
                    <h1 class="contact-page-title mb-1">Daftar Booking</h1>
                    <p class="contact-subtitle mb-0">
                        Kelola seluruh pemesanan sewa dari pelanggan Mountify.
                    </p>
                </div>

                <?php if ($jumlahBooking > 0) { ?>
                    <div class="contact-counter mt-3 mt-md-0">
                        <span class="label">Total booking</span>
                        <span class="value"><?= $jumlahBooking; ?></span>
                    </div>
                <?php } ?>
            </div>

            <!-- Notifikasi update status -->
            <?php if (isset($_GET['msg']) && $_GET['msg'] === 'updated') { ?>
                <div class="alert alert-success contact-alert" role="alert">
                    Status booking berhasil diperbarui.
                </div>
            <?php } ?>

            <?php if ($jumlahBooking === 0) { ?>

                <div class="alert alert-info contact-alert">
                    Belum ada data booking.
                </div>

            <?php } else { ?>

                <div class="admin-list-card contact-card">

                    <div class="table-responsive">
                        <table class="table align-middle contact-table">
                            <thead>
                                <tr>
                                    <th>Kode Booking</th>
                                    <th>Customer</th>
                                    <th>Produk</th>
                                    <th class="text-center">Tgl Ambil</th>
                                    <th class="text-center">Tgl Kembali</th>
                                    <th class="text-center">Durasi</th>
                                    <th class="text-end">Total Biaya</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <!-- KODE BOOKING -->
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

                                    <!-- PRODUK -->
                                    <td>
                                        <div class="product-cell">
                                            <?php if (!empty($row['foto_produk'])) { ?>
                                                <img
                                                    src="../image/<?= htmlspecialchars($row['foto_produk']); ?>"
                                                    alt=""
                                                    class="booking-product-thumb">
                                            <?php } ?>
                                            <span class="product-name">
                                                <?= htmlspecialchars($row['nama_produk']); ?>
                                            </span>
                                        </div>
                                    </td>

                                    <!-- TANGGAL -->
                                    <td class="text-center text-nowrap">
                                        <?= date("d M Y", strtotime($row['tgl_ambil'])); ?>
                                    </td>
                                    <td class="text-center text-nowrap">
                                        <?= date("d M Y", strtotime($row['tgl_kembali'])); ?>
                                    </td>

                                    <!-- DURASI -->
                                    <td class="text-center">
                                        <?= (int)$row['durasi_hari']; ?> hari
                                    </td>

                                    <!-- TOTAL BIAYA -->
                                    <td class="text-end text-nowrap">
                                        Rp <?= number_format($row['total_biaya'], 0, ',', '.'); ?>
                                    </td>

                                    <!-- STATUS (BADGE BERWARNA) -->
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
                                                $opsiStatus = [
                                                    'Processing',
                                                    'Confirmed',
                                                    'Completed',
                                                    'Cancelled'
                                                ];
                                                foreach ($opsiStatus as $st) {
                                                    $selected = ($row['status'] === $st) ? 'selected' : '';
                                                    echo "<option value=\"$st\" $selected>$st</option>";
                                                }
                                                ?>
                                            </select>

                                            <button type="submit"
                                                    class="btn btn-sm btn-primary booking-save-btn">
                                                Simpan
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