<?php
// adminpanel/booking-list.php

// kalau di adminpanel kamu biasanya pakai session.php, pakai ini:
# require "session.php";

// kalau belum ada / bingung, minimal:
session_start();

require "../koneksi.php";

// AMBIL DATA SEMUA BOOKING + USER + PRODUK
$sql = "
    SELECT 
        b.*,
        u.username,
        u.email,
        p.nama AS nama_produk,
        p.foto AS foto_produk
    FROM booking b
    JOIN users u   ON b.id_user   = u.id
    JOIN produk p  ON b.id_produk = p.id
    ORDER BY b.created_at DESC
";
$query = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | Daftar Booking</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<?php require "navbar.php"; ?>

<div class="container py-5">
    <h1 class="mb-4" style="color:#2d483a;">Daftar Booking</h1>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'updated') { ?>
        <div class="alert alert-success">
            Status booking berhasil diperbarui.
        </div>
    <?php } ?>

    <?php if (mysqli_num_rows($query) === 0) { ?>
        <div class="alert alert-info">
            Belum ada data booking.
        </div>
    <?php } else { ?>

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Kode Booking</th>
                        <th>Customer</th>
                        <th>Produk</th>
                        <th>Tgl Ambil</th>
                        <th>Tgl Kembali</th>
                        <th>Durasi</th>
                        <th>Total Biaya</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['kode_booking']); ?></td>

                        <td>
                            <strong><?= htmlspecialchars($row['username']); ?></strong><br>
                            <small><?= htmlspecialchars($row['email']); ?></small>
                        </td>

                        <td>
                            <div class="d-flex align-items-center">
                                <?php if (!empty($row['foto_produk'])) { ?>
                                    <img src="../image/<?= htmlspecialchars($row['foto_produk']); ?>"
                                        alt=""
                                        style="width:45px;height:45px;object-fit:cover;"
                                        class="me-2 rounded">
                                <?php } ?>
                                <span><?= htmlspecialchars($row['nama_produk']); ?></span>
                            </div>
                        </td>

                        <td><?= date("d M Y", strtotime($row['tgl_ambil'])); ?></td>
                        <td><?= date("d M Y", strtotime($row['tgl_kembali'])); ?></td>

                        <td><?= (int)$row['durasi_hari']; ?> hari</td>

                        <td>Rp <?= number_format($row['total_biaya'], 0, ',', '.'); ?></td>

                        <td>
                            <span class="badge 
                                <?php
                                  switch (strtolower($row['status'])) {
                                    case 'processing': echo 'bg-warning text-dark'; break;
                                    case 'confirmed':        echo 'bg-success'; break;
                                    case 'completed':             echo 'bg-secondary'; break;
                                    case 'cancelled':          echo 'bg-danger'; break;

                                    default:                    echo 'bg-light text-dark';
                                  }
                                ?>">
                                <?= htmlspecialchars($row['status']); ?>
                            </span>
                        </td>

                        <td>
                            <!-- FORM UBAH STATUS -->
                            <form action="booking-update-status.php" method="post" class="d-flex align-items-center gap-2">
                                <input type="hidden" name="id_booking" value="<?= (int)$row['id_booking']; ?>">

                                <select name="status" class="form-select form-select-sm">
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

                                <button type="submit" class="btn btn-sm btn-primary">
                                    Simpan
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    <?php } ?>
</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
