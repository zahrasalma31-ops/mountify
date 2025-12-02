<?php
session_start();
require "koneksi.php";

$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mountify | Cart</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php $forceSolidNavbar = true; ?>
<?php require "navbar.php"; ?>

<div class="container py-5 mt-5 riwayat-wrapper">

    <!-- SWITCH CART / HISTORY -->
    <div class="cart-switch-wrapper">
        <a href="cart.php" class="cart-switch-btn active">
            <i class="fas fa-shopping-cart me-2"></i>
            Booking Cart
        </a>
        <a href="riwayat-booking.php" class="cart-switch-btn">
            <i class="fas fa-clock-rotate-left me-2"></i>
            Booking History
        </a>
    </div>

    <!-- JUDUL -->
    <h1 class="riwayat-title mb-2 text-center">Booking Cart</h1>
    <p class="text-center text-muted mb-4 small">
    Choose the items you want to rent, then checkout via WhatsApp.
    </p>


    <?php if (empty($cart)) { ?>

        <div class="alert alert-info text-center mt-4">
            Your cart is empty.
        </div>

    <?php } else { ?>

        <!-- CARD PUTIH MENGELILINGI TABEL (sama seperti riwayat booking) -->
        <div class="riwayat-card mt-3">
            <form action="checkout_whatsapp.php" method="POST" id="cartForm">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 riwayat-table">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center cart-col-select">
                                    <input type="checkbox" id="selectAll">
                                    <div class="cart-select-all-label">Select all</div>
                                </th>
                                <th class="text-center cart-col-product">Product</th>
                                <th class="text-center">Rental Date</th>
                                <th class="text-center">Return Date</th>
                                <th class="text-center">Duration</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Subtotal</th>
                                <th class="text-center">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cart as $index => $item) { ?>
                            <tr>
                                <!-- Checkbox pilih item -->
                                <td class="text-center">
                                    <input type="checkbox"
                                           class="cart-select"
                                           name="selected[]"
                                           value="<?= $index; ?>"
                                           data-subtotal="<?= (int)$item['subtotal']; ?>">
                                </td>

                                <!-- Produk -->
                                <td class="cart-cell-product">
                                    <div class="d-flex align-items-center">
                                        <?php if (!empty($item['foto'])) { ?>
                                            <img src="image/<?= htmlspecialchars($item['foto']); ?>"
                                                 alt=""
                                                 style="width:50px;height:50px;object-fit:cover;"
                                                 class="me-2 rounded">
                                        <?php } ?>
                                        <div>
                                            <strong><?= htmlspecialchars($item['nama']); ?></strong><br>
                                            <small>Rp <?= number_format($item['harga'], 0, ',', '.'); ?> / day</small>
                                        </div>
                                    </div>
                                </td>

                                <!-- Tanggal sewa -->
                                <td class="text-center">
                                    <?= date('d M Y', strtotime($item['tgl_ambil'])); ?>
                                </td>

                                <!-- Tanggal kembali -->
                                <td class="text-center">
                                    <?= date('d M Y', strtotime($item['tgl_kembali'])); ?>
                                </td>

                                <!-- Durasi -->
                                <td class="text-center">
                                    <?= (int)$item['durasi_hari']; ?> day
                                </td>

                                <!-- Qty -->
                                <td class="text-center">
                                    <?= (int)$item['qty']; ?>
                                </td>

                                <!-- Subtotal -->
                                <td class="text-center">
                                    Rp <?= number_format($item['subtotal'], 0, ',', '.'); ?>
                                </td>

                                <!-- Hapus -->
                                <td class="text-center">
                                    <a href="hapus_cart.php?index=<?= $index; ?>" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- TOTAL TERPILIH + CHECKOUT -->
                <div class="d-flex flex-column align-items-end mt-4">
                    <h3 class="mb-3">
                        Selected Total:
                        <strong id="selectedTotal">Rp 0</strong>
                    </h3>

                    <button type="submit"
                            id="checkoutBtn"
                            class="btn btn-success btn-lg"
                            disabled>
                        <i class="fab fa-whatsapp"></i> Booking via WhatsApp
                    </button>
                </div>
            </form>
        </div>

    <?php } ?>
</div>

<?php require "footer.php"; ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>

<script>
// Hitung total hanya untuk item yang dicentang
document.addEventListener('DOMContentLoaded', function () {
    const checkAll   = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.cart-select');
    const totalEl    = document.getElementById('selectedTotal');
    const btnCheckout = document.getElementById('checkoutBtn');

    if (!totalEl || !btnCheckout) return;

    function formatRupiah(n) {
        return new Intl.NumberFormat('id-ID').format(n);
    }

    function updateTotal() {
        let total = 0;
        let anyChecked = false;

        checkboxes.forEach(cb => {
            if (cb.checked) {
                anyChecked = true;
                total += parseInt(cb.dataset.subtotal || '0', 10);
            }
        });

        totalEl.textContent = 'Rp ' + formatRupiah(total);
        btnCheckout.disabled = !anyChecked;
    }

    // Select all
    if (checkAll) {
        checkAll.addEventListener('change', function () {
            checkboxes.forEach(cb => cb.checked = checkAll.checked);
            updateTotal();
        });
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', function () {
            if (!cb.checked && checkAll) {
                checkAll.checked = false;
            }
            updateTotal();
        });
    });

    // initial
    updateTotal();
});
</script>

</body>
</html>
