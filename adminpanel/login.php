<?php
session_start(); // selalu di paling atas sebelum HTML

// pastikan file koneksi ada di ../koneksi.php
require_once __DIR__ . "/../koneksi.php";

// kalau form login dikirim
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query ambil data admin berdasarkan username
    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");

    // Cek apakah username ada
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);

        // Cek password (jika belum hash, pakai perbandingan biasa)
        if (password_verify($password, $data['password'])) {
            // simpan session
            $_SESSION['login'] = true;
            $_SESSION['username'] = $data['username'];

            // redirect ke dashboard admin
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('❌ Password salah!'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('❌ Username tidak ditemukan!'); window.location='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Mountify</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<style>
    .main {
        height: 100vh;
    }
    .login-box {
        width: 400px;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 30px;
        background-color: #fff;
        box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
    }
</style>

<body>
    <div class="main d-flex justify-content-center align-items-center bg-light">
        <div class="login-box">
            <h3 class="text-center mb-4 text-success">Login Admin Mountify</h3>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <button class="btn btn-success w-100" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
