<?php
session_start(); // selalu di paling atas sebelum HTML

// pastikan file koneksi ada di ../koneksi.php
require_once __DIR__ . "/../koneksi.php";

$error = "";

// kalau form login dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = "Username dan password wajib diisi.";
    } else {
        // Query ambil data admin berdasarkan username
        $usernameEsc = mysqli_real_escape_string($con, $username);
        $query = mysqli_query($con, "SELECT * FROM users WHERE username='$usernameEsc' LIMIT 1");

        // Cek apakah username ada
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);

            // Cek password (pakai password_verify karena password sudah di-hash)
            if (password_verify($password, $data['password'])) {
                // simpan session
                $_SESSION['login']    = true;
                $_SESSION['username'] = $data['username'];

                // redirect ke dashboard admin
                header("Location: index.php");
                exit;
            } else {
                $error = "Password yang Anda masukkan salah.";
            }
        } else {
            $error = "Username tidak ditemukan.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin | Mountify</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<!-- BACKGROUND  -->
<div class="container-fluid banner d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">

                <div class="register-card mx-auto">

                    <h1 class="register-title" style="font-size:26px;">
                        Login Admin
                    </h1>

                    <?php if ($error) { ?>
                        <div class="alert alert-danger text-center">
                            <?= htmlspecialchars($error); ?>
                        </div>
                    <?php } ?>

                    <form action="" method="post">

                        <!-- Username -->
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user"></i>
                            <input 
                                type="text" 
                                class="form-control border-0"
                                name="username" 
                                placeholder="Username"
                                value="<?= isset($username) ? htmlspecialchars($username) : '' ?>"
                                required>
                        </div>

                        <!-- Password -->
                        <div class="input-icon-wrapper">
                            <i class="fas fa-lock"></i>
                            <input 
                                type="password" 
                                class="form-control border-0"
                                name="password" 
                                placeholder="Password"
                                required>
                        </div>

                        <button class="btn-register" type="submit">
                            Login <span class="ms-1">→</span>
                        </button>

                    </form>

                    <p class="register-bottom-text mt-3">
                        Kembali ke website utama? <a href="../index.php">Beranda</a>
                    </p>

                </div>

            </div>
        </div>
    </div>
</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
