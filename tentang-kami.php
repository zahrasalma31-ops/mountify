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
    <div class="container-fluid py-4 help-main-section">
        <div class="container">

            <!-- Tabs -->
            <ul class="nav justify-content-center help-tabs mb-4" id="helpTab" role="tablist">
                <!-- RENT -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="rent-tab" data-bs-toggle="tab"
                            data-bs-target="#tab-rent" type="button" role="tab">
                        <i class="fas fa-campground"></i>
                        <span>Rent</span>
                    </button>
                </li>

                <!-- T&C -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tnc-tab" data-bs-toggle="tab"
                            data-bs-target="#tab-tnc" type="button" role="tab">
                        <i class="fas fa-file-contract"></i>
                        <span>T&amp;C</span>
                    </button>
                </li>

                <!-- RETURNS -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="returns-tab" data-bs-toggle="tab"
                            data-bs-target="#tab-returns" type="button" role="tab">
                        <i class="fas fa-undo-alt"></i>
                        <span>Returns</span>
                    </button>
                </li>

                <!-- OPERATIONAL -->
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

                <!-- =================== RENT =================== -->
                <div class="tab-pane fade show active" id="tab-rent" role="tabpanel" aria-labelledby="rent-tab">
                    <div class="help-box help-rent-box">

                        <h3 class="help-section-title text-center mb-1">CARA SEWA</h3>
                        <p class="help-section-subtitle text-center mb-4">
                            Panduan Penyewaan Peralatan di Mountify Outdoor
                        </p>

                        <p>
                            Sebagai penyedia layanan penyewaan peralatan pendakian dan kegiatan outdoor, 
                            <strong>Mountify Outdoor</strong> berkomitmen memberikan kemudahan dan kenyamanan dalam setiap proses pemesanan. 
                            Berikut langkah-langkah yang perlu Anda ikuti:
                        </p>

                        <ol class="help-list mt-3">
                            <li>
                                <strong>Periksa Ketersediaan Peralatan</strong>
                                <ul>
                                    <li>Silakan kunjungi situs resmi Mountify Outdoor untuk melihat daftar peralatan yang tersedia untuk disewa.</li>
                                    <li>Informasi tersebut diperbarui secara berkala agar Anda dapat merencanakan kegiatan dengan lebih tepat.</li>
                                </ul>
                            </li>

                            <li>
                                <strong>Pastikan Anda Telah Terdaftar sebagai Anggota</strong>
                                <ul>
                                    <li>Layanan penyewaan hanya tersedia bagi pengguna yang telah menjadi anggota resmi Mountify Outdoor.</li>
                                    <li>Jika Anda belum memiliki akun, silakan lakukan pendaftaran terlebih dahulu melalui website kami.</li>
                                    <li>Panduan lengkap mengenai proses registrasi tersedia di laman keanggotaan.</li>
                                </ul>
                            </li>

                            <li>
                                <strong>Pilih Barang dan Lakukan Transaksi melalui Website</strong>
                                <ul>
                                    <li>Setelah memastikan Anda telah menjadi anggota, silakan pilih peralatan yang diinginkan melalui website Mountify Outdoor.</li>
                                    <li>Lanjutkan transaksi penyewaan secara langsung di website dan unggah bukti pembayaran pada halaman yang telah disediakan.</li>
                                    <li>Setelah bukti pembayaran diunggah, harap konfirmasikan kepada tim Mountify Outdoor melalui WhatsApp untuk memastikan proses penyewaan berjalan dengan lancar.</li>
                                </ul>
                            </li>

                            <li>
                                <strong>Pengambilan Peralatan di Lokasi Store</strong>
                                <ul>
                                    <li>Datanglah ke store Mountify Outdoor di Tembalang sesuai dengan jadwal pengambilan yang telah disepakati.</li>
                                    <li>Informasi lengkap mengenai lokasi, waktu operasional, dan prosedur pengambilan peralatan tersedia di website.</li>
                                </ul>
                            </li>

                            <li>
                                <strong>Gunakan Peralatan dengan Tanggung Jawab</strong>
                                <ul>
                                    <li>Selama masa sewa, harap gunakan peralatan sesuai fungsinya dan dengan penuh kehati-hatian.</li>
                                    <li>Jaga kondisi peralatan sebagaimana Anda menjaga perlengkapan pribadi.</li>
                                    <li>Bila terjadi kerusakan akibat kelalaian, akan dikenakan denda sesuai ketentuan yang berlaku secara wajar.</li>
                                    <li>Segera laporkan jika terdapat kerusakan atau kendala teknis pada peralatan kepada tim Mountify Outdoor.</li>
                                </ul>
                            </li>

                            <li>
                                <strong>Pengembalian Peralatan</strong>
                                <ul>
                                    <li>Setelah masa sewa berakhir, kembalikan peralatan ke store Mountify Outdoor sesuai jadwal yang ditentukan.</li>
                                    <li>Peralatan tidak perlu dicuci sebelum dikembalikan. Tim kami yang menangani proses pembersihan.</li>
                                    <li>Detail lebih lanjut mengenai prosedur pengembalian tersedia di laman panduan.</li>
                                </ul>
                            </li>
                        </ol>

                        <p class="mt-3">
                            <strong>Butuh bantuan?</strong> Hubungi WhatsApp resmi Mountify Outdoor
                            untuk informasi dan pertanyaan lebih lanjut.
                        </p>

                    </div>
                </div>

                <!-- =================== T&C =================== -->
                <div class="tab-pane fade" id="tab-tnc" role="tabpanel" aria-labelledby="tnc-tab">
                    <div class="help-box">
                        <h3 class="help-section-title text-center mb-1">
                            Terms &amp; Conditions (T&amp;C)
                        </h3>
                        <p class="help-section-subtitle text-center mb-4">
                            Syarat &amp; Ketentuan Layanan Penyewaan Mountify Outdoor
                        </p>

                        <ol class="help-list">
                            <!-- 1. UMUM -->
                            <li>
                                <strong>Umum</strong>
                                <ul>
                                    <li>
                                        <strong>Persetujuan terhadap Syarat &amp; Ketentuan</strong><br>
                                        Dengan mengakses dan menggunakan layanan <strong>Mountify Outdoor</strong>, pelanggan dianggap telah membaca, memahami, dan menyetujui seluruh syarat dan ketentuan yang berlaku. Penggunaan layanan ini mengindikasikan persetujuan pelanggan terhadap ketentuan yang ditetapkan oleh Mountify Outdoor.
                                    </li>
                                    <li>
                                        <strong>Perubahan Ketentuan</strong><br>
                                        Mountify Outdoor berhak untuk mengubah syarat dan ketentuan ini kapan saja tanpa pemberitahuan sebelumnya. Pelanggan disarankan untuk memeriksa secara berkala ketentuan yang berlaku di situs web kami sebelum menggunakan layanan.
                                    </li>
                                    <li>
                                        <strong>Batasan Layanan</strong><br>
                                        Layanan kami hanya tersedia untuk Warga Negara Indonesia (WNI) yang berdomisili di wilayah Tembalang, Kota Semarang dan sekitarnya.
                                    </li>
                                    <li>
                                        <strong>Informasi Kontak</strong><br>
                                        Pelanggan diwajibkan memiliki email dan nomor WhatsApp aktif yang dapat dihubungi untuk memanfaatkan layanan dari Mountify Outdoor.
                                    </li>
                                    <li>
                                        <strong>Jenis Pelanggan</strong><br>
                                        Mountify Outdoor hanya melayani penyewaan untuk individu (perorangan) dan tidak menyediakan layanan penyewaan untuk badan usaha, organisasi, atau institusi.
                                    </li>
                                    <li>
                                        <strong>Komitmen dan Tanggung Jawab</strong><br>
                                        Dengan melakukan penyewaan, pelanggan menyatakan bersedia untuk mengganti kerugian yang timbul akibat kerusakan atau kehilangan alat yang disewa selama periode sewa.
                                    </li>
                                    <li>
                                        <strong>Penggunaan Alat</strong><br>
                                        Pelanggan dilarang menggunakan alat untuk kegiatan yang bertentangan dengan hukum yang berlaku, norma sosial, atau agama.
                                    </li>
                                    <li>
                                        <strong>Alih Tangan</strong><br>
                                        Alat yang disewa tidak boleh dipindahtangankan atau digunakan oleh pihak ketiga tanpa persetujuan resmi dari Mountify Outdoor.
                                    </li>
                                    <li>
                                        <strong>Tanggung Jawab Perawatan</strong><br>
                                        Pelanggan bertanggung jawab penuh untuk merawat dan menjaga kondisi alat yang disewa selama masa sewa.
                                    </li>
                                    <li>
                                        <strong>Pemahaman Penggunaan Alat</strong><br>
                                        Pelanggan hanya diperbolehkan menyewa alat yang sudah dipahami cara penggunaannya. Mountify Outdoor tidak bertanggung jawab atas kerusakan yang disebabkan oleh ketidaktahuan dalam penggunaan alat.
                                    </li>
                                    <li>
                                        <strong>Kondisi Produk</strong><br>
                                        Kondisi alat yang diterima oleh pelanggan mungkin berbeda dari foto yang ditampilkan di situs web. Foto-foto tersebut bersifat ilustratif dan menunjukkan kondisi produk saat baru.
                                    </li>
                                </ul>
                            </li>

                            <!-- 2. PEMESANAN (ORDER) -->
                            <li>
                                <strong>Pemesanan (Order)</strong>
                                <ul>
                                    <li>
                                        <strong>Waktu &amp; Perhitungan Sewa</strong><br>
                                        Harga sewa dihitung pada hari berikutnya setelah pengambilan alat. Durasi sewa dihitung sesuai ketentuan berikut:
                                        <ul>
                                            <li>Tembalang: Bayar 2 hari sewa untuk 4 hari, dengan pengambilan hari ini dihitung mulai besok.</li>
                                            <li>Jarak antara tanggal pemesanan dan pengambilan alat maksimal 2 bulan.</li>
                                            <li>Pelanggan tidak diperbolehkan membuat pesanan berturut-turut dengan jeda lebih dari 7 hari.</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong>Pembatalan &amp; Perubahan Jadwal</strong><br>
                                        Mountify Outdoor berhak mengubah atau membatalkan pemesanan pelanggan jika diperlukan. Biaya pembatalan untuk Non Member dan Member Classic:
                                        <ul>
                                            <li>Pembatalan dalam 1 jam sejak pemesanan dibuat → 5% dari total biaya sewa.</li>
                                            <li>H-4 atau lebih sebelum tanggal sewa → 25% dari total biaya sewa.</li>
                                            <li>H-3 hingga H-1 sebelum tanggal sewa → 50% dari total biaya sewa.</li>
                                            <li>Hari H (sebelum jam 09.00) → 75% dari total biaya sewa.</li>
                                            <li>Hari H (jam 09.00 atau setelahnya) → 100% dari total biaya sewa.</li>
                                        </ul>
                                        Perubahan tanggal (reschedule) dikenakan biaya yang setara dengan biaya pembatalan.<br>
                                        Untuk Member Pro, pembatalan dapat dilakukan secara gratis hingga H-2 sebelum tanggal sewa. Pembatalan pada H-1 atau Hari H akan dikenakan biaya 50% dari total biaya sewa.
                                    </li>
                                    <li>
                                        <strong>Perpanjangan Masa Sewa (Extend)</strong><br>
                                        Pelanggan harus mengajukan izin terlebih dahulu kepada Mountify Outdoor untuk memperpanjang masa sewa. Permintaan perpanjangan akan dipertimbangkan dan dapat ditolak sesuai kebijakan internal.
                                    </li>
                                    <li>
                                        <strong>Pengembalian Dana (Refund)</strong><br>
                                        Jika dalam 3 hari pelanggan tidak merespons proses refund atas deposit atau pembatalan pemesanan, maka refund akan dianggap kedaluwarsa. Jika respons diberikan setelah kedaluwarsa, akan dikenakan biaya administrasi sebesar 10% dari nominal refund (maksimal Rp150.000). Jika hingga hari ke-30 tidak ada respons, maka nilai refund dianggap hangus dan sepenuhnya menjadi milik Mountify Outdoor.
                                    </li>
                                    <li>
                                        <strong>Promo</strong><br>
                                        Promo yang berlaku dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya.
                                    </li>
                                    <li>
                                        <strong>Layanan Antar-Jemput</strong><br>
                                        Ketentuan lengkap mengenai layanan antar-jemput dapat dilihat di situs resmi Mountify Outdoor (misalnya: www.mountifyoutdoor.com/antar-jemput).
                                    </li>
                                </ul>
                            </li>

                            <!-- 3. PENGAMBILAN ALAT -->
                            <li>
                                <strong>Pengambilan Alat</strong>
                                <ul>
                                    <li>
                                        <strong>Pengambilan Mandiri</strong><br>
                                        Pelanggan diwajibkan untuk mengambil alat secara langsung di lokasi yang telah ditentukan oleh Mountify Outdoor di Tembalang.
                                    </li>
                                    <li>
                                        <strong>Pengambilan oleh Perwakilan</strong><br>
                                        Jika pelanggan tidak dapat hadir, pelanggan dapat menunjuk perwakilan dengan syarat:
                                        <ul>
                                            <li>Perwakilan mampu memeriksa fisik, kelengkapan, dan fungsi alat saat pengambilan.</li>
                                            <li>Segala kendala setelah alat diambil menjadi tanggung jawab penuh pelanggan, meskipun alat diambil oleh perwakilan.</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong>Penitipan KTP Non-Member dan Member Classic</strong><br>
                                        Sebagai bentuk komitmen, pelanggan atau perwakilannya wajib menitipkan KTP asli kepada Mountify Outdoor selama masa sewa. KTP akan dikembalikan setelah alat dikembalikan dalam kondisi sesuai saat pengambilan.
                                    </li>
                                    <li>
                                        <strong>Persetujuan Kondisi Alat</strong><br>
                                        Setelah pengambilan alat dilakukan dan ditandatangani tanpa catatan, alat dianggap telah diambil dalam kondisi baik, berfungsi dengan baik, dan lengkap. Segala masalah yang timbul setelahnya menjadi tanggung jawab pelanggan.
                                    </li>
                                </ul>
                            </li>

                            <!-- 4. PENGEMBALIAN ALAT -->
                            <li>
                                <strong>Pengembalian Alat</strong>
                                <ul>
                                    <li>
                                        <strong>Pengembalian Mandiri</strong><br>
                                        Pelanggan diwajibkan mengembalikan alat secara langsung.
                                    </li>
                                    <li>
                                        <strong>Keterlambatan Pengembalian</strong><br>
                                        Keterlambatan hanya diperbolehkan dengan persetujuan Mountify Outdoor. Biaya keterlambatan per hari:
                                        <ul>
                                            <li>00:01 – 12:00 → 10% dari total biaya sewa.</li>
                                            <li>12:01 – 15:00 → 20% dari total biaya sewa.</li>
                                            <li>15:01 – 18:00 → 30% dari total biaya sewa.</li>
                                            <li>18:01 – 21:00 → 50% dari total biaya sewa.</li>
                                        </ul>
                                        Keterlambatan lebih dari pukul 21:00 tanpa pemberitahuan atau izin dianggap sebagai pelanggaran berat dan dapat dikenakan sanksi hukum.
                                    </li>
                                    <li>
                                        <strong>Penanganan Keterlambatan &amp; Pelacakan</strong><br>
                                        Mountify Outdoor berhak mengetahui lokasi alat yang sedang disewa dan melakukan penjemputan paksa terhadap alat yang terlambat dikembalikan.
                                    </li>
                                    <li>
                                        <strong>Sanksi untuk Non-Member</strong><br>
                                        Untuk pelanggan non-member dengan jaminan deposit, jika alat tidak dikembalikan dalam waktu 2×24 jam setelah masa sewa berakhir, uang jaminan akan menjadi hak Mountify Outdoor.
                                    </li>
                                    <li>
                                        <strong>Persetujuan Kondisi Alat</strong><br>
                                        Setelah pengembalian alat dilakukan dan ditandatangani tanpa catatan, alat dianggap telah dikembalikan dalam kondisi baik, berfungsi dengan baik, dan lengkap. Segala masalah yang timbul setelahnya menjadi tanggung jawab Mountify Outdoor.
                                    </li>
                                </ul>
                            </li>

                            <!-- 5. KERUSAKAN ATAU KEHILANGAN -->
                            <li>
                                <strong>Kerusakan atau Kehilangan</strong>
                                <ul>
                                    <li>
                                        <strong>Larangan Modifikasi dan Perbaikan Sendiri</strong><br>
                                        Pelanggan dilarang melakukan modifikasi atau perbaikan sendiri pada alat yang disewa, baik secara hardware maupun software.
                                    </li>
                                    <li>
                                        <strong>Kondisi Tidak Utuh atau Kehilangan Komponen</strong><br>
                                        Jika alat dikembalikan dalam kondisi tidak lengkap atau rusak, Mountify Outdoor akan tetap menerima alat tersebut dan mengenakan biaya resolusi.
                                    </li>
                                    <li>
                                        <strong>Tanggung Jawab atas Kerusakan atau Kehilangan</strong><br>
                                        Pelanggan yang merusak atau menghilangkan alat akan dikenakan tagihan resolusi yang sesuai dengan harga sewa dan komponen yang hilang atau rusak.
                                    </li>
                                </ul>
                            </li>

                            <!-- 6. KETENTUAN TAMBAHAN -->
                            <li>
                                <strong>Ketentuan Tambahan</strong>
                                <ul>
                                    <li>
                                        <strong>Ketentuan Tunggakan &amp; Aktivasi Ulang</strong><br>
                                        Pelanggan yang tidak membayar biaya keterlambatan atau biaya resolusi dalam waktu 7 hari akan disuspend dan seluruh layanan akan ditangguhkan. Untuk dapat kembali menggunakan layanan Mountify Outdoor, pelanggan harus melunasi tunggakan beserta biaya administrasi.
                                    </li>
                                    <li>
                                        <strong>Rekam Jejak Pelanggan</strong><br>
                                        Pelanggan dengan rekam jejak buruk, seperti keterlambatan berulang atau kerusakan alat, dapat dikenakan sanksi berupa penonaktifan keanggotaan.
                                    </li>
                                    <li>
                                        <strong>Etika dan Perlindungan Karyawan</strong><br>
                                        Mountify Outdoor mendukung hak-hak karyawan untuk bekerja dalam lingkungan yang aman dan nyaman, serta tidak mentolerir perilaku yang melanggar hukum.
                                    </li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- =================== RETURNS =================== -->
                <div class="tab-pane fade" id="tab-returns" role="tabpanel" aria-labelledby="returns-tab">
                    <div class="help-box">
                        <h3 class="help-section-title text-center mb-1">Returns</h3>
                        <p class="help-section-subtitle text-center mb-4">
                            Cara Pengembalian Alat di Mountify Outdoor
                        </p>

                        <p>
                            Setelah menggunakan perlengkapan yang disewa dari <strong>Mountify Outdoor</strong>, 
                            pengembalian alat adalah bagian penting dari proses penyewaan. Pastikan untuk mengikuti 
                            prosedur pengembalian dengan cermat untuk menghindari biaya keterlambatan atau masalah lainnya.
                            Berikut adalah panduan lengkap cara pengembalian alat di Mountify Outdoor.
                        </p>

                        <h5 class="mt-3 mb-2" style="color:#294B29; font-weight:700;">Langkah-langkah Pengembalian Alat</h5>

                        <ol class="help-list">
                            <li>
                                <strong>Pengembalian Mandiri</strong>
                                <ul>
                                    <li>Pelanggan diwajibkan untuk mengembalikan alat secara langsung ke lokasi Mountify Outdoor di Tembalang sesuai dengan tanggal dan waktu yang telah disepakati saat pemesanan.</li>
                                    <li>Pastikan Anda membawa alat dalam kondisi yang baik dan lengkap, sesuai dengan saat alat diterima.</li>
                                </ul>
                            </li>

                            <li>
                                <strong>Pengembalian dengan Ojek Online (untuk Member Pro)</strong>
                                <ul>
                                    <li>Member Pro dapat mengembalikan alat dengan menggunakan layanan ojek online. Proses pengembalian wajib dipantau hingga alat sampai di lokasi Mountify Outdoor.</li>
                                    <li>Member Pro tidak diwajibkan untuk menitipkan KTP sebagai jaminan karena sudah mendapatkan prioritas dan kepercayaan lebih dalam proses penyewaan alat.</li>
                                    <li>Alat yang dikembalikan dengan ojek online akan dipastikan sampai ke lokasi dengan konfirmasi dari pengemudi yang mengantarkan. Mountify Outdoor akan memeriksa alat setelah diterima dan memberi konfirmasi kepada pelanggan.</li>
                                </ul>
                            </li>

                            <li>
                                <strong>Keterlambatan Pengembalian</strong>
                                <ul>
                                    <li>Keterlambatan pengembalian hanya diperbolehkan jika telah mendapat persetujuan dari Mountify Outdoor sebelumnya.</li>
                                    <li>Jika pengembalian terlambat tanpa pemberitahuan atau persetujuan, biaya keterlambatan akan dikenakan sesuai dengan ketentuan yang berlaku. Biaya keterlambatan per hari:
                                        <ul>
                                            <li>00:01 – 12:00 → 10% dari total biaya sewa.</li>
                                            <li>12:01 – 15:00 → 20% dari total biaya sewa.</li>
                                            <li>15:01 – 18:00 → 30% dari total biaya sewa.</li>
                                            <li>18:01 – 21:00 → 50% dari total biaya sewa.</li>
                                        </ul>
                                    </li>
                                    <li>Keterlambatan lebih dari pukul 21:00 tanpa pemberitahuan atau izin dianggap sebagai pelanggaran berat dan dapat dikenakan sanksi hukum.</li>
                                    <li>Keterlambatan lebih dari pukul 12:00 tanpa izin tertentu dapat dikenakan biaya keterlambatan tambahan hingga 100% dari total biaya sewa.</li>
                                </ul>
                            </li>

                            <li>
                                <strong>Penanganan Keterlambatan &amp; Pelacakan</strong>
                                <ul>
                                    <li>Mountify Outdoor berhak untuk mengetahui lokasi alat yang sedang disewa oleh pelanggan dan melakukan penjemputan paksa terhadap alat yang terlambat dikembalikan.</li>
                                </ul>
                            </li>

                            <li>
                                <strong>Pengembalian oleh Perwakilan</strong>
                                <ul>
                                    <li>Jika pelanggan tidak dapat mengembalikan alat secara langsung, pelanggan dapat menunjuk perwakilan dengan syarat:</li>
                                    <li>Perwakilan memiliki kemampuan untuk memeriksa kondisi fisik, kelengkapan, dan fungsi alat saat pengembalian.</li>
                                    <li>Segala kendala yang timbul setelah alat dikembalikan menjadi tanggung jawab penuh pelanggan, meskipun alat dikembalikan oleh perwakilan.</li>
                                </ul>
                            </li>

                            <li>
                                <strong>Sanksi untuk Non-Member</strong>
                                <ul>
                                    <li>Untuk pelanggan non-member yang menyewa dengan jaminan deposit, jika alat tidak dikembalikan dalam waktu 2×24 jam setelah masa sewa berakhir, uang jaminan (deposit) akan menjadi hak Mountify Outdoor.</li>
                                    <li>Jika nilai deposit tidak mencukupi untuk mengganti kerugian atau kerusakan alat, pelanggan wajib melunasi selisih kekurangan tersebut.</li>
                                </ul>
                            </li>

                            <li>
                                <strong>Persetujuan Kondisi Alat</strong>
                                <ul>
                                    <li>Setelah alat dikembalikan, Mountify Outdoor akan memeriksa kondisi alat secara menyeluruh.</li>
                                    <li>Jika alat diterima tanpa kerusakan fisik dan berfungsi dengan baik, pelanggan akan diminta untuk menandatangani surat pengembalian tanpa catatan.</li>
                                    <li>Segala masalah atau kerusakan yang timbul setelah alat dikembalikan dalam kondisi baik menjadi tanggung jawab Mountify Outdoor.</li>
                                </ul>
                            </li>
                        </ol>

                        <h5 class="mt-3 mb-2" style="color:#294B29; font-weight:700;">Penting untuk Diperhatikan</h5>
                        <ul class="help-list">
                            <li><strong>Kondisi Alat Saat Pengembalian:</strong> Pastikan alat dikembalikan dalam kondisi yang sesuai dengan saat alat pertama kali diterima, tanpa adanya kerusakan atau kehilangan komponen.</li>
                            <li><strong>Biaya Keterlambatan:</strong> Keterlambatan pengembalian yang tidak disertai pemberitahuan atau izin dari Mountify Outdoor akan dikenakan biaya tambahan sesuai ketentuan yang berlaku.</li>
                            <li><strong>Pengembalian yang Tidak Sesuai:</strong> Alat yang dikembalikan dalam kondisi tidak lengkap atau rusak akan dikenakan biaya resolusi yang setara dengan biaya penggantian atau perbaikan alat.</li>
                        </ul>

                        <h5 class="mt-3 mb-2" style="color:#294B29; font-weight:700;">Proses Pengembalian Dana (Refund)</h5>
                        <ul class="help-list">
                            <li>Apabila ada permintaan refund untuk pengembalian deposit atau pembatalan pesanan, pelanggan harus merespons proses refund dalam waktu 3 hari. Setelah itu, refund akan dianggap kedaluwarsa.</li>
                            <li>Jika respons diberikan setelah kedaluwarsa, akan dikenakan biaya administrasi sebesar 10% dari nominal refund (maksimal Rp150.000).</li>
                            <li>Jika hingga hari ke-30 tidak ada respons, maka nilai refund akan dianggap hangus dan menjadi hak Mountify Outdoor.</li>
                        </ul>
                    </div>
                </div>

                <!-- =================== OPERATIONAL =================== -->
                <div class="tab-pane fade" id="tab-operational" role="tabpanel" aria-labelledby="operational-tab">
                    <div class="help-box">
                        <h3 class="help-section-title text-center mb-1">Operational</h3>
                        <p class="help-section-subtitle text-center mb-4">Informasi &amp; Waktu Operasional Mountify Outdoor</p>

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

            </div> <!-- end .tab-content -->

        </div>
    </div>
    
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>