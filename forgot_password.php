<?php
require "koneksi.php";

$error   = "";
$success = "";
$resetLink = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");

    if ($email === "") {
        $error = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } else {
        $emailEsc = mysqli_real_escape_string($con, $email);

        // Cek apakah email ada
        $query = mysqli_query($con, "SELECT * FROM users WHERE email='$emailEsc' LIMIT 1");

        if (mysqli_num_rows($query) === 1) {
            $user = mysqli_fetch_assoc($query);

            // Buat token reset baru
            $token = bin2hex(random_bytes(32));

            mysqli_query(
                $con,
                "UPDATE users 
                SET reset_token='$token',
                    reset_expires = DATE_ADD(NOW(), INTERVAL 1 HOUR)
                WHERE email='$emailEsc'"
            );

            // Karena localhost → tampilkan link reset password
            $baseUrl = "http://localhost/mountify"; 
            $resetLink = $baseUrl . "/reset_password.php?email=" . urlencode($email) . "&token=" . $token;

            $success = "Permintaan reset password berhasil. Silakan klik tombol di bawah ini.";
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
    <title>Lupa Password</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require "navbar.php"; ?>

<div class="container-fluid banner d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">

                <div class="register-card mx-auto">

                    <h1 class="register-title">Lupa Password</h1>

                    <?php if ($error) { ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
                    <?php } ?>

                    <?php if ($success) { ?>
                        <div class="alert alert-success text-center">
                            <?= htmlspecialchars($success); ?>

                            <?php if ($resetLink) { ?>
                                <div class="mt-3">
                                    <a href="<?= htmlspecialchars($resetLink); ?>"
                                       class="btn btn-success px-4 py-2"
                                       style="background-color:#2d483a; border:none; border-radius:8px;">
                                        Reset Password →
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <form method="POST" action="">
                        <div class="input-icon-wrapper">
                            <i class="far fa-envelope"></i>
                            <input type="email" name="email" placeholder="Masukkan email Anda" required>
                        </div>

                        <button type="submit" class="btn-register">
                            Kirim Permintaan <span class="ms-1">→</span>
                        </button>
                    </form>

                    <p class="register-bottom-text">
                        Ingat password? <a href="login.php">Login</a>
                    </p>

                </div>

            </div>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>