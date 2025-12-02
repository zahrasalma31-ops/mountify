<?php
require "session.php";
require "../koneksi.php";

$query = mysqli_query($con, "
    SELECT a.*, b.nama AS nama_kategori
    FROM produk a
    JOIN kategori b ON a.kategori_id = b.id
");
$jumlahProduk = mysqli_num_rows($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

// Hitung total produk tersedia & tidak tersedia
$stokTersedia = mysqli_query($con, "SELECT id FROM produk WHERE ketersediaan_stok='Tersedia'");
$jumlahTersedia = mysqli_num_rows($stokTersedia);

$stokTidak = mysqli_query($con, "SELECT id FROM produk WHERE ketersediaan_stok='Tidak_tersedia'");
$jumlahTidak = mysqli_num_rows($stokTidak);

function c($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk | Mountify Admin</title>

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
                <span>Produk</span>
            </div>

            <!-- Header title + badge -->
            <div class="d-flex flex-wrap justify-content-between align-items-start mb-3">
                <div>
                    <div class="produk-page-title">Kelola Produk</div>
                    <div class="produk-subtitle">
                        Atur detail perlengkapan outdoor yang disewakan di Mountify.
                    </div>
                </div>
                <div class="mt-3 mt-md-0">
                    <div class="badge-count">
                        <i class="fas fa-box-open"></i>
                        <span><?= $jumlahProduk; ?> produk siap disewa</span>
                    </div>
                </div>
            </div>

            <!-- FORM + TIPS -->
            <div class="row g-4 mt-1">
                <!-- Form tambah produk -->
                <div class="col-lg-6">
                    <div class="admin-form-card">
                        <h3>Tambah Produk Baru</h3>
                        <p class="produk-subtitle mb-3">
                            Lengkapi informasi produk dengan jelas agar user mudah memilih peralatan yang tepat.
                        </p>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Produk</label>
                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    class="form-control"
                                    autocomplete="off"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control" required>
                                    <option value="">Pilih Salah Satu</option>
                                    <?php while($data = mysqli_fetch_array($queryKategori)) { ?>
                                        <option value="<?= $data['id']; ?>"><?= htmlspecialchars($data['nama']); ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Sewa per Hari</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="harga"
                                    name="harga"
                                    placeholder="contoh: 45000"
                                    min="0"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto Produk</label>
                                <input
                                    type="file"
                                    name="foto"
                                    id="foto"
                                    class="form-control">
                                <small class="text-muted d-block mt-1">
                                    Format: JPG, PNG, atau GIF. Maksimal 500 KB.
                                </small>
                            </div>

                            <div class="mb-3">
                                <label for="detail" class="form-label">Detail / Spesifikasi</label>
                                <textarea
                                    name="detail"
                                    id="detail"
                                    rows="5"
                                    class="form-control"
                                    placeholder="Tulis deskripsi singkat, spesifikasi, dan keunggulan produk..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="ketersediaan_stok" class="form-label">Ketersediaan Stok</label>
                                <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak_tersedia">Tidak Tersedia</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary" name="simpan">
                                Simpan
                            </button>
                        </form>

                        <?php
                        if(isset($_POST['simpan'])){
                            $nama             = htmlspecialchars($_POST['nama']);
                            $kategori         = htmlspecialchars($_POST['kategori']);
                            $harga            = htmlspecialchars($_POST['harga']);
                            $detail           = htmlspecialchars($_POST['detail']);
                            $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                            $target_dir   = "../image/";
                            $nama_file    = basename($_FILES["foto"]["name"]);
                            $target_file  = $target_dir . $nama_file;
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            $image_size    = $_FILES["foto"]["size"];
                            $random_name   = c(20);
                            $new_name      = $random_name . "." . $imageFileType;

                            if($nama=='' || $kategori=='' || $harga==''){
                                ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    Nama, kategori dan harga wajib diisi.
                                </div>
                                <?php
                            } else {
                                if($nama_file != ''){
                                    if($image_size > 500000){
                                        ?>
                                        <div class="alert alert-warning mt-3" role="alert">
                                            File tidak boleh lebih dari 500 KB.
                                        </div>
                                        <?php
                                    } else {
                                        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif'){
                                            ?>
                                            <div class="alert alert-warning mt-3" role="alert">
                                                File wajib bertipe JPG, PNG, atau GIF.
                                            </div>
                                            <?php
                                        } else {
                                            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                                        }
                                    }
                                } else {
                                    // kalau tidak upload foto
                                    $new_name = '';
                                }

                                // insert ke tabel produk
                                $queryTambah = mysqli_query($con, "
                                    INSERT INTO produk (kategori_id, nama, harga, foto, detail, ketersediaan_stok)
                                    VALUES ('$kategori', '$nama', '$harga', '$new_name', '$detail', '$ketersediaan_stok')
                                ");

                                if($queryTambah){
                                    ?>
                                    <div class="alert alert-primary mt-3" role="alert">
                                        Produk berhasil tersimpan.
                                    </div>

                                    <meta http-equiv="refresh" content="2; url=produk.php" />
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

                <!-- Tips / info -->
                <div class="col-lg-6">
                    <div class="admin-tip-card">
                        <div class="admin-tip-card-title">
                            <i class="fas fa-lightbulb"></i>
                            Tips Mengisi Data Produk
                        </div>
                        <ul>
                            <li>Gunakan nama produk yang singkat dan jelas, misalnya <em>Naturehike Sleeping Bag U250</em>.</li>
                            <li>Pastikan harga sewa per hari konsisten dengan informasi di halaman depan.</li>
                            <li>Gunakan foto dengan background bersih agar peralatan terlihat profesional.</li>
                            <li>Isi bagian detail dengan spesifikasi penting seperti kapasitas, material, dan berat.</li>
                            <li>Update status ketersediaan stok jika produk sedang dipakai atau sedang dalam perawatan.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- LIST PRODUK -->
            <div class="admin-list-card mt-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h2 class="mb-0">List Produk</h2>
                    <?php if ($jumlahProduk > 0): ?>
                        <span class="produk-subtitle">
                            Total <?= $jumlahProduk; ?> produk terdaftar
                        </span>
                    <?php endif; ?>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th style="width: 60px;">No.</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Ketersediaan Stok</th>
                                <th style="width: 120px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($jumlahProduk == 0){
                                ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        Belum ada produk. Tambahkan produk pertama di form sebelah atas.
                                    </td>
                                </tr>
                                <?php
                            } else {
                                $no = 1;
                                while($data = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= htmlspecialchars($data['nama']); ?></td>
                                        <td><?= htmlspecialchars($data['nama_kategori']); ?></td>
                                        <td>Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
                                        <td><?= htmlspecialchars($data['ketersediaan_stok']); ?></td>
                                        <td class="text-center">
                                            <a href="detail_produk.php?p=<?= $data['id']; ?>" class="btn btn-info btn-sm">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
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