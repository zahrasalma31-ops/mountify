<?php
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori | Mountify Admin</title>

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
                <span>Kategori</span>
            </div>

            <!-- Header title + badge -->
            <div class="d-flex flex-wrap justify-content-between align-items-start mb-3">
                <div>
                    <div class="kategori-page-title">Kelola Kategori</div>
                    <div class="kategori-subtitle">
                        Tambah dan atur kategori perlengkapan agar produk mudah ditemukan.
                    </div>
                </div>
                <div class="mt-3 mt-md-0">
                    <div class="badge-count">
                        <i class="fas fa-layer-group"></i>
                        <span><?= $jumlahKategori; ?> kategori terdaftar</span>
                    </div>
                </div>
            </div>

            <!-- FORM + TIPS -->
            <div class="row g-4 mt-1">
                <!-- Form tambah kategori -->
                <div class="col-lg-5">
                    <div class="admin-form-card">
                        <h3>Tambah Kategori Baru</h3>
                        <p class="kategori-subtitle mb-3">
                            Beri nama kategori yang jelas, misalnya <em>Sleeping Bag</em> atau <em>Hiking Shoes</em>.
                        </p>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Nama Kategori</label>
                                <input
                                    type="text"
                                    id="kategori"
                                    name="kategori"
                                    placeholder="contoh: Hiking Shoes"
                                    class="form-control"
                                    autocomplete="off"
                                    required>
                            </div>
                            <button class="btn btn-primary" type="submit" name="simpan_kategori">
                                Simpan
                            </button>
                        </form>

                        <?php
                            if(isset($_POST['simpan_kategori'])){
                                $kategori = htmlspecialchars($_POST['kategori']);

                                $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
                                $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

                                if($jumlahDataKategoriBaru > 0){
                        ?>
                                    <div class="alert alert-warning mt-3" role="alert">
                                        Kategori sudah ada. Gunakan nama lain atau cek daftar kategori.
                                    </div>
                        <?php
                                } else {
                                    $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");

                                    if($querySimpan){
                        ?>
                                        <div class="alert alert-primary mt-3" role="alert">
                                            Kategori berhasil tersimpan.
                                        </div>
                                        <meta http-equiv="refresh" content="2; url=/mountify/adminpanel/kategori.php" />
                        <?php
                                    } else {
                                        echo '<div class="alert alert-danger mt-3" role="alert">'
                                             . mysqli_error($con) .
                                             '</div>';
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>

                <!-- Tips  -->
                <div class="col-lg-7">
                    <div class="admin-tip-card">
                        <div class="admin-tip-card-title">
                            <i class="fas fa-info-circle"></i>
                            Tips Pengelolaan Kategori
                        </div>
                        <ul>
                            <li>Gunakan nama kategori yang singkat dan mudah dipahami user.</li>
                            <li>Kelompokkan produk serupa dalam kategori yang sama agar pencarian lebih cepat.</li>
                            <li>Hindari duplikasi kategori dengan nama mirip, misalnya <em>Carrier</em> dan <em>Backpack Carrier</em>.</li>
                            <li>Sesuaikan kategori dengan jenis perlengkapan outdoor yang paling sering disewa di Mountify.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- LIST KATEGORI -->
            <div class="admin-list-card">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h2 class="mb-0">List Kategori</h2>
                    <?php if ($jumlahKategori > 0): ?>
                        <span class="kategori-subtitle">
                            Total <?= $jumlahKategori; ?> kategori terdaftar
                        </span>
                    <?php endif; ?>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th style="width: 60px;">No.</th>
                                <th>Nama Kategori</th>
                                <th style="width: 120px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($jumlahKategori == 0) {
                            ?>
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        Belum ada kategori. Tambahkan kategori pertama di sebelah kiri.
                                    </td>
                                </tr>
                            <?php
                                } else {
                                    $jumlah = 1;
                                    while ($data = mysqli_fetch_array($queryKategori)) {
                            ?>
                                        <tr>
                                            <td><?= $jumlah; ?></td>
                                            <td><?= htmlspecialchars($data['nama']); ?></td>
                                            <td class="text-center">
                                                <a href="detail_kategori.php?p=<?= $data['id']; ?>"
                                                   class="btn btn-info btn-sm">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                        </tr>
                            <?php
                                        $jumlah++;
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div> <!-- /.container -->
    </section>
</div> <!-- /.admin-page -->

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
