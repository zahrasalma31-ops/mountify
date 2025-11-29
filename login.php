<?php
session_start();
require "koneksi.php";

$error   = "";
$success = "";

// Kalau user sudah login, langsung lempar ke halaman utama (opsional)
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// PROSES FORM LOGIN
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $error = "Email dan password wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } else {
        $emailEsc = mysqli_real_escape_string($con, $email);

        // Ambil user berdasarkan email
        $query = mysqli_query(
            $con,
            "SELECT * FROM users WHERE email = '$emailEsc' LIMIT 1"
        );

        if (mysqli_num_rows($query) === 1) {
            $user = mysqli_fetch_assoc($query);

            // Cek sudah verifikasi atau belum
            if ((int)$user['is_verified'] !== 1) {
                $error = "Akun Anda belum diverifikasi. Silakan verifikasi terlebih dahulu.";
            } else {
                // Cek password
                if (password_verify($password, $user['password'])) {
                    // LOGIN BERHASIL → simpan data ke session
                    $_SESSION['user_id']    = $user['id'];
                    $_SESSION['username']   = $user['username'];
                    $_SESSION['user_email'] = $user['email'];

                    // Kalau sebelumnya ada data booking yang tertunda,
                    // lanjutkan proses booking
                    if (!empty($_SESSION['pending_booking'])) {
                        header("Location: booking_proses.php");
                    } else {
                        // kalau tidak, ke home seperti biasa
                        header("Location: index.php");
                    }
                    exit();
                }
                else {
                    $error = "Password yang Anda masukkan salah.";
                }
            }
        } else {
            $error = "Email tidak ditemukan.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mountify | Login</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require "navbar.php"; ?>

<div class="register-wrapper">
    <div class="register-card mx-auto">

        <h1 class="register-title">Login</h1>

        <?php if ($error) { ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error); ?>
            </div>
        <?php } ?>

        <?php if ($success) { ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($success); ?>
            </div>
        <?php } ?>

        <form method="POST" action="">

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

            <button type="submit" class="btn-register">
                Login <span class="ms-1">→</span>
            </button>

        </form>

        <p class="register-bottom-text">
            Belum punya akun? <a href="register.php">Daftar sekarang</a>
        </p>

    </div>
</div>

<?php require "footer.php"; ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
