<?php
require "koneksi.php";

$error   = "";
$success = "";
$verifyLink = "";

/**
 * Password strength rules:
 * - minimum 8 characters
 * - at least one lowercase letter
 * - at least one uppercase letter
 * - at least one number
 * - at least one symbol
 * - no spaces allowed
 */
function isStrongPassword(string $password): bool
{
    $pattern = '/^(?=\S{8,64}$)(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).+$/';
    return (bool) preg_match($pattern, $password);
}

// FORM PROCESS
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username  = trim($_POST['username'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $password  = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';

    if ($username === '' || $email === '' || $password === '' || $password2 === '') {
        $error = "All fields are required.";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } 
    elseif ($password !== $password2) {
        $error = "Password confirmation does not match.";
    } 
    elseif (!isStrongPassword($password)) {
        $error = "Password must be at least 8 characters long and include uppercase letters, lowercase letters, numbers, symbols, and contain no spaces.";
    }
    else {

        // Check if email already exists
        $emailEsc = mysqli_real_escape_string($con, $email);
        $cek = mysqli_query($con, "SELECT id FROM users WHERE email='$emailEsc'");

        if (mysqli_num_rows($cek) > 0) {
            $error = "Email is already registered.";
        } 
        else {

            $usernameEsc  = mysqli_real_escape_string($con, $username);
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $token        = bin2hex(random_bytes(32)); // verification token

            // INSERT new user (not verified yet)
            $simpan = mysqli_query(
                $con,
                "INSERT INTO users (username, email, password, verification_token, is_verified) 
                 VALUES ('$usernameEsc', '$emailEsc', '$passwordHash', '$token', 0)"
            );

            if ($simpan) {
                // LOCALHOST MODE: Show verification link instead of sending email
                $baseUrl    = "http://localhost/mountify";
                $verifyLink = $baseUrl . "/verify.php?email=" . urlencode($email) . "&token=" . $token;

                $success = "Registration successful! Please verify your account.";
            } else {
                $error = "An error occurred while saving your data.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mountify | Registration</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require "navbar.php"; ?>

<!-- BACKGROUND -->
<div class="container-fluid banner d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-lg-5 col-md-7">

                <div class="register-card mx-auto">

                    <h1 class="register-title">Register</h1>

                    <?php if ($error) { ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($error); ?>
                        </div>
                    <?php } ?>

                    <?php if ($success) { ?>
                        <div class="alert alert-success text-center">
                            <?= htmlspecialchars($success); ?>

                            <?php if ($verifyLink) { ?>
                                <div class="mt-3">
                                    <a href="<?= htmlspecialchars($verifyLink); ?>" 
                                       class="btn btn-success px-4 py-2"
                                       style="border-radius: 8px; background-color:#2d483a; border:none;">
                                        Verify Account →
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <!-- FORM -->
                    <form method="POST" action="">

                        <div class="input-icon-wrapper">
                            <i class="fas fa-user"></i>
                            <input 
                                type="text" 
                                name="username" 
                                placeholder="Username"
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
                                placeholder="Confirm Password"
                                required>
                        </div>

                        <button type="submit" class="btn-register">
                            Register <span class="ms-1">→</span>
                        </button>

                    </form>

                    <p class="register-bottom-text">
                        Already have an account? <a href="login.php">Login here!</a>
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
