<?php
session_start();
require "koneksi.php";

// wajib login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id_user = (int)$_SESSION['user_id'];

// Ambil semua booking milik user ini
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

    <!-- JUDUL DI TENGAH -->
    <h1 class="riwayat-title mb-4 text-center">Booking History</h1>

    <?php if (mysqli_num_rows($queryBooking) === 0) { ?>
        <div class="alert alert-info text-center mt-4">
            You dont have any booking history yet.
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
                            <td><?= htmlspecialchars($row['kode_booking']); ?></td>

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

                            <td class="text-center">
                                <?= date("d M Y", strtotime($row['tgl_ambil'])); ?>
                            </td>

                            <td class="text-center">
                                <?= date("d M Y", strtotime($row['tgl_kembali'])); ?>
                            </td>

                            <td class="text-center">
                                <?= (int)$row['durasi_hari']; ?> hari
                            </td>

                            <td class="text-center">
                                Rp <?= number_format($row['total_biaya'], 0, ',', '.'); ?>
                            </td>

                            <td class="text-center">
                                <span class="badge 
                                    <?php
                                    switch (strtolower($row['status'])) {
                                        case 'processing': echo 'bg-warning text-dark'; break;
                                        case 'confirmed':  echo 'bg-success'; break;
                                        case 'completed':  echo 'bg-secondary'; break;
                                        case 'cancelled':  echo 'bg-danger'; break;
                                        default:           echo 'bg-secondary';
                                    }
                                    ?>">
                                    <?= htmlspecialchars($row['status']); ?>
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
