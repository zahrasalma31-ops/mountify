<?php
require "koneksi.php";

$status  = "";
$success = false;

if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = mysqli_real_escape_string($con, $_GET['email']);
    $token = mysqli_real_escape_string($con, $_GET['token']);

    $query = mysqli_query(
        $con,
        "SELECT id FROM users 
         WHERE email='$email' 
           AND verification_token='$token' 
           AND is_verified = 0"
    );

    if (mysqli_num_rows($query) === 1) {
        // update jadi verified
        $update = mysqli_query(
            $con,
            "UPDATE users 
             SET is_verified = 1, verification_token = NULL 
             WHERE email='$email'"
        );

        if ($update) {
            $success = true;
            $status  = "Akun Anda berhasil diverifikasi. Silakan login.";
        } else {
            $status  = "Terjadi kesalahan saat memverifikasi akun.";
        }
    } else {
        $status = "Link verifikasi tidak valid atau akun sudah terverifikasi.";
    }
} else {
    $status = "Parameter verifikasi tidak lengkap.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Akun</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<?php require "navbar.php"; ?>

<!-- Background gunung sama seperti index / register / login -->
<div class="container-fluid banner d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">

                <div class="register-card mx-auto text-center">

                    <h3 class="mb-3">
                        <?= $success ? "Verifikasi Berhasil" : "Verifikasi Gagal"; ?>
                    </h3>

                    <p class="mb-4">
                        <?= htmlspecialchars($status); ?>
                    </p>

                    <a href="login.php"
                       class="btn btn-success px-4 py-2"
                       style="background-color:#2d483a;border:none;border-radius:8px;">
                        Ke Halaman Login
                    </a>

                </div>

            </div>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>