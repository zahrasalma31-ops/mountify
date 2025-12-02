<?php
    require "session.php";
    require "../koneksi.php";

    $queryKontak = mysqli_query($con, "SELECT * FROM kontak ORDER BY tanggal DESC");
    $jumlahKontak = mysqli_num_rows($queryKontak);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | Pesan Kontak</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }
    .table-pesan td.pesan-cell {
        max-width: 350px;
        white-space: pre-wrap;      /* supaya enter di textarea kepake */
        word-wrap: break-word;
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../adminpanel" class="no-decoration text-muted">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Pesan Kontak
                </li>
            </ol>
        </nav>

        <h3 class="mb-4">Pesan Kontak</h3>

        <!-- Notifikasi hapus -->
        <?php if (isset($_GET['hapus']) && $_GET['hapus'] == 'success') : ?>
            <div class="alert alert-success">Pesan berhasil dihapus.</div>
        <?php endif; ?>

        <?php if (isset($_GET['hapus']) && $_GET['hapus'] == 'failed') : ?>
            <div class="alert alert-danger">Gagal menghapus pesan.</div>
        <?php endif; ?>

        <?php if ($jumlahKontak == 0) { ?>
            <div class="alert alert-info">
                Belum ada pesan yang masuk.
            </div>
        <?php } else { ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-pesan align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Pesan</th>
                        <th style="width: 160px;">Tanggal</th>
                        <th style="width: 80px;">Action</th>
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
                        <td class="pesan-cell"><?= htmlspecialchars($data['pesan']); ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td>
                            <a href="hapus_kontak.php?id=<?= $data['id']; ?>"
                               class="btn btn-sm btn-danger"
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

        <?php } ?>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
