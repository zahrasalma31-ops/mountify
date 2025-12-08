<?php
session_start();
require "koneksi.php";

// Pastikan parameter id ada
if (!isset($_GET['id'])) {
    header("Location: produk.php");
    exit();
}

// Ambil data produk berdasarkan ID
$id = intval($_GET['id']);
$queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE id = $id");
$produk      = mysqli_fetch_assoc($queryProduk);

// Jika produk tidak ditemukan
if (!$produk) {
    echo "<h1>Produk tidak ditemukan</h1>";
    exit();
}

// Flag stok tersedia / tidak
$stokTersedia = isset($produk['ketersediaan_stok']) && $produk['ketersediaan_stok'] === 'Tersedia';

// Produk terkait berdasarkan kategori_id
$queryProdukTerkait = mysqli_query(
    $con,
    "SELECT * FROM produk 
     WHERE kategori_id = {$produk['kategori_id']} AND id != $id 
     LIMIT 4"
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mountify | Detail Produk</title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- Select2 CSS (untuk dropdown durasi sewa yang bisa scroll) -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <style>
    .booking-btn {
      display: inline-block;
      background-color:#294B29;
      color: white;
      text-align: center;
      padding: 12px 40px;
      border: none;
      border-radius: 50px;
      font-size: 18px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }
    .booking-btn:hover {
      background-color: #1F3A1F;
      color: #fff;
      text-decoration: none;
    }

    /* tombol out of stock */
    .booking-btn.disabled-btn {
      background-color: #999;
      cursor: not-allowed;
    }
    .booking-btn.disabled-btn:hover {
      background-color: #999;
      color: #fff;
    }

    /*TOAST ADDED TO CART*/
    .add-toast {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0.5);
      background: rgba(0, 0, 0, 0.85);
      color: white;
      padding: 18px 28px;
      border-radius: 14px;
      text-align: center;
      opacity: 0;
      z-index: 9999;
      pointer-events: none;
      transition: all 0.25s ease-out;
      font-size: 15px;
      font-weight: 500;
    }

    .add-toast.show {
      opacity: 1;
      transform: translate(-50%, -50%) scale(1);
    }

    .toast-icon {
      font-size: 22px;
      margin-bottom: 6px;
    }
  </style>
</head>

<body>
<?php $forceSolidNavbar = true; ?>
<?php require "navbar.php"; ?>

<!-- Detail Produk -->
<section class="product-detail-section">
  <div class="container product-detail-wrapper">
    <div class="product-detail-main">

      <!-- KOLOM KIRI: GAMBAR + KOTAK SEWA -->
      <div class="product-image-box">

        <!-- Gambar produk -->
        <img
          src="image/<?= htmlspecialchars($produk['foto']); ?>"
          class="product-image"
          alt="<?= htmlspecialchars($produk['nama']); ?>">

        <!-- BLOK SEWA (CARD DI BAWAH GAMBAR) -->
        <?php if ($stokTersedia): ?>
        <div class="product-rent-box">
          <div class="sewa-card p-3 p-md-4">
            <div class="row gy-3 align-items-end">

              <!-- Tanggal Ambil -->
              <div class="col-md-4">
                <div class="sewa-label">Rental Date</div>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="far fa-calendar"></i>
                  </span>
                  <input
                    type="date"
                    class="form-control"
                    id="tglAmbil">
                </div>
              </div>

              <!-- Durasi Sewa -->
              <div class="col-md-4">
                <div class="sewa-label">Duration</div>
                <div class="input-group">
                  <select class="form-select" id="durasiSewa">
                    <option value="" selected disabled hidden>Select Duration</option>
                    <?php for ($i = 1; $i <= 30; $i++): ?>
                      <option value="<?= $i ?>"><?= $i ?> Day</option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>

              <!-- Tanggal Kembali -->
              <div class="col-md-4">
                <div class="sewa-label">Return Date</div>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="far fa-calendar-check"></i>
                  </span>
                  <input
                    type="text"
                    class="form-control"
                    id="tglKembali"
                    readonly>
                </div>
              </div>

            </div>
          </div>
        </div>
        <?php endif; ?>
        <!-- END BLOK SEWA -->

      </div>

      <!-- KOLOM KANAN: DETAIL PRODUK -->
      <div class="product-info">
        <h1 class="product-title"><?= htmlspecialchars($produk['nama']); ?></h1>

        <p class="product-description">
          <?= nl2br(htmlspecialchars($produk['detail'])); ?>
        </p>

        <div class="mb-3">
          <div class="product-price-label">Rental price</div>
          <div class="product-price">
            Rp <?= number_format($produk['harga'], 0, ',', '.'); ?>
          </div>
        </div>

        <p class="product-stock">
          Status Ketersediaan:
          <strong class="<?= $stokTersedia ? 'text-success' : 'text-danger'; ?>">
            <?php
            if (isset($produk['ketersediaan_stok'])) {
                echo htmlspecialchars($produk['ketersediaan_stok']);
            } else {
                echo 'Cek ketersediaan via admin';
            }
            ?>
          </strong>
        </p>

        <?php if ($stokTersedia): ?>
          <!-- FORM BOOKING: hanya muncul jika stok tersedia -->
          <form action="tambah_cart.php" method="POST" id="formBooking">
            <input type="hidden" name="id_produk"   value="<?= (int)$produk['id']; ?>">
            <input type="hidden" name="tgl_ambil"   id="tglAmbilHidden">
            <input type="hidden" name="durasi_hari" id="durasiHidden">
            <input type="hidden" name="tgl_kembali" id="tglKembaliHidden">

            <button
              type="submit"
              id="btnAddCart"
              class="booking-btn mt-3"
              style="display: none;">
              <i class="fas fa-shopping-cart"></i>
              Add to Cart
            </button>
          </form>
        <?php else: ?>
          <!-- Jika stok habis: tidak ada form, hanya tombol nonaktif -->
          <button class="booking-btn disabled-btn mt-3" disabled>
            <i class="fas fa-ban"></i>
            Out of Stock
          </button>
        <?php endif; ?>
      </div>

    </div> <!-- /.product-detail-main -->
  </div> <!-- /.container -->
</section>

<!-- Produk Terkait -->
<div class="container-fluid py-5 warna5">
  <div class="container">
    <h2 class="produk-terkait-title text-center mb-4">Produk Terkait</h2>

    <div class="row">
      <?php while ($data = mysqli_fetch_assoc($queryProdukTerkait)) { ?>
        <div class="col-md-6 col-lg-3 mb-3">
          <a href="produk-detail.php?id=<?= $data['id']; ?>">
            <img
              src="image/<?= htmlspecialchars($data['foto']); ?>"
              class="img-fluid img-thumbnail produk-terkait-image"
              alt="<?= htmlspecialchars($data['nama']); ?>">
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<!-- Toast "Added to cart" -->
<div id="toastAdded" class="add-toast">
  <div class="toast-icon">
    <i class="fas fa-check"></i>
  </div>
  <div>Added to cart</div>
</div>

<?php require "footer.php"; ?>

<!-- jQuery & Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>

<script>
function showToast() {
  const toast = document.getElementById("toastAdded");
  if (!toast) return;

  toast.classList.add("show");
  setTimeout(() => {
    toast.classList.remove("show");
  }, 1000);
}

<?php if ($stokTersedia): ?>
// JS booking hanya jalan kalau stok tersedia
$(document).ready(function () {
  const $tglAmbil        = $('#tglAmbil');
  const $durasi          = $('#durasiSewa');
  const $tglKembali      = $('#tglKembali');
  const $btnAddCart      = $('#btnAddCart');

  const $tglAmbilHidden   = $('#tglAmbilHidden');
  const $durasiHidden     = $('#durasiHidden');
  const $tglKembaliHidden = $('#tglKembaliHidden');

  // 1. Set default & batas minimal tanggal ambil (hari ini) 
  const today   = new Date();
  const yyyy    = today.getFullYear();
  const mm      = String(today.getMonth() + 1).padStart(2, '0');
  const dd      = String(today.getDate()).padStart(2, '0');
  const todayISO = `${yyyy}-${mm}-${dd}`;

  $tglAmbil.val(todayISO);
  $tglAmbil.attr('min', todayISO);

  // 2. Format tanggal 
  function formatTanggalIndo(date) {
    const hari  = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const bulan = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Okt','Nov','Des'];

    const h = hari[date.getDay()];
    const d = String(date.getDate()).padStart(2, '0');
    const b = bulan[date.getMonth()];
    const y = date.getFullYear();

    return `${h}, ${d} ${b} ${y}`;
  }

  // 3. Hitung tanggal kembali + isi hidden + show/hide tombol 
  function updateBookingInfo() {
    const startStr = $tglAmbil.val();
    const durasi   = parseInt($durasi.val(), 10);

    if (!startStr || isNaN(durasi)) {
      $tglKembali.val('Return Date');
      $btnAddCart.hide();
      return;
    }

    const start   = new Date(startStr);
    const kembali = new Date(start);
    kembali.setDate(kembali.getDate() + durasi);

    $tglKembali.val(formatTanggalIndo(kembali));

    $tglAmbilHidden.val(startStr);
    $durasiHidden.val(durasi);

    const y2 = kembali.getFullYear();
    const m2 = String(kembali.getMonth() + 1).padStart(2, '0');
    const d2 = String(kembali.getDate()).padStart(2, '0');
    $tglKembaliHidden.val(`${y2}-${m2}-${d2}`);

    $btnAddCart.show();
  }

  $tglKembali.val('Return Date');
  $btnAddCart.hide();

  // Select2 untuk durasi
  $durasi.select2({
    minimumResultsForSearch: Infinity,
    width: '100%'
  });

  $tglAmbil.on('change', updateBookingInfo);
  $durasi.on('change', updateBookingInfo);

  // Kalau URL punya ?added=1 → tampilkan toast
  <?php if (isset($_GET['added']) && $_GET['added'] == '1') : ?>
    showToast();
  <?php endif; ?>
});
<?php else: ?>
// Jika stok tidak tersedia, tidak perlu inisialisasi JS booking,
// tapi toast masih boleh dipakai.
<?php if (isset($_GET['added']) && $_GET['added'] == '1') : ?>
  showToast();
<?php endif; ?>
<?php endif; ?>
</script>

</body>
</html>