<?php
require "koneksi.php";

$success = '';
$error = '';

if (isset($_POST['kirim'])) {
    $nama_depan     = htmlspecialchars($_POST['nama_depan']);
    $nama_belakang  = htmlspecialchars($_POST['nama_belakang']);
    $email          = htmlspecialchars($_POST['email']);
    $telepon        = htmlspecialchars($_POST['telepon']);
    $pesan          = htmlspecialchars($_POST['pesan']);

    if ($nama_depan == '' || $email == '' || $telepon == '' || $pesan == '') {
        $error = "Nama depan, email, nomor telepon, dan pesan wajib diisi.";
    } else {
        $query = mysqli_query(
            $con,
            "INSERT INTO kontak (nama_depan, nama_belakang, email, telepon, pesan)
             VALUES ('$nama_depan', '$nama_belakang', '$email', '$telepon', '$pesan')"
        );

        if ($query) {
            $success = "Pesan berhasil dikirim. Terima kasih!";
        } else {
            $error = "Terjadi kesalahan: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mountify | Kontak</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require "navbar.php"; ?>

<!-- Banner (boleh pakai banner-produk biar konsisten) -->
<div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container">
        <h1 class="text-white text-center">Kontak Kami</h1>
    </div>
</div>

<!-- Konten Kontak -->
<div class="container contact-section py-5">
    <div class="row g-4">

        <!-- FORM KONTAK -->
        <div class="col-12 col-lg-6">
            <h2 class="mb-4">Kontak Kami</h2>

            <?php if ($success != '') { ?>
                <div class="alert alert-success"><?= $success; ?></div>
            <?php } ?>

            <?php if ($error != '') { ?>
                <div class="alert alert-danger"><?= $error; ?></div>
            <?php } ?>

            <form action="" method="post" class="contact-box">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-semibold">Nama depan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="nama_depan" class="form-control" placeholder="Nama depan" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-semibold">Nama belakang</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="nama_belakang" class="form-control" placeholder="Nama belakang">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-semibold">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="sayatampan@email.com" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-semibold">Nomor telepon</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" name="telepon" class="form-control" placeholder="Tulis nomor WhatsApp jika ada" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Pesan Anda</label>
                    <textarea name="pesan" rows="5" class="form-control" placeholder="Pesan Anda" required></textarea>
                </div>

                <button type="submit" name="kirim" class="btn btn-success w-100">
                    Kirim Pesan <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </form>
        </div>

        <!-- MAP + ALAMAT -->
        <div class="col-12 col-lg-6">
            <h2 class="mb-4">Lokasi Kami</h2>
            <p class="mb-2">
                Jl. Banjarsari No. 27, Tembalang – Semarang<br>
                Jawa Tengah, Indonesia
            </p>

            <div class="contact-map">
                <!-- Ganti src ini dengan embed map lokasi kamu sendiri dari Google Maps -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.861952589329!2d110.423!3d-7.027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMDAnMDkuMCJTIDExMMKwMjUnMjguMCJF!5e0!3m2!1sid!2sid!4v0000000000000"
                    width="100%" height="400" style="border:0;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

    </div>
</div>

<?php require "footer.php"; ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>
</body>
</html>
