<?php 
require "session.php";
require "../koneksi.php";

$queryKontak   = mysqli_query($con, "SELECT * FROM kontak ORDER BY tanggal DESC");
$jumlahKontak  = mysqli_num_rows($queryKontak);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | Pesan Kontak</title>
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
                <span>Pesan Kontak</span>
            </div>

            <!-- Header -->
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                <div>
                    <h1 class="contact-page-title mb-1">Pesan Kontak</h1>
                    <p class="contact-subtitle mb-0">
                        Semua pesan yang dikirim dari formulir kontak Mountify.
                    </p>
                </div>

                <?php if ($jumlahKontak > 0) { ?>
                    <div class="contact-counter mt-3 mt-md-0">
                        <span class="label">Total pesan</span>
                        <span class="value"><?= $jumlahKontak; ?></span>
                    </div>
                <?php } ?>
            </div>

            <!-- Notifikasi hapus -->
            <?php if (isset($_GET['hapus']) && $_GET['hapus'] == 'success') : ?>
                <div class="alert alert-success contact-alert">Pesan berhasil dihapus.</div>
            <?php endif; ?>

            <?php if (isset($_GET['hapus']) && $_GET['hapus'] == 'failed') : ?>
                <div class="alert alert-danger contact-alert">Gagal menghapus pesan.</div>
            <?php endif; ?>

            <?php if ($jumlahKontak == 0) { ?>

                <div class="alert alert-info contact-alert">
                    Belum ada pesan yang masuk.
                </div>

            <?php } else { ?>

                <div class="admin-list-card contact-card">
                    <div class="table-responsive">
                        <table class="table align-middle contact-table">
                            <thead>
                                <tr>
                                    <th style="width:60px;">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Pesan</th>
                                    <th style="width:200px;">Tanggal</th>
                                    <th style="width:80px;" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_assoc($queryKontak)) {
                                    $namaLengkap = $data['nama_depan'] . 
                                        ($data['nama_belakang'] ? ' ' . $data['nama_belakang'] : '');
                                ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= htmlspecialchars($namaLengkap); ?></td>
                                    <td><?= htmlspecialchars($data['email']); ?></td>
                                    <td><?= htmlspecialchars($data['telepon']); ?></td>
                                    <td class="contact-message-cell">
                                        <?= nl2br(htmlspecialchars($data['pesan'])); ?>
                                    </td>
                                    <td class="text-nowrap"><?= $data['tanggal']; ?></td>
                                    <td class="text-center">
                                        <a href="hapus_kontak.php?id=<?= $data['id']; ?>"
                                           class="btn btn-sm btn-outline-danger contact-delete-btn"
                                           onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            <?php } ?>

        </div>
    </section>
</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
