<?php
require "koneksi.php";

$status  = "";
$success = false;

$email = $_GET["email"] ?? "";
$token = $_GET["token"] ?? "";

if ($email && $token) {
    $emailEsc = mysqli_real_escape_string($con, $email);
    $tokenEsc = mysqli_real_escape_string($con, $token);

    $query = mysqli_query(
    $con,
    "SELECT * FROM users 
     WHERE email='$emailEsc'
       AND reset_token='$tokenEsc'
       AND reset_expires > NOW()
     LIMIT 1"
);

    if (mysqli_num_rows($query) === 1) {
        // Token valid → lanjutkan
        $validToken = true;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $password  = $_POST["password"] ?? "";
            $password2 = $_POST["password2"] ?? "";

            if ($password === "" || $password2 === "") {
                $status = "Semua field wajib diisi.";
            } elseif ($password !== $password2) {
                $status = "Konfirmasi password tidak sama.";
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);

                mysqli_query(
                    $con,
                    "UPDATE users SET 
                        password='$hash',
                        reset_token=NULL,
                        reset_expires=NULL
                     WHERE email='$emailEsc'"
                );

                $success = true;
                $status = "Password berhasil direset. Silakan login.";
            }
        }
    } else {
        $validToken = false;
        $status = "Link reset tidak valid atau sudah kadaluarsa.";
    }

} else {
    $validToken = false;
    $status = "Parameter tidak lengkap.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<?php require "navbar.php"; ?>

<div class="container-fluid banner d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">

                <div class="register-card mx-auto text-center">

                    <h1 class="register-title">Reset Password</h1>

                    <p><?= htmlspecialchars($status); ?></p>

                    <?php if (!$success && $validToken) { ?>

                        <form method="POST" action="">
                            <div class="input-icon-wrapper">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Password baru" required>
                            </div>

                            <div class="input-icon-wrapper">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password2" placeholder="Konfirmasi password" required>
                            </div>

                            <button type="submit" class="btn-register">
                                Simpan Password <span class="ms-1">→</span>
                            </button>
                        </form>

                    <?php } ?>

                    <?php if ($success) { ?>
                        <a href="login.php"
                           class="btn btn-success px-4 py-2 mt-3"
                           style="background-color:#2d483a; border:none; border-radius:8px;">
                            Ke Halaman Login
                        </a>
                    <?php } ?>

                </div>

            </div>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>