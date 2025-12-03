<?php 
require "session.php";
require "../koneksi.php";

$id = $_GET['p'] ?? '';

$query = mysqli_query($con, "
    SELECT a.*, b.nama AS nama_kategori 
    FROM produk a 
    JOIN kategori b ON a.kategori_id=b.id 
    WHERE a.id='$id'
");
$data = mysqli_fetch_array($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='{$data['kategori_id']}'");   

function generateRandomString($length = 10) {
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Detail</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        form div { margin-bottom: 10px; }
    </style>
</head>
<body>
<?php require "navbar.php"; ?>

<div class="container mt-5">
    <h2>Detail Produk</h2>

    <div class="col-12 col-md-6 mb-5">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Nama -->
            <div>
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama"
                       value="<?php echo htmlspecialchars($data['nama']); ?>"
                       class="form-control" autocomplete="off" required>
            </div>

            <!-- Kategori -->
            <div>
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="<?php echo $data['kategori_id']; ?>">
                        <?php echo htmlspecialchars($data['nama_kategori']); ?>
                    </option>
                    <?php while($dataKategori = mysqli_fetch_array($queryKategori)) { ?>
                        <option value="<?php echo $dataKategori['id']; ?>">
                            <?php echo htmlspecialchars($dataKategori['nama']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <!-- Harga (pakai angka murni di value) -->
            <div>
                <label for="harga">Harga</label>
                <input
                    type="text"
                    class="form-control"
                    id="harga"
                    name="harga"
                    value="<?php echo number_format($data['harga'], 0, ',', '.'); ?>"
                    autocomplete="off"
                    required>
                <small class="text-muted">
                    Contoh: 10000 (boleh pakai titik, akan dibersihkan otomatis)
                </small>
            </div>

            <!-- Foto -->
            <div>
                <label for="currentFoto">Foto Produk Sekarang</label><br>
                <img src="../image/<?php echo htmlspecialchars($data['foto']); ?>" alt="" width="300px">
            </div>
            <div>
                <label for="foto">Foto Baru (Opsional)</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>

            <!-- Detail -->
            <div>
                <label for="detail">Detail</label>
                <textarea name="detail" id="detail" cols="30" rows="10" class="form-control">
<?php echo htmlspecialchars($data['detail']); ?>
                </textarea>
            </div>

            <!-- Ketersediaan stok -->
            <div>
                <label for="ketersediaan_stok">Ketersediaan Stok</label>
                    <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                        <option value="<?php echo $data['ketersediaan_stok']; ?>"><?php echo $data['ketersediaan_stok']; ?></option>
                        <?php
                            if($data['ketersediaan_stok']=='Tersedia'){
                        ?>
                            <option value="Habis">Habis</option>
                        <?php
                            } else {
                        ?>
                            <option value="Tersedia">Tersedia</option>
                        <?php } ?>
                    </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
            </div>
        </form>

        <?php
        // ======================== PROSES UPDATE ========================
        if (isset($_POST['simpan'])) {
            $nama     = htmlspecialchars($_POST['nama']);
            $kategori = htmlspecialchars($_POST['kategori']);
            $detail   = htmlspecialchars($_POST['detail']);
            $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

            // BERSIHKAN HARGA: hanya angka, buang titik/koma
            $hargaInput = $_POST['harga'] ?? '';
            $hargaBersih = preg_replace('/[^0-9]/', '', $hargaInput);
            $harga = (int) $hargaBersih;

            $target_dir  = "../image/";
            $nama_file   = basename($_FILES["foto"]["name"]);
            $image_size  = $_FILES["foto"]["size"];
            $imageFileType = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
            $random_name = generateRandomString(20);
            $new_name    = $random_name . "." . $imageFileType;

            if ($nama == '' || $kategori == '' || $harga == 0) {
                ?>
                <div class="alert alert-warning mt-3" role="alert">
                    Nama, kategori dan harga wajib diisi dengan benar.
                </div>
                <?php
            } else {
                // Update data teks terlebih dahulu
                $queryUpdate = mysqli_query(
                    $con,
                    "UPDATE produk SET 
                        kategori_id='$kategori',
                        nama='$nama',
                        harga='$harga',
                        detail='$detail',
                        ketersediaan_stok='$ketersediaan_stok'
                     WHERE id='$id'"
                );

                // Jika ada file baru diupload
                if ($nama_file != '') {
                    if ($image_size > 500000) {
                        ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            File tidak boleh lebih dari 500 Kb
                        </div>
                        <?php
                    } else {
                        if ($imageFileType != 'jpg' && $imageFileType != 'jpeg' &&
                            $imageFileType != 'png' && $imageFileType != 'gif') {
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                File wajib bertipe jpg/jpeg/png/gif
                            </div>
                            <?php
                        } else {
                            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                            mysqli_query($con, "UPDATE produk SET foto='$new_name' WHERE id='$id'");
                        }
                    }
                }

                if ($queryUpdate) {
                    ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Produk berhasil diupdate.
                    </div>
                    <meta http-equiv="refresh" content="2; url=produk.php" />
                    <?php
                } else {
                    echo mysqli_error($con);
                }
            }
        }

        // ======================== PROSES HAPUS ========================
        if (isset($_POST['hapus'])) {
            $queryHapus = mysqli_query($con, "DELETE FROM produk WHERE id='$id'");

            if ($queryHapus) {
                ?>
                <div class="alert alert-primary mt-3" role="alert">
                    Produk berhasil dihapus.
                </div>
                <meta http-equiv="refresh" content="2; url=produk.php" />
                <?php
            } else {
                echo mysqli_error($con);
            }
        }
        ?>
    </div>
</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>