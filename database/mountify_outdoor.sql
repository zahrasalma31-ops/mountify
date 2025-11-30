-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2025 at 07:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mountify_outdoor`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `kode_booking` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tgl_ambil` date NOT NULL,
  `durasi_hari` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Processing',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `kode_booking`, `id_user`, `id_produk`, `tgl_ambil`, `durasi_hari`, `tgl_kembali`, `total_biaya`, `status`, `created_at`) VALUES
(1, 'BK-20251129104925', 3, 26, '2025-11-29', 2, '2025-12-01', 80000, 'Processing', '2025-11-29 10:49:25'),
(9, 'BK-20251130074726', 3, 25, '2025-11-30', 3, '2025-12-03', 120000, 'Confirmed', '2025-11-30 07:47:26'),
(10, 'BK-20251130075006', 3, 18, '2025-11-30', 5, '2025-12-05', 175000, 'Processing', '2025-11-30 07:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(3, 'Sleeping Bag'),
(4, 'Hiking Shoes'),
(5, 'Trail Running Shoes'),
(6, 'Jacket'),
(7, 'Tent'),
(8, 'Carrier'),
(9, 'Hiking Packs'),
(10, 'Cooking Set'),
(11, 'Camping Gear'),
(12, 'Hiking Gear'),
(13, 'Apparel');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama_depan`, `nama_belakang`, `email`, `telepon`, `pesan`, `tanggal`) VALUES
(2, 'Zahra', 'Meylinda', 'zahrasalma31@gmail.com', '085640270051', 'halaman admin misalnya adminpanel/kontak.php yang menampilkan semua pesan dari tabel itu.', '2025-11-26 13:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `ketersediaan_stok` enum('Tidak tersedia','Tersedia') DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `ketersediaan_stok`) VALUES
(6, 9, 'Aonijie C9116 Hydration Backpack Vest', 30000, '5xzuZ9hrPYxp9fGdWCGy.png', 'Hydration vest ringan untuk trail run, hiking, gowes, atau summit. Kapasitas 10L dengan kompartemen lengkap buat HP, snack, soft flask, dan perlengkapan kecil. Nyaman dipakai, breathable, dan stabil saat bergerak.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas 10L\r\n• Material ringan (Nylon + Spandex)\r\n• Bobot cuma ±222g\r\n• Mesh breathable\r\n• Banyak kantong fungsional\r\n• Adjustable strap, fit di badan\r\n\r\n𝗖𝗼𝗰𝗼𝗸 𝘂𝗻𝘁𝘂𝗸 : Hiking, trail running, summit, speed hiking, cycling.', 'Tersedia'),
(7, 7, 'BigAdventure Tambora Series - Tenda 2P', 45000, 'zhOu5VUcySWELDWEBvUi.jpg', 'Bigadventure Tambora Series adalah tenda kapasitas 2 orang dengan material premium yang tahan cuaca ekstrem. Cocok untuk pendakian gunung, camping, maupun ekspedisi outdoor. Menggunakan bahan ripstop, waterproof tinggi, serta rangka aluminium yang kuat namun ringan.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗣𝗿𝗼𝗱𝘂𝗸:\r\n• Flysheet: 210T Ripstop Polyester, PU 3000mm, UPF 50+, seam taped\r\n• Inner Tent: 190T Ripstop breathable + B3 mesh\r\n• Lantai Tenda: 210T Ripstop Polyester, PU 3000mm, seam taped\r\n• Footprint: 210T Ripstop Polyester PU 3000mm (200 gram)\r\n• Rangka (Poles): Aluminium 8.5 mm dengan triangle joining\r\n• Pasak: Aluminium Y-stakes\r\n• Guyrope: Reflective D3mm with aluminium stopper\r\n• Fitur Tambahan: Saku penyimpanan, lamp hanger\r\n• Ukuran Terpasang: 210 × (70 + 140 + 70) × 105 cm\r\n• Ukuran Packing: 40 × 15 cm\r\n• Berat: 2350 gram (tanpa footprint)\r\n\r\n𝗞𝗮𝗽𝗮𝘀𝗶𝘁𝗮𝘀 : 2 orang', 'Tersedia'),
(8, 5, '910 Nineten Yuza Evo - Sepatu Trail Running', 45000, 'ALWxgulBnR5isIcfAYBT.jpg', 'Yuza Evo adalah sepatu lari trail terbaru dari Yuza yang dirancang khusus untuk medan alam tropis Indonesia. Menggabungkan teknologi modern untuk memberikan kenyamanan, stabilitas, dan daya tahan maksimal saat berlari di jalur off-road.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗣𝗿𝗼𝗱𝘂𝗸:\r\n• Upper Maxi Breathe: ringan &amp; breathable\r\n• Hexa Cush insole: empuk, tidak mudah panas\r\n• Seamlock: upper kokoh &amp; fleksibel\r\n• HyperWeb: struktur stabil tanpa menambah beban\r\n• Airflex Sole: grip kuat &amp; ringan\r\n• Rubber Tech-Outsole: traksi tinggi, tahan abrasi\r\n\r\n𝗨𝗸𝘂𝗿𝗮𝗻 : 39-44', 'Tersedia'),
(9, 8, 'Osprey Kyte48 Carrier', 45000, 'vEpzDn9lVIlWqVpSaQ45.png', 'Carrier 48 L dari Osprey ini dirancang untuk hiking dan backpacking jangka menengah. Dengan sistem suspensi yang nyaman dan ventilasi punggung yang baik, tas ini cocok untuk membawa beban cukup berat namun tetap menjaga kenyamanan pemakainya. Rangka internal membantu menjaga kestabilan beban, dan desainnya ergonomis untuk pendakian harian ataupun trip akhir pekan.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 48 Liter\r\n• Sistem punggung: AirScape Backpanel\r\n• Rangka: LightWire Internal Frame\r\n• Bahan: Nylon Ripstop tahan abrasi\r\n• Fitur: Raincover bawaan, trekking pole attachment, kompartemen sleeping bag\r\n\r\n𝗪𝗮𝗿𝗻𝗮 : Ungu\r\n', 'Tersedia'),
(10, 4, 'Arizona Arei Outdoor Gear', 30000, 'bWA0geDJDOblLAdUaIgZ.png', 'Sepatu gunung dari Arei Outdoor Gear dengan potongan mid-cut yang memberi proteksi baik di pergelangan kaki saat mendaki. Bagian atas menggunakan kulit asli tahan air (genuine leather) serta mesh poliester untuk sirkulasi udara, sedangkan midsole-nya memakai EVA yang empuk dan outsole karet untuk cengkeraman. Cocok untuk hiking ringan hingga menengah dan petualangan alam terbuka.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Upper kulit asli + mesh\r\n• Midsole EVA (peredam kejut)\r\n• Outsole karet anti-selip\r\n• Potongan mid-cut\r\n• Kuat namun tetap memiliki sirkulasi udara baik\r\n• Cengkeraman kuat di berbagai medan\r\n• Proteksi pergelangan kaki lebih aman\r\n\r\n𝗨𝗸𝘂𝗿𝗮𝗻: 38-44', 'Tersedia'),
(11, 11, 'Eiger Women Camp Chair &amp; Table', 35000, '9QLhyB2WIMtFWATthG5n.png', 'Set kursi dan meja camping khusus wanita dengan desain ergonomis serta tinggi kursi yang menyesuaikan postur tubuh. Menggunakan bahan ringan namun kuat, memberikan kenyamanan maksimal saat kegiatan outdoor atau travel.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Dimensi Kursi: 52 × 65 cm\r\n• Dimensi Lipat: 35 × 11,5 × 10,5 cm\r\n• Material: Kain poliester + rangka aluminium alloy\r\n• Beban Maksimal: 120 kg\r\n• Fitur: Ergonomis khusus wanita, termasuk tas penyimpanan.\r\n', 'Tersedia'),
(12, 7, 'Quechua Arpenaz 4.1 - Tenda 4P', 50000, 'WhXbPKZBetxzqJvxIRb0.png', 'Tenda dari Quechua dengan kapasitas 4 orang dan satu kamar tidur. Struktur kerangka lengkung (arch) memudahkan pemasangan, dan bagian depan (living area) cukup tinggi untuk berdiri dan meletakkan perlengkapan. Lapisan terluar (double-layer) membantu mengurangi kondensasi, dan kain tenda memiliki kolom air yang cukup untuk menjaga kekeringan. Desain juga cukup tahan angin (level 6) dan dilengkapi alas lantai yang membentuk “baskom” untuk mencegah air masuk dari bawah.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 4 orang\r\n• Ruang tidur: 240 × 210 cm\r\n• Ruang tengah: ±5 m², tinggi ±190 cm\r\n• Tahan angin hingga ±50 km/jam\r\n• Flysheet polyester PU tahan hujan intensitas tinggi\r\n• Sistem ventilasi baik\r\n• Berat: ±9,8 kg\r\n\r\n𝗞𝗮𝗽𝗮𝘀𝗶𝘁𝗮𝘀 : 4 orang', 'Tersedia'),
(13, 13, 'Arei Baselayer Sumba Summit 1', 20000, 'QG8hf4l4h8zTMzQRLFD2.png', 'Baselayer ringan dan quickdry untuk aktivitas outdoor seperti hiking, trekking, atau lari gunung. Nyaman dipakai berkat bahan stretch yang fleksibel dan breathable, menjaga tubuh tetap kering dan hangat saat cuaca dingin.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Bahan : Polyester\r\n•  Bahannya adem, licin, elastis, tidak mudah kusut\r\n•  Resleting YKK dengan sistem Lock\r\n\r\n𝗦𝗶𝘇𝗲 : S - XL\r\n𝗪𝗮𝗿𝗻𝗮 : Hitam, Abu Muda, Sage, Marine Blue', 'Tersedia'),
(14, 5, 'Hoka Speedgoat 5 ', 60000, 'IDITXjE89MT4PhAYMnUb.png', 'Sepatu trail running ringan dengan cushioning tebal dan stabil untuk medan teknikal. Outsole Vibram Megagrip memberi traksi kuat di batu dan jalur licin, sementara upper mesh yang breathable membuatnya nyaman dipakai jarak jauh. Cocok untuk pelari yang butuh bantalan maksimal dan grip terbaik di berbagai medan.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Drop: 4 mm\r\n• Stack height: 38 mm (tumit) / 34 mm (depan)\r\n• Midsole: EVA (C-EVA) dengan Meta-Rocker\r\n• Outsole: Vibram Megagrip + Traction Lug 5 mm\r\n• Upper: Jacquard mesh 2 lapis (recycled)\r\n• Tipe: Neutral\r\n• Lidah sepatu: Semi-gusset\r\nVegan friendly\r\n\r\n𝗦𝗶𝘇𝗲 : 40 - 45', 'Tersedia'),
(15, 8, 'Eiger Ecosavior 45 WS Carrier', 35000, 'Z0fHiSdlvC4h999tjIs4.jpg', 'Carrier ramah lingkungan berkapasitas 45 L dari Eiger yang dibuat memakai poliester hasil daur ulang (± 50 botol PET). Menggunakan frame bambu dan teknologi backsystem “Ergocomfort Eco” agar nyaman dan stabil dibawa. Fitur tambahan seperti rain cover, kompartemen untuk bladder air, serta kantung sampah dilepas-pasang mendukung pendakian yang lebih bertanggung jawab dan berkelanjutan.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 45 Liter\r\n• Sistem punggung: Aero Comfort Fit\r\n• Material: Polyester Ripstop + lapisan anti air\r\n• Fitur: Kompartemen terpisah, hipbelt empuk, raincover\r\n\r\n𝗪𝗮𝗿𝗻𝗮 : White', 'Tersedia'),
(16, 13, 'Altitude Gear Orca Outdoor Quickdry', 20000, 'DxSsLHRHbfltocUV3oVC.png', 'Altitude Gear ORCA adalah celana sambung cargo outdoor yang ringan, cepat kering, dan nyaman digunakan untuk hiking, traveling, atau aktivitas luar ruang. Dilengkapi saku cargo yang fungsional serta bahan yang fleksibel, celana ini memberikan kenyamanan dan mobilitas baik di jalur maupun penggunaan harian.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Bahan breathable untuk menjaga tubuh tetap segar\r\n• Ringan, mudah dibawa dan nyaman dipakai seharian\r\n• Durable, dirancang untuk penggunaan outdoor jangka panjang\r\n• Quick-dry, ideal untuk cuaca panas dan aktivitas intens\r\n• Pinggang elastis untuk kenyamanan dan fleksibilitas gerak\r\n• Regular fit, cocok untuk berbagai bentuk tubuh\r\n\r\n𝗦𝗶𝘇𝗲 : S-XL\r\n\r\n', 'Tersedia'),
(17, 9, 'Greenforest Arvensis Hydration Pack', 25000, 'jcoswOC7CAOAMUbSNLFy.png', 'Hydropack ringan untuk hiking, trail run, summit, atau gowes. Kapasitas 10L dengan banyak kompartemen untuk HP, snack, soft flask, hingga water bladder 2L. Nyaman dipakai, breathable, dan punya strap adjustable biar fit di badan.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Slot water bladder 2L\r\n• Slot soft flask 700ml\r\n• 9 kompartemen\r\n• Zipper YKK + bahan kuat &amp; ringan\r\n\r\n𝗞𝗮𝗽𝗮𝘀𝗶𝘁𝗮𝘀 : 10L\r\n', 'Tersedia'),
(18, 4, 'Eiger WS X-Tyranno', 35000, 'RpA90gQJX5GjxSBZoPSX.png', 'Sepatu wanita dari Eiger dengan desain mid-cut untuk hiking. Upper-nya terbuat dari kombinasi suede leather dan polymesh agar tetap bernapas. Dilengkapi dengan insole Ortholite untuk bantalan yang nyaman dan breathable. Sol luar menggunakan Vibram Foura Evo yang memberikan traksi baik di berbagai jenis medan.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Upper suede leather + polymesh\r\n• Midsole phylon, insole Ortholite\r\n• Outsole Vibram Foura Evo\r\n• Potongan mid-cut khusus wanita\r\n• Bobot ringan\r\n• Traksi kuat berkat outsole Vibram\r\n\r\n𝗦𝗶𝘇𝗲 : 36 - 40', 'Tersedia'),
(19, 11, 'Kursi dan Meja Lipat Maleo Ulos Arei Outdoorgear', 35000, 'Nq1ecGIO0oHDUDPEcS7X.png', 'Paket kursi lipat lengkap dengan meja praktis bergaya motif ulos, menawarkan kenyamanan saat berkemah atau piknik. Terbuat dari material kuat, mudah dibawa, dan hemat ruang penyimpanan, cocok untuk keluarga maupun kegiatan travelling.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Set: 1 Kursi Lipat + 1 Meja Lipat\r\n• Desain: Motif Ulos khas Arei\r\n• Material: Rangka kuat, dudukan kain tebal\r\n• Fitur: Praktis dibawa, hemat ruang, cocok untuk camping &amp; piknik keluarga.\r\n\r\n', 'Tersedia'),
(20, 10, 'Cooking Set Terranova', 25000, 'raai9MpKbLAp8qgEq8yN.png', 'Peralatan masak outdoor praktis untuk camping. Set ini terdiri dari beberapa panci dan penggorengan yang bisa ditumpuk, dengan pegangan lipat warna cerah yang juga bisa mengunci agar aman saat disimpan. Materialnya menggunakan aluminium hard-anodized yang kuat dan ringan, sehingga cocok untuk dibawa dalam ransel.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Material: Hard Anodized Aluminium \r\n• Isi set: 2 panci, 1 penggorengan, 2 mangkuk, 1 spons, 1 sendok \r\n• Dimensi panci besar: Diameter 168 mm × tinggi 98 mm\r\n• Dimensi panci kecil: Diameter 146 mm × tinggi 75 mm \r\n• Dimensi penggorengan: 174 mm × 42 mm \r\n• Berat total: 500 gram \r\n• Dimensi (paket): 38,5 × 39,5 × 41 cm\r\n', 'Tersedia'),
(21, 13, 'Eiger WS Anaphalis 1.0 Hat', 15000, 'TZsHXICM06zXZcVMZRAn.png', 'Topi WS Anaphalis 1.1 dirancang untuk kenyamanan aktivitas luar ruang. Dilengkapi lubang untuk ikatan rambut serta sleeve untuk menyisipkan kacamata, dan dibuat dari bahan quick-dry bertekstur wrinkle yang ringan dan nyaman. Cocok digunakan untuk hiking, trekking, maupun aktivitas harian.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Topi dengan model bucket\r\n• Tali yang ukurannya dapat disesuaikan untuk menjaga topi tetap pada tempatnya\r\n• Lubang untuk ikatan rambut\r\n• Sleeve untuk menyisipkan kacamata\r\n• Terbuat dari bahan nilon\r\n• Technology: Tropic Dry\r\n', 'Tersedia'),
(22, 5, 'New Balance Trail Hierro V9', 50000, 'cHIK9ogvHHuFZpX8gnFl.png', 'Sepatu trail ber-bantalan maksimal yang dirancang untuk kenyamanan di jalur panjang. Dengan midsole Fresh Foam X dual-density, sepatu ini memberi kombinasi bantalan empuk dan stabilitas. Outsole Vibram Megagrip dengan lugs agresif memastikan traksi kuat di berbagai medan. Tongue (lidah) gusseted menjaga kotoran tidak mudah masuk, dan toe guard memberikan perlindungan dari batu dan akar.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Berat: ~294 g\r\n• Drop (tumit ke jari): 4 mm \r\n• Stack Height: ~42 mm di tumit / ~38 mm di depan \r\n• Midsole: Fresh Foam X (dual-density) \r\n• Outsole: Vibram Megagrip dengan lugs (traksi) \r\n• Upper: Mesh sintetis + overlays &amp; toe bumper untuk perlindungan \r\n\r\n𝗦𝗶𝘇𝗲 : 39 - 45', 'Tersedia'),
(23, 3, 'Naturehike Sleeping Bag Single Envelope U250 ', 10000, '3Jfauvrez8JRNFo1XQQZ.png', 'Sleeping bag tipe envelope dengan hood yang nyaman untuk camping tiga musim. Menggunakan isian hollow-cotton 250 g/m² yang cukup hangat, bahan luar polyester tahan angin, serta dapat dibuka penuh atau disambung dengan sleeping bag lain.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Model: U250 / NH20MSD07\r\n• Material luar: Polyester 190T (water-repellent)\r\n• Filling: Hollow cotton 250 g/m²\r\n• Ukuran: (190 + 30) × 75 cm\r\n• Dimensi packing: ± Ø25 × 43 cm\r\n• Berat: ±1.5 kg\r\n• Rentang suhu: Comfort ±6°C • Limit ±3°C • Extreme –10°C\r\n• Tipe: Envelope dengan hood\r\n• Fitur: Bisa di-splice jadi double, full zipper, bisa dibuka jadi selimut', 'Tersedia'),
(24, 9, 'Hydropack Antarestar Pionero', 25000, 'oQ96KIoPKPrTW5tCHlzA.png', 'Hydropack Antarestar Pionero adalah rompi hidrasi ultralight berkapasitas 6 liter yang ideal untuk trail running dan fast hiking. Dibuat dari material Polyester Diamond Hexagonal yang ringan dengan ventilasi Double Mesh, tali dada adjustable dengan peluit keselamatan, dan holder untuk trekking pole. Rompi ini didesain ergonomis agar stabil dan minim guncangan saat bergerak cepat\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Ringan\r\n• Dilengkapi lubang akses dan holder selang untuk water bladder\r\n• Kompartemen cukup lebar\r\n• Ringan dan nyaman', 'Tersedia'),
(25, 8, 'The North Face Alteo 35', 40000, 'hCQ5nbdmwkUtlgjMeQgX.jpg', 'Ransel 35 L dari The North Face yang ringan dan berventilasi tinggi dengan panel punggung “Windtunnel” yang membantu sirkulasi udara. Bagian atasnya (lid) bisa dilepas untuk mengurangi berat, atau digunakan terpisah sebagai tas pinggang. Arah desainnya cocok untuk hiking cepat, day trip, dan perjalanan yang membutuhkan mobilitas tinggi.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 35 Liter\r\n• Sistem ventilasi: Dynamic Ventilation Frame\r\n• Material: Nylon Cordura anti sobek\r\n• Fitur: Side mesh pockets, trekking pole loops, rain cover\r\n\r\n𝗪𝗮𝗿𝗻𝗮 : Dusty Teal', 'Tersedia'),
(26, 6, 'The North Face Mens Hydrenalite Hooded Down Jacket', 40000, 'YW3PgReJx23MSsMQoy0X.png', 'Puffer down ringan dan hangat yang cocok untuk aktivitas sehari-hari maupun komuter di musim dingin. Isolasi down daur ulang membuat jaket ini hangat namun tetap ramah lingkungan. Material luar menggunakan nylon daur ulang dengan lapisan tahan air (DWR) untuk menghadapi kelembapan ringan, dan terdapat hoodie terpasang agar kepala tetap hangat. Fit-nya cukup santai (relaxed), dengan tali di hem agar bisa disesuaikan untuk mengunci panas.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Insulasi: 600-fill 100% recycled waterfowl down \r\n• Bahan outer: 45 g/m² recycled nylon taffeta + Non-PFC DWR (water-repellent) \r\n• Lining: 78 g/m² recycled nylon taffeta \r\n• Kerudung (hood): 3-piece (terpasang) \r\n• Saku: 2 saku tangan dengan resleting \r\n𝗦𝗶𝘇𝗲 : L - XL', 'Tersedia'),
(27, 13, 'Eiger Pathfinder 2', 25000, 'Bux6M3zqPh1HR8K3gMDl.png', 'Pathfinder Shirt 2.0 adalah kemeja lengan panjang berbahan katun twill yang kuat, dilengkapi patch bordir untuk tampilan kasual yang lebih tegas. Bahannya yang kokoh membuatnya nyaman digunakan untuk kegiatan harian, traveling, atau aktivitas luar ruang ringan.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Terbuat dari bahan katun twill\r\n2 saku dada dengan penutup flap dan kancing\r\n• Patch bordir EIGER 1989 dan Pathfinder\r\n• Eyelet bordir untuk ventilasi\r\n• Lengan panjang dan regular fit\r\n\r\n𝗦𝗶𝘇𝗲 : S-L\r\n', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `verification_token` varchar(64) DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `verification_token`, `is_verified`, `created_at`, `password`) VALUES
(1, 'admin', '', NULL, 0, '2025-11-26 19:05:30', '$2y$10$oijihNDDAotoTub2a.jgju/Cx/ULxmFKLnOtlcytMuISJ1JdOK5MS'),
(2, 'zahramynd', 'zahrasalma31@gmail.com', NULL, 1, '2025-11-26 19:19:51', '$2y$10$oJvV2Ol9vnKsCvdF2oXaiu0xZVP.loDzgkuET4GwlWrK4UZ6X7Reu'),
(3, 'Milan', 'zahrasdm14@gmail.com', NULL, 1, '2025-11-29 16:43:23', '$2y$10$sLMN4MNtBU/DnU/XYbM6puUc0had8jyLTWWtZLeIVDmKbj.i2.Wuu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `fk_booking_user` (`id_user`),
  ADD KEY `fk_booking_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_booking_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
