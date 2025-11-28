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

      <div class="col-lg-5 mb-5">
        <img src="image/<?= $produk['foto']; ?>" class="w-100" alt="">
      </div>

      <div class="col-lg-6 offset-lg-1">
        <h1 class="product-title"><?= $produk['nama']; ?></h1>

        <p class="fs-5" style="text-align: justify;">
          <?= nl2br($produk['detail']); ?>
        </p>

        <p class="text-harga">
          Rp <?= number_format($produk['harga'], 0, ',', '.'); ?>
        </p>

        <p class="fs-5">
          Status Ketersediaan: <strong><?= $produk['ketersediaan_stok']; ?></strong>
        </p>

        <!-- Tombol booking -->
        <a 
          href="https://wa.me/628988712806?text=Hai%20saya%20ingin%20booking%20produk%20<?= urlencode($produk['nama']); ?>" 
          target="_blank"
          class="booking-btn">
          Booking
        </a>
      </div>

      
    <!-- BLOK SEWA (CARD LEBAR DI BAWAH GAMBAR + DETAIL) -->
    <div class="row justify-content-center mt-4">
      <div class="col-lg-8">
        <div class="sewa-card p-3 p-md-4">
          <div class="row gy-3 align-items-end">

            <!-- Tanggal Ambil -->
            <div class="col-md-4">
              <div class="sewa-label">Tanggal Ambil</div>
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

            <!-- Durasi -->
            <div class="col-md-4">
              <div class="sewa-label">Durasi Sewa</div>
              <div class="input-group">
                <select class="form-select" id="durasiSewa">
                  <option value="1">1 Hari</option>
                  <option value="2">2 Hari</option>
                  <option value="3" selected>3 Hari</option>
                  <option value="4">4 Hari</option>
                  <option value="5">5 Hari</option>
                  <option value="6">6 Hari</option>
                  <option value="7">7 Hari</option>
                </select>
              </div>
            </div>

            <!-- Maks. Pengembalian -->
            <div class="col-md-4">
              <div class="sewa-label">Maks. Pengembalian</div>
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
    </div>

    </div>
  </div>
</div>

<!-- Produk Terkait -->
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

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const tglAmbilInput   = document.getElementById('tglAmbil');
  const durasiSelect    = document.getElementById('durasiSewa');
  const tglKembaliInput = document.getElementById('tglKembali');

  // Set default tgl ambil = hari ini
  const today = new Date();
  const yyyy = today.getFullYear();
  const mm   = String(today.getMonth() + 1).padStart(2, '0');
  const dd   = String(today.getDate()).padStart(2, '0');
  tglAmbilInput.value = `${yyyy}-${mm}-${dd}`;

  function formatTanggalIndo(date) {
    const hari  = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
    const bulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

    const h = hari[date.getDay()];
    const d = String(date.getDate()).padStart(2, '0');
    const b = bulan[date.getMonth()];
    const y = date.getFullYear();
    return `${h}, ${d} ${b} ${y}`;
  }

  function updateTglKembali() {
    if (!tglAmbilInput.value) return;

    const start = new Date(tglAmbilInput.value);
    const durasi = parseInt(durasiSelect.value || '1', 10);

    // di sini aku buat: kembali = tgl ambil + durasi hari
    // (kalau mau beda logika tinggal ubah angka +durasi)
    const kembali = new Date(start);
    kembali.setDate(kembali.getDate() + durasi);

    tglKembaliInput.value = formatTanggalIndo(kembali);
  }

  // Hitung pertama kali
  updateTglKembali();

  // Recalculate kalau user ganti tanggal / durasi
  tglAmbilInput.addEventListener('change', updateTglKembali);
  durasiSelect.addEventListener('change', updateTglKembali);
});
</script>

</body>
</html>