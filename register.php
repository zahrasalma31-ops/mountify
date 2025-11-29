<?php
require "koneksi.php";

$error   = "";
$success = "";
$verifyLink = "";

// PROSES FORM
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username  = trim($_POST['username'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $password  = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';

    if ($username === '' || $email === '' || $password === '' || $password2 === '') {
        $error = "Semua field wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } elseif ($password !== $password2) {
        $error = "Konfirmasi password tidak sama.";
    } else {

        // Cek email sudah terdaftar atau belum
        $emailEsc = mysqli_real_escape_string($con, $email);
        $cek = mysqli_query($con, "SELECT id FROM users WHERE email='$emailEsc'");
        if (mysqli_num_rows($cek) > 0) {
            $error = "Email sudah terdaftar.";
        } else {

            $usernameEsc  = mysqli_real_escape_string($con, $username);
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $token        = bin2hex(random_bytes(32)); // token verifikasi

            // SIMPAN USER (belum aktif)
            $simpan = mysqli_query(
                $con,
                "INSERT INTO users (username, email, password, verification_token, is_verified) 
                 VALUES ('$usernameEsc', '$emailEsc', '$passwordHash', '$token', 0)"
            );

            if ($simpan) {
                // ====== MODE LOCALHOST: TAMPILKAN LINK VERIFIKASI DI HALAMAN ======
                // GANTI baseUrl dengan URL project kamu
                $baseUrl    = "http://localhost/mountify"; 
                $verifyLink = $baseUrl . "/verify.php?email=" . urlencode($email) . "&token=" . $token;

                $success = "Registrasi berhasil! Silakan verifikasi akun Anda.";
            } else {
                $error = "Terjadi kesalahan saat menyimpan data.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mountify | Registrasi</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require "navbar.php"; ?>

<div class="register-wrapper">
    <div class="register-card mx-auto">

        <h1 class="register-title">Registrasi</h1>

        <?php if ($error) { ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error); ?>
            </div>
        <?php } ?>

        <?php if ($success) { ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($success); ?>

                <?php if ($verifyLink) { ?>
                    <div class="mt-3 text-center">
                        <a href="<?= htmlspecialchars($verifyLink); ?>" 
                        class="btn btn-success px-4 py-2"
                        style="border-radius: 8px; background-color:#2d483a; border:none;">
                            Verifikasi Akun →
                        </a>
                    </div>
                <?php } ?>

            </div>
        <?php } ?>

        <form method="POST" action="">

            <div class="input-icon-wrapper">
                <i class="fas fa-user"></i>
                <input 
                    type="text" 
                    name="username" 
                    placeholder="username"
                    value="<?= isset($username) ? htmlspecialchars($username) : '' ?>"
                    required>
            </div>

            <div class="input-icon-wrapper">
                <i class="far fa-envelope"></i>
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Email"
                    value="<?= isset($email) ? htmlspecialchars($email) : '' ?>"
                    required>
            </div>

            <div class="input-icon-wrapper">
                <i class="fas fa-lock"></i>
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Password" 
                    required>
            </div>

            <div class="input-icon-wrapper">
                <i class="fas fa-lock"></i>
                <input 
                    type="password" 
                    name="password2" 
                    placeholder="Konfirmasi password" 
                    required>
            </div>

            <button type="submit" class="btn-register">
                Register <span class="ms-1">→</span>
            </button>

        </form>

        <p class="register-bottom-text">
            Sudah punya akun? <a href="login.php">Ayo login!</a>
        </p>

    </div>
</div>

<?php require "footer.php"; ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
