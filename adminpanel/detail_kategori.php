<?php
require "session.php";
require "../koneksi.php";

$id = $_GET['p'];

// Ambil data kategori berdasarkan ID
$query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
        <h2>Detail Kategori</h2>

        <div class="col-12 col-md-6">
            <form action="" method="post">
                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control" 
                           value="<?php echo htmlspecialchars($data['nama']); ?>">
                </div>

                <div class="mt-5 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
                    <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
                </div>
            </form>

            <?php
            // Edit kategori
            if (isset($_POST['editBtn'])) {
                $kategori = htmlspecialchars($_POST['kategori']);

                // Jika tidak ada perubahan
                if ($data['nama'] == $kategori) {
                    echo '<meta http-equiv="refresh" content="0; url=kategori.php">';
                } else {
                    // Cek apakah nama kategori sudah ada
                    $queryCheck = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$kategori'");
                    $jumlahData = mysqli_num_rows($queryCheck);

                    if ($jumlahData > 0) {
                        echo '
                        <div class="alert alert-warning mt-3" role="alert">
                            Kategori sudah ada!
                        </div>';
                    } else {
                        $queryUpdate = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id'");

                        if ($queryUpdate) {
                            echo '
                            <div class="alert alert-primary mt-3" role="alert">
                                Kategori berhasil diperbarui!
                            </div>
                            <meta http-equiv="refresh" content="2; url=kategori.php">';
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                }
            }

            // Hapus kategori
            if (isset($_POST['deleteBtn'])) {
                $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");

                if ($queryDelete) {
                    echo '
                    <div class="alert alert-primary mt-3" role="alert">
                        Kategori berhasil dihapus!
                    </div>
                    <meta http-equiv="refresh" content="2; url=kategori.php">';
                } else {
                    echo mysqli_error($con);
                }
            }
            ?>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>