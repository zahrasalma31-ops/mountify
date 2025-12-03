<?php 
require "session.php";
require "../koneksi.php";

/**
 * Helper: format nomor telepon jadi format WhatsApp (62…)
 */
function formatWhatsappNumber($phoneRaw) {
    // buang spasi, strip, dll
    $onlyNumber = preg_replace('/[^0-9]/', '', $phoneRaw);

    if (strpos($onlyNumber, '0') === 0) {
        // 08xxxx -> 628xxxx
        return '62' . substr($onlyNumber, 1);
    }

    // kalau sudah 62… atau format lain, pakai apa adanya
    return $onlyNumber;
}

/**
 * Handle update follow-up status (POST)
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_followup'])) {
    $idKontak = (int) $_POST['id_kontak'];
    $status   = $_POST['status_followup'] ?? 'new';

    $allowed = ['new', 'in_progress', 'done'];

    if (in_array($status, $allowed, true)) {
        $safeStatus = mysqli_real_escape_string($con, $status);

        $sqlUpdate = "UPDATE kontak SET status_followup = '$safeStatus' WHERE id = $idKontak";
        if (mysqli_query($con, $sqlUpdate)) {
            header("Location: kontak.php?status=updated");
        } else {
            header("Location: kontak.php?status=failed");
        }
        exit;
    }
}

/**
 * Ambil data kontak
 */
$queryKontak   = mysqli_query($con, "SELECT * FROM kontak ORDER BY tanggal DESC");
$jumlahKontak  = mysqli_num_rows($queryKontak);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | Pesan Kontak</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<?php require "navbar.php"; ?>

<div class="admin-page">
    <section class="admin-main">
        <div class="container">

            <!-- Breadcrumb -->
            <div class="d-flex align-items-center mb-2 admin-breadcrumb">
                <i class="fas fa-home me-2"></i>
                <span>Home</span>
                <span class="mx-1">/</span>
                <span>Pesan Kontak</span>
            </div>

            <!-- Header -->
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
                <div>
                    <h1 class="contact-page-title mb-1">Pesan Kontak</h1>
                    <p class="contact-subtitle mb-0">
                        Kelola pesan yang dikirim dari formulir kontak Mountify.
                    </p>
                </div>

                <?php if ($jumlahKontak > 0) { ?>
                    <div class="contact-counter mt-3 mt-md-0">
                        <span class="label">Total pesan</span>
                        <span class="value"><?= $jumlahKontak; ?></span>
                    </div>
                <?php } ?>
            </div>

            <!-- Notifikasi update status -->
            <?php if (isset($_GET['status']) && $_GET['status'] === 'updated') : ?>
                <div class="alert alert-success contact-alert">Status follow-up berhasil diperbarui.</div>
            <?php endif; ?>

            <?php if (isset($_GET['status']) && $_GET['status'] === 'failed') : ?>
                <div class="alert alert-danger contact-alert">Gagal memperbarui status follow-up.</div>
            <?php endif; ?>

            <!-- Notifikasi hapus -->
            <?php if (isset($_GET['hapus']) && $_GET['hapus'] == 'success') : ?>
                <div class="alert alert-success contact-alert">Pesan berhasil dihapus.</div>
            <?php endif; ?>

            <?php if (isset($_GET['hapus']) && $_GET['hapus'] == 'failed') : ?>
                <div class="alert alert-danger contact-alert">Gagal menghapus pesan.</div>
            <?php endif; ?>

            <?php if ($jumlahKontak == 0) { ?>

                <div class="alert alert-info contact-alert">
                    Belum ada pesan yang masuk.
                </div>

            <?php } else { ?>

                <div class="admin-list-card contact-card">
                    <div class="table-responsive">
                        <table class="table align-middle contact-table">
                            <thead>
                                <tr>
                                    <th style="width:60px;">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Pesan</th>
                                    <th style="width:130px;" class="text-center">WhatsApp</th>
                                    <th style="width:180px;">Status Follow-up</th>
                                    <th style="width:150px;" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_assoc($queryKontak)) {
                                    $namaLengkap = $data['nama_depan'] . 
                                        ($data['nama_belakang'] ? ' ' . $data['nama_belakang'] : '');

                                    $statusCode = $data['status_followup'] ?: 'new';

                                    // label & warna untuk status
                                    $labelMap = [
                                        'new'         => 'Belum dihubungi',
                                        'in_progress' => 'Sedang dihubungi',
                                        'done'        => 'Selesai ditangani',
                                    ];
                                    $classMap = [
                                        'new'         => 'followup-pill-new',
                                        'in_progress' => 'followup-pill-progress',
                                        'done'        => 'followup-pill-done',
                                    ];

                                    $statusLabel = $labelMap[$statusCode] ?? 'Belum dihubungi';
                                    $statusClass = $classMap[$statusCode] ?? $classMap['new'];

                                    // link WhatsApp
                                    $waNumber = formatWhatsappNumber($data['telepon']);
                                    $waText   = "Halo $namaLengkap, terima kasih sudah menghubungi Mountify.";
                                    $waUrl    = "https://wa.me/" . $waNumber . "?text=" . urlencode($waText);
                                ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= htmlspecialchars($namaLengkap); ?></td>
                                    <td><?= htmlspecialchars($data['email']); ?></td>
                                    <td><?= htmlspecialchars($data['telepon']); ?></td>
                                    <td class="contact-message-cell"><?= nl2br(htmlspecialchars($data['pesan'])); ?></td>

                                    <!-- WhatsApp -->
                                    <td class="text-center">
                                        <a href="<?= $waUrl ?>" target="_blank"
                                           class="btn btn-sm contact-wa-btn">
                                            <i class="fab fa-whatsapp"></i>
                                            Hubungi
                                        </a>
                                    </td>

                                    <!-- Status Follow Up -->
                                    <td>
                                        <span class="followup-pill <?= $statusClass; ?>">
                                            <?= $statusLabel; ?>
                                        </span>
                                    </td>

                                    <!-- Action: dropdown status + delete -->
                                    <td class="text-center">
                                        <form method="post" class="d-inline-flex align-items-center gap-2 contact-action-form">
                                            <input type="hidden" name="id_kontak" value="<?= (int)$data['id']; ?>">
                                            <input type="hidden" name="update_followup" value="1">

                                            <select name="status_followup"
                                                    class="form-select form-select-sm contact-status-select">
                                                <option value="new" <?= $statusCode === 'new' ? 'selected' : ''; ?>>
                                                    Belum dihubungi
                                                </option>
                                                <option value="in_progress" <?= $statusCode === 'in_progress' ? 'selected' : ''; ?>>
                                                    Sedang dihubungi
                                                </option>
                                                <option value="done" <?= $statusCode === 'done' ? 'selected' : ''; ?>>
                                                    Selesai ditangani
                                                </option>
                                            </select>

                                            <button type="submit"
                                                    class="btn btn-sm btn-primary contact-save-btn">
                                                Simpan
                                            </button>

                                            <a href="hapus_kontak.php?id=<?= $data['id']; ?>"
                                               class="btn btn-sm btn-outline-danger contact-delete-btn"
                                               onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            <?php } ?>

        </div>
    </section>
</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../fontawesome/js/all.min.js"></script>
</body>
</html>