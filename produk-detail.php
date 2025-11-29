<?php
require "koneksi.php";

// Pastikan parameter id ada
if (!isset($_GET['id'])) {
    header("Location: produk.php");
    exit();
}

// Ambil data produk berdasarkan ID
$id = intval($_GET['id']);
$queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE id = $id");
$produk = mysqli_fetch_assoc($queryProduk);

// Jika produk tidak ditemukan
if (!$produk) {
    echo "<h1>Produk tidak ditemukan</h1>";
    exit();
}

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
      background-color: #436d61;
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
      background-color: #355a50;
      color: #fff;
      text-decoration: none;
    }
  </style>
</head>

<body>
<?php require "navbar.php"; ?>

<!-- Detail Produk -->
<div class="container-fluid py-5">
  <div class="container">
    <div class="row">

      <!-- KOLOM KIRI: GAMBAR + KOTAK SEWA -->
      <div class="col-lg-5 mb-5">

        <!-- Gambar produk -->
        <img src="image/<?= $produk['foto']; ?>" class="w-100" alt="">

        <!-- BLOK SEWA (CARD DI BAWAH GAMBAR) -->
        <div class="mt-4">
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
                    id="tglAmbil"
                  >
                </div>
              </div>

              <!-- Durasi Sewa -->
              <div class="col-md-4">
                <div class="sewa-label">Duration</div>
                <div class="input-group">
                  <select class="form-select" id="durasiSewa">
                    <!-- placeholder -->
                    <option value="" selected disabled hidden>Select Duration</option>

                    <?php for ($i = 2; $i <= 30; $i++): ?>
                      <option value="<?= $i ?>"><?= $i ?> Day</option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>

              <!-- Maks. Pengembalian -->
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
                    readonly
                  >
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- END BLOK SEWA -->

      </div>

      <!-- KOLOM KANAN: DETAIL PRODUK -->
      <div class="col-lg-6 offset-lg-1">
        <h1 class="product-title"><?= $produk['nama']; ?></h1>

        <p class="fs-5" style="text-align: justify;">
          <?= nl2br($produk['detail']); ?>
        </p>

        <p class="text-harga">
          Rp <?= number_format($produk['harga'], 0, ',', '.'); ?>
        </p>

        <p class="fs-5">
          Status Ketersediaan:
          <strong>
            <?= isset($produk['ketersediaan_stok']) ? $produk['ketersediaan_stok'] : 'Cek ketersediaan via admin'; ?>
          </strong>
        </p>

        <!-- FORM BOOKING: dikirim ke booking_proses.php -->
        <form action="booking_proses.php" method="POST" id="formBooking">
          <input type="hidden" name="id_produk" value="<?= $produk['id']; ?>">
          <input type="hidden" name="tgl_ambil" id="tglAmbilHidden">
          <input type="hidden" name="durasi_hari" id="durasiHidden">
          <input type="hidden" name="tgl_kembali" id="tglKembaliHidden">

          <button
            type="submit"
            id="btnBookingWa"
            class="booking-btn mt-3"
            style="display: none;">
            Booking via WhatsApp
          </button>
        </form>
      </div>

    </div> <!-- /.row -->
  </div> <!-- /.container -->
</div> <!-- /.container-fluid -->

<!-- Produk Terkait (section terpisah) -->
<div class="container-fluid py-5 warna2">
  <div class="container">
    <h2 class="text-center text-white mb-5">Produk Terkait</h2>

    <div class="row">
      <?php while ($data = mysqli_fetch_assoc($queryProdukTerkait)) { ?>
        <div class="col-md-6 col-lg-3 mb-3">
          <a href="produk-detail.php?id=<?= $data['id']; ?>">
            <img src="image/<?= $data['foto']; ?>"
                 class="img-fluid img-thumbnail produk-terkait-image"
                 alt="">
          </a>
        </div>
      <?php } ?>
    </div>

  </div>
</div>

<?php require "footer.php"; ?>

<!-- jQuery & Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>

<script>
$(document).ready(function () {
  const $tglAmbil        = $('#tglAmbil');
  const $durasi          = $('#durasiSewa');
  const $tglKembali      = $('#tglKembali');
  const $btnBookingWa    = $('#btnBookingWa');

  const $tglAmbilHidden   = $('#tglAmbilHidden');
  const $durasiHidden     = $('#durasiHidden');
  const $tglKembaliHidden = $('#tglKembaliHidden');

  // --- 1. Set default & batas minimal tanggal ambil (hari ini) ---
  const today   = new Date();
  const yyyy    = today.getFullYear();
  const mm      = String(today.getMonth() + 1).padStart(2, '0');
  const dd      = String(today.getDate()).padStart(2, '0');
  const todayISO = `${yyyy}-${mm}-${dd}`;

  $tglAmbil.val(todayISO);
  $tglAmbil.attr('min', todayISO);

  // --- 2. Format tanggal Indonesia ---
  function formatTanggalIndo(date) {
    const hari  = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const bulan = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Okt','Nov','Des'];

    const h = hari[date.getDay()];
    const d = String(date.getDate()).padStart(2, '0');
    const b = bulan[date.getMonth()];
    const y = date.getFullYear();

    return `${h}, ${d} ${b} ${y}`;
  }

  // --- 3. Fungsi hitung tanggal kembali + isi hidden + show/hide tombol ---
  function updateBookingInfo() {
    const startStr = $tglAmbil.val();
    const durasi   = parseInt($durasi.val(), 10);

    if (!startStr || isNaN(durasi)) {
      $tglKembali.val('Return Date');
      $btnBookingWa.hide();
      return;
    }

    const start   = new Date(startStr);
    const kembali = new Date(start);
    // kalau mau hari terakhir sewa, bisa diganti durasi - 1
    // kembali.setDate(kembali.getDate() + durasi - 1);
    kembali.setDate(kembali.getDate() + durasi);

    // Tampil di input readonly
    $tglKembali.val(formatTanggalIndo(kembali));

    // Isi hidden (format YYYY-MM-DD untuk ke PHP)
    $tglAmbilHidden.val(startStr);
    $durasiHidden.val(durasi);

    const y2 = kembali.getFullYear();
    const m2 = String(kembali.getMonth() + 1).padStart(2, '0');
    const d2 = String(kembali.getDate()).padStart(2, '0');
    $tglKembaliHidden.val(`${y2}-${m2}-${d2}`);

    // Kalau semua sudah terisi → munculin tombol booking
    $btnBookingWa.show();
  }

  // Placeholder awal
  $tglKembali.val('Return Date');
  $btnBookingWa.hide();

  // --- 4. SELECT2 (Wajib ada!) ---
  $durasi.select2({
    minimumResultsForSearch: Infinity,
    width: '100%'
  });

  // --- 5. Hitung saat ada perubahan ---
  $tglAmbil.on('change', updateBookingInfo);
  $durasi.on('change', updateBookingInfo);
});
</script>

</body>
</html>
