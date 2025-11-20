<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mountify | About Us</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid banner-produk d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Help</h1>
        </div>
    </div>

    <!-- main -->
    <div class="container-fluid py-5">
        <div class="container">

            <!-- Tabs -->
            <ul class="nav justify-content-center help-tabs mb-4" id="helpTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="rent-tab" data-bs-toggle="tab"
                            data-bs-target="#tab-rent" type="button" role="tab">
                        <i class="fas fa-campground"></i>
                        <span>Rent</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="payment-tab" data-bs-toggle="tab"
                            data-bs-target="#tab-payment" type="button" role="tab">
                        <i class="fas fa-credit-card"></i>
                        <span>Payment</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reschedule-tab" data-bs-toggle="tab"
                            data-bs-target="#tab-reschedule" type="button" role="tab">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Reschedule</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cancel-tab" data-bs-toggle="tab"
                            data-bs-target="#tab-cancel" type="button" role="tab">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancel &amp; Refund</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="operational-tab" data-bs-toggle="tab"
                            data-bs-target="#tab-operational" type="button" role="tab">
                        <i class="fas fa-clock"></i>
                        <span>Operational</span>
                    </button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">

                <!-- RENT (tetap angka) -->
                <div class="tab-pane fade show active" id="tab-rent" role="tabpanel" aria-labelledby="rent-tab">
                    <h3 class="help-section-title">Rent</h3>
                    <p class="help-section-subtitle">Informasi &amp; Petunjuk Sewa</p>
                    <ol class="help-list">
                        <li>Buka website Mountify dan pilih menu <strong>Product</strong>.</li>
                        <li>Telusuri produk yang tersedia dan baca deskripsi serta detail perlengkapannya.</li>
                        <li>Setelah menentukan perlengkapan yang ingin disewa, tekan tombol
                            <strong>“Booking”</strong> untuk melakukan pemesanan.</li>
                        <li>Kirim detail pesananmu melalui WhatsApp sesuai format yang tertera.</li>
                        <li>Tim Mountify akan mengonfirmasi ketersediaan alat dan total biaya sewa.</li>
                        <li>Lakukan pembayaran sesuai instruksi yang diberikan.</li>
                        <li>Ambil dan kembalikan alat di Basecamp Mountify, Tembalang – Semarang sesuai jadwal booking
                            (check-in &amp; check-out).</li>
                        <li>Keterlambatan pengembalian dikenakan biaya tambahan per hari sesuai harga reguler.</li>
                        <li>Mohon menjaga perlengkapan selama masa sewa. Kerusakan atau kehilangan menjadi
                            tanggung jawab penyewa dan dikenakan biaya ganti sesuai kondisi alat.</li>
                        <li>Gunakan dengan bijak, jaga kebersihan, dan nikmati petualanganmu bersama Mountify!</li>
                    </ol>
                </div>

                <!-- PAYMENT: judul metode TIDAK bernomor, pakai ikon -->
                <div class="tab-pane fade" id="tab-payment" role="tabpanel" aria-labelledby="payment-tab">
                    <h3 class="help-section-title">Payment</h3>
                    <p class="help-section-subtitle">Informasi &amp; Petunjuk Pembayaran</p>

                    <p><strong>Untuk memudahkan proses transaksi, Mountify menyediakan beberapa metode pembayaran yang bisa kamu pilih sesuai kebutuhan:</strong></p>

                    <ul class="help-list help-payment-main">
                        <li>
                            <div class="help-payment-title">
                                <i class="fas fa-university"></i>
                                <span>Transfer Bank</span>
                            </div>
                            <ul>
                                <li>Lakukan pembayaran ke rekening resmi Mountify yang akan dikirim melalui WhatsApp saat konfirmasi pesanan.</li>
                                <li>Setelah melakukan transfer, kirim bukti pembayaran melalui WhatsApp sebagai konfirmasi.</li>
                                <li>Tim Mountify akan memverifikasi pembayaranmu dan mengonfirmasi pesanan dalam waktu maksimal 1×24 jam.</li>
                            </ul>
                        </li>
                        <li>
                            <div class="help-payment-title">
                                <i class="fas fa-wallet"></i>
                                <span>Pembayaran Via E-wallet</span>
                            </div>
                            <ul>
                                <li>Nikmati transaksi yang lebih cepat dan praktis menggunakan e-wallet seperti GoPay, OVO, Dana, atau ShopeePay.</li>
                                <li>Pilih metode e-wallet yang kamu gunakan saat proses konfirmasi pemesanan.</li>
                                <li>Setelah pembayaran berhasil, kirimkan screenshot bukti pembayaran melalui WhatsApp sebagai verifikasi.</li>
                                <li>Tim Mountify akan memverifikasi pembayaranmu dan mengonfirmasi pesanan dalam waktu maksimal 1×24 jam.</li>
                            </ul>
                        </li>
                        <li>
                            <div class="help-payment-title">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>Pembayaran Tunai</span>
                            </div>
                            <ul>
                                <li>Pembayaran tunai dapat dilakukan saat pengambilan alat di Basecamp Mountify, Tembalang, Semarang.</li>
                                <li>Mohon siapkan uang pas untuk mempercepat proses transaksi.</li>
                                <li>Setelah pembayaran diterima, pelanggan akan mendapatkan bukti pembayaran fisik atau digital.</li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- RESCHEDULE (tetap angka) -->
                <div class="tab-pane fade" id="tab-reschedule" role="tabpanel" aria-labelledby="reschedule-tab">
                    <h3 class="help-section-title">Reschedule</h3>
                    <p class="help-section-subtitle">Informasi &amp; Petunjuk Reschedule</p>

                    <p>Jika kamu perlu mengubah jadwal penyewaan, silakan perhatikan ketentuan berikut agar proses berjalan lancar:</p>
                    <ol class="help-list">
                        <li>Pengajuan perubahan jadwal dilakukan melalui WhatsApp resmi Mountify pada jam operasional. Pengajuan di luar jam operasional akan diproses pada hari berikutnya.</li>
                        <li>Pengajuan perubahan jadwal maksimal 1 (satu) hari sebelum tanggal mulai sewa (<em>start date</em>).</li>
                        <li>Perubahan hanya berlaku untuk satu periode sewa (booking) dan per jenis produk.</li>
                        <li>Sebelum mengajukan perubahan, pastikan ketersediaan alat dengan melihat informasi produk di website Mountify.</li>
                        <li>Hubungi tim Mountify melalui WhatsApp untuk mengajukan perubahan jadwal. Setelah itu, tim kami akan mengirimkan formulir reschedule yang perlu kamu isi secara lengkap.</li>
                        <li>Setelah formulir dikirim kembali, tim Mountify akan memeriksa ketersediaan produk dan memberikan konfirmasi melalui WhatsApp.</li>
                        <li>Persetujuan perubahan jadwal tergantung pada ketersediaan produk sewa, dan Mountify berhak menolak pengajuan jika alat tidak tersedia pada tanggal baru.</li>
                        <li>Periode sewa yang telah dikonfirmasi tidak dapat ditambah atau dikurangi, kecuali dengan membuat pemesanan baru.</li>
                        <li>Pastikan kamu telah menerima konfirmasi dari tim Mountify agar perubahan jadwalmu resmi tercatat.</li>
                    </ol>
                </div>

                <!-- CANCEL & REFUND -->
                <div class="tab-pane fade" id="tab-cancel" role="tabpanel" aria-labelledby="cancel-tab">
                    <h3 class="help-section-title">Cancel &amp; Refund</h3>
                    <p class="help-section-subtitle">Informasi Pembatalan dan Pengembalian Dana</p>

                    <!-- Heading dengan icon sebagai "bullet" -->
                    <ul class="help-cancel-heading">
                        <li><i class="fas fa-user-times"></i> <span>Pembatalan oleh Penyewa</span></li>
                    </ul>
                    <!-- Isi tetap list angka -->
                    <ol class="help-list">
                        <li>Pembatalan dapat dilakukan maksimal 2×24 jam sebelum tanggal pengambilan alat.</li>
                        <li>Pembatalan yang dilakukan lebih dari 2×24 jam sebelum jadwal akan dikenakan potongan 10% sebagai biaya administrasi.</li>
                        <li>Pembatalan kurang dari 24 jam sebelum tanggal sewa akan dikenakan potongan 50% dari total biaya sewa.</li>
                        <li>Pembatalan pada hari pengambilan alat atau setelah alat diambil tidak berhak atas pengembalian dana (<em>non-refundable</em>).</li>
                    </ol>

                    <!-- Heading kedua -->
                    <ul class="help-cancel-heading mt-3">
                        <li><i class="fas fa-store-alt"></i> <span>Pembatalan oleh Pihak Penyedia</span></li>
                    </ul>
                    <!-- Isi kalimat biasa -->
                    <p class="mb-0">
                        Jika pembatalan dilakukan oleh pihak penyedia (misalnya karena alat rusak, hilang, atau alasan operasional lainnya),
                        maka penyewa berhak mendapatkan pengembalian dana 100% atau menjadwal ulang tanpa biaya tambahan
                        (jika alat masih tersedia di tanggal baru).
                    </p>
                </div>

                <!-- OPERATIONAL -->
                <div class="tab-pane fade" id="tab-operational" role="tabpanel" aria-labelledby="operational-tab">
                    <h3 class="help-section-title">Operational</h3>
                    <p class="help-section-subtitle">Informasi &amp; Waktu Operasional Mountify Outdoor</p>

                    <!-- Lokasi -->
                    <div class="help-operational-block">
                        <p class="help-operational-title">📍 Lokasi Basecamp</p>
                        <p class="mb-0">Jl. Banjarsari No. 27, Tembalang – Semarang</p>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="help-operational-block">
                        <p class="help-operational-title">🕒 Jam Operasional</p>
                        <ul class="help-operational-list">
                            <li>Senin – Jumat: 08.00 – 20.00 WIB</li>
                            <li>Sabtu – Minggu &amp; Hari Libur: 06.00 – 21.00 WIB</li>
                        </ul>
                    </div>

                    <!-- Ketentuan Operasional -->
                    <div class="help-operational-block">
                        <p class="help-operational-title">🧭 Ketentuan Operasional</p>
                        <ul class="help-operational-list">
                            <li>Proses pengambilan dan pengembalian perlengkapan hanya dapat dilakukan pada jam operasional.</li>
                            <li>Pemesanan online tetap dapat dilakukan 24 jam melalui website dan WhatsApp.</li>
                            <li>Untuk pengambilan di luar jam operasional, harap melakukan konfirmasi minimal 1 hari sebelumnya melalui admin.</li>
                            <li>Pemeriksaan alat dilakukan oleh tim Mountify saat alat diambil dan dikembalikan untuk memastikan kondisi tetap layak pakai.</li>
                            <li>Jika terjadi kerusakan atau kehilangan saat di luar jam operasional, segera laporkan melalui WhatsApp resmi Mountify.</li>
                            <li>Jadwal operasional dapat berubah sewaktu-waktu sesuai kebijakan manajemen Mountify (akan diumumkan melalui website atau media sosial resmi).</li>
                        </ul>
                    </div>

                    <!-- Kontak Operasional -->
                    <div class="help-operational-block">
                        <p class="help-operational-title">☎️ Kontak Operasional</p>
                        <ul class="help-operational-list">
                            <li>WhatsApp Admin: +62 895 2330 2968</li>
                            <li>Instagram: @mountify.outdoor</li>
                            <li>Email: info@mountify.com</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>