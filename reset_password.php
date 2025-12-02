<?php
require "koneksi.php";

$status      = "";
$success     = false;
$validToken  = false;

$email = $_GET["email"] ?? "";
$token = $_GET["token"] ?? "";

/**
 * Check if password is strong:
 * - 8–64 characters
 * - at least one lowercase letter
 * - at least one uppercase letter
 * - at least one digit
 * - at least one symbol
 * - no spaces
 */
function isStrongPassword(string $password): bool
{
    $pattern = '/^(?=\S{8,64}$)(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).+$/';
    return (bool) preg_match($pattern, $password);
}

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
        // Token is valid → allow password reset
        $validToken = true;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $password  = $_POST["password"] ?? "";
            $password2 = $_POST["password2"] ?? "";

            if ($password === "" || $password2 === "") {
                $status = "All fields are required.";
            } elseif ($password !== $password2) {
                $status = "Password confirmation does not match.";
            } elseif (!isStrongPassword($password)) {
                $status = "Password must be at least 8 characters long and include uppercase letters, lowercase letters, numbers, symbols, and contain no spaces.";
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);

                mysqli_query(
                    $con,
                    "UPDATE users SET 
                        password      = '$hash',
                        reset_token   = NULL,
                        reset_expires = NULL
                     WHERE email='$emailEsc'"
                );

                $success = true;
                $status  = "Your password has been reset successfully. Please login.";
            }
        }
    } else {
        $validToken = false;
        $status = "The reset link is invalid or has expired.";
    }

} else {
    $validToken = false;
    $status = "Missing reset parameters.";
}
?>
<!DOCTYPE html>
<html lang="en">
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

                    <?php if ($status) { ?>
                        <p><?= htmlspecialchars($status); ?></p>
                    <?php } ?>

                    <?php if (!$success && $validToken) { ?>

                        <form method="POST" action="">
                            <div class="input-icon-wrapper">
                                <i class="fas fa-lock"></i>
                                <input 
                                    type="password" 
                                    name="password" 
                                    placeholder="New Password" 
                                    required>
                                <i class="fas fa-eye toggle-password" onclick="togglePassword(this)"></i>
                            </div>

                            <div class="input-icon-wrapper">
                                <i class="fas fa-lock"></i>
                                <input 
                                    type="password" 
                                    name="password2" 
                                    placeholder="Confirm New Password" 
                                    required>
                                <i class="fas fa-eye toggle-password" onclick="togglePassword(this)"></i>
                            </div>

                            <button type="submit" class="btn-register">
                                Save Password <span class="ms-1">→</span>
                            </button>
                        </form>

                    <?php } ?>

                    <?php if ($success) { ?>
                        <a href="login.php"
                           class="btn btn-success px-4 py-2 mt-3"
                           style="background-color:#2d483a; border:none; border-radius:8px;">
                            Go to Login
                        </a>
                    <?php } ?>

                </div>
            </div>

        </div>
    </div>
</div>

<?php require "footer.php"; ?>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
function togglePassword(icon) {
    const input = icon.previousElementSibling;
    if (!input) return;

    if (input.type === "password") {
        input.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
    }
}
</script>
</body>
</html>