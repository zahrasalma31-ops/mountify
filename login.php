<?php
session_start();
require "koneksi.php";

$error   = "";
$success = "";

// If user already logged in → redirect to homepage
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// PROCESS LOGIN FORM
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $error = "Email and password are required.";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } 
    else {

        $emailEsc = mysqli_real_escape_string($con, $email);

        // Get user by email
        $query = mysqli_query(
            $con,
            "SELECT * FROM users WHERE email = '$emailEsc' LIMIT 1"
        );

        if (mysqli_num_rows($query) === 1) {

            $user = mysqli_fetch_assoc($query);

            // Check if account is verified
            if ((int)$user['is_verified'] !== 1) {
                $error = "Your account is not verified yet. Please verify your email first.";
            } 
            else {
                // Validate password
                if (password_verify($password, $user['password'])) {

                    // SUCCESS → save session
                    $_SESSION['user_id']    = $user['id'];
                    $_SESSION['username']   = $user['username'];
                    $_SESSION['user_email'] = $user['email'];

                    // If there is pending booking, proceed to booking
                    if (!empty($_SESSION['pending_booking'])) {
                        header("Location: booking_proses.php");
                    } else {
                        header("Location: index.php");
                    }
                    exit();
                } 
                else {
                    $error = "Incorrect password.";
                }
            }

        } 
        else {
            $error = "Email not found.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mountify | Login</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<?php require "navbar.php"; ?>

<!-- BACKGROUND -->
<div class="container-fluid banner d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-lg-5 col-md-7">
                <div class="register-card mx-auto">

                    <h1 class="register-title">Login</h1>

                    <?php if ($error) { ?>
                        <div class="alert alert-danger text-center">
                            <?= htmlspecialchars($error); ?>
                        </div>
                    <?php } ?>

                    <?php if ($success) { ?>
                        <div class="alert alert-success text-center">
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

                    <!-- FORGOT PASSWORD -->
                    <p class="register-bottom-text mt-2">
                        <a href="forgot_password.php">Forgot your password?</a>
                    </p>

                    <!-- REGISTER -->
                    <p class="register-bottom-text">
                        Don't have an account? <a href="register.php">Register now</a>
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