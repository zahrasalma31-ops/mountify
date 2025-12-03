-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2025 at 07:05 PM
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
(9, 'BK-20251130074726', 3, 25, '2025-11-30', 3, '2025-12-03', 120000, 'Completed', '2025-11-30 07:47:26'),
(10, 'BK-20251130075006', 3, 18, '2025-11-30', 5, '2025-12-05', 175000, 'Completed', '2025-11-30 07:50:06'),
(11, 'BK-20251202133832', 4, 6, '2025-12-02', 3, '2025-12-05', 90000, 'Completed', '2025-12-02 13:38:32'),
(12, 'BK-20251202134534', 3, 7, '2025-12-03', 3, '2025-12-06', 135000, 'Completed', '2025-12-02 13:45:34'),
(20, 'BK-2025120218123200', 3, 88, '2025-12-16', 1, '2025-12-17', 30000, 'Completed', '2025-12-02 18:12:32'),
(21, 'BK-2025120307104400', 3, 79, '2025-12-22', 2, '2025-12-24', 50000, 'Cancelled', '2025-12-03 07:10:44'),
(24, 'BK-2025120307250901', 3, 71, '2025-12-03', 2, '2025-12-05', 60000, 'Confirmed', '2025-12-03 07:25:09'),
(25, 'BK-2025120307375700', 3, 84, '2025-12-03', 1, '2025-12-04', 15000, 'Confirmed', '2025-12-03 07:37:57'),
(26, 'BK-2025120307375701', 3, 63, '2025-12-03', 2, '2025-12-05', 60000, 'Processing', '2025-12-03 07:37:57'),
(27, 'BK-2025120307424400', 3, 57, '2025-12-03', 2, '2025-12-05', 80000, 'Processing', '2025-12-03 07:42:44'),
(28, 'BK-2025120307424401', 3, 71, '2025-12-03', 2, '2025-12-05', 60000, 'Processing', '2025-12-03 07:42:44');

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
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_followup` enum('new','in_progress','done') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama_depan`, `nama_belakang`, `email`, `telepon`, `pesan`, `tanggal`, `status_followup`) VALUES
(2, 'Zahra', 'Meylinda', 'zahrasalma31@gmail.com', '085640270051', 'halaman admin misalnya adminpanel/kontak.php yang menampilkan semua pesan dari tabel itu.', '2025-11-26 13:20:10', 'new'),
(4, 'Zahra', 'Meylinda', 'zahrasalma31@gmail.com', '085640270051', 'halo admin', '2025-12-02 12:41:50', 'done');

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
(6, 9, 'Aonijie C9116 Hydration Backpack Vest', 30000, '5xzuZ9hrPYxp9fGdWCGy.png', 'Hydration vest ringan untuk trail run, hiking, gowes, atau summit. Kapasitas 10L dengan kompartemen lengkap buat HP, snack, soft flask, dan perlengkapan kecil. Nyaman dipakai, breathable, dan stabil saat bergerak.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas 10L\r\n• Material ringan (Nylon + Spandex)\r\n• Bobot cuma ±222g\r\n• Mesh breathable\r\n• Banyak kantong fungsional\r\n• Adjustable strap, fit di badan\r\n\r\n𝗖𝗼𝗰𝗼𝗸 𝘂𝗻𝘁𝘂𝗸 : Hiking, trail running, summit, speed hiking, cycling.                ', 'Tidak tersedia'),
(7, 7, 'BigAdventure Tambora Series - 2P Tent', 45000, 'zhOu5VUcySWELDWEBvUi.jpg', 'Bigadventure Tambora Series adalah tenda kapasitas 2 orang dengan material premium yang tahan cuaca ekstrem. Cocok untuk pendakian gunung, camping, maupun ekspedisi outdoor. Menggunakan bahan ripstop, waterproof tinggi, serta rangka aluminium yang kuat namun ringan.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗣𝗿𝗼𝗱𝘂𝗸:\r\n• Flysheet: 210T Ripstop Polyester, PU 3000mm, UPF 50+, seam taped\r\n• Inner Tent: 190T Ripstop breathable + B3 mesh\r\n• Lantai Tenda: 210T Ripstop Polyester, PU 3000mm, seam taped\r\n• Footprint: 210T Ripstop Polyester PU 3000mm (200 gram)\r\n• Rangka (Poles): Aluminium 8.5 mm dengan triangle joining\r\n• Pasak: Aluminium Y-stakes\r\n• Ukuran Terpasang: 210 × (70 + 140 + 70) × 105 cm\r\n• Ukuran Packing: 40 × 15 cm\r\n• Berat: 2350 gram (tanpa footprint)\r\n', 'Tersedia'),
(8, 5, '910 Nineten Yuza Evo - Sepatu Trail Running', 45000, 'ALWxgulBnR5isIcfAYBT.jpg', 'Yuza Evo adalah sepatu lari trail terbaru dari Yuza yang dirancang khusus untuk medan alam tropis Indonesia. Menggabungkan teknologi modern untuk memberikan kenyamanan, stabilitas, dan daya tahan maksimal saat berlari di jalur off-road.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗣𝗿𝗼𝗱𝘂𝗸:\r\n• Upper Maxi Breathe: ringan &amp; breathable\r\n• Hexa Cush insole: empuk, tidak mudah panas\r\n• Seamlock: upper kokoh &amp; fleksibel\r\n• HyperWeb: struktur stabil tanpa menambah beban\r\n• Airflex Sole: grip kuat &amp; ringan\r\n• Rubber Tech-Outsole: traksi tinggi, tahan abrasi\r\n\r\n𝗨𝗸𝘂𝗿𝗮𝗻 : 39-44', 'Tersedia'),
(9, 8, 'Osprey Kyte48 Carrier', 45000, 'vEpzDn9lVIlWqVpSaQ45.png', 'Carrier 48 L dari Osprey ini dirancang untuk hiking dan backpacking jangka menengah. Dengan sistem suspensi yang nyaman dan ventilasi punggung yang baik, tas ini cocok untuk membawa beban cukup berat namun tetap menjaga kenyamanan pemakainya. Rangka internal membantu menjaga kestabilan beban, dan desainnya ergonomis untuk pendakian harian ataupun trip akhir pekan.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 48 Liter\r\n• Sistem punggung: AirScape Backpanel\r\n• Rangka: LightWire Internal Frame\r\n• Bahan: Nylon Ripstop tahan abrasi\r\n• Fitur: Raincover bawaan, trekking pole attachment, kompartemen sleeping bag\r\n\r\n𝗪𝗮𝗿𝗻𝗮 : Ungu\r\n', 'Tersedia'),
(10, 4, 'Arizona Arei Outdoor Gear', 30000, 'bWA0geDJDOblLAdUaIgZ.png', 'Sepatu gunung dari Arei Outdoor Gear dengan potongan mid-cut yang memberi proteksi baik di pergelangan kaki saat mendaki. Bagian atas menggunakan kulit asli tahan air (genuine leather) serta mesh poliester untuk sirkulasi udara, sedangkan midsole-nya memakai EVA yang empuk dan outsole karet untuk cengkeraman. Cocok untuk hiking ringan hingga menengah dan petualangan alam terbuka.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Upper kulit asli + mesh\r\n• Midsole EVA (peredam kejut)\r\n• Outsole karet anti-selip\r\n• Potongan mid-cut\r\n• Kuat namun tetap memiliki sirkulasi udara baik\r\n• Cengkeraman kuat di berbagai medan\r\n• Proteksi pergelangan kaki lebih aman\r\n\r\n𝗨𝗸𝘂𝗿𝗮𝗻: 38-44                                                ', 'Tersedia'),
(11, 11, 'Eiger Women Camp Chair &amp;amp; Table', 35000, '9QLhyB2WIMtFWATthG5n.png', 'Set kursi dan meja camping khusus wanita dengan desain ergonomis serta tinggi kursi yang menyesuaikan postur tubuh. Menggunakan bahan ringan namun kuat, memberikan kenyamanan maksimal saat kegiatan outdoor atau travel.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Dimensi Kursi: 52 × 65 cm\r\n• Dimensi Lipat: 35 × 11,5 × 10,5 cm\r\n• Material: Kain poliester + rangka aluminium alloy\r\n• Beban Maksimal: 120 kg\r\n• Fitur: Ergonomis khusus wanita, termasuk tas penyimpanan.\r\n                ', 'Tidak tersedia'),
(12, 7, 'Quechua Arpenaz 4.1 - 4P Tent', 50000, 'WhXbPKZBetxzqJvxIRb0.png', 'Tenda dari Quechua dengan kapasitas 4 orang dan satu kamar tidur. Struktur kerangka lengkung (arch) memudahkan pemasangan, dan bagian depan (living area) cukup tinggi untuk berdiri dan meletakkan perlengkapan. Lapisan terluar (double-layer) membantu mengurangi kondensasi, dan kain tenda memiliki kolom air yang cukup untuk menjaga kekeringan. Desain juga cukup tahan angin (level 6) dan dilengkapi alas lantai yang membentuk “baskom” untuk mencegah air masuk dari bawah.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 4 orang\r\n• Ruang tidur: 240 × 210 cm\r\n• Ruang tengah: ±5 m², tinggi ±190 cm\r\n• Tahan angin hingga ±50 km/jam\r\n• Flysheet polyester PU tahan hujan intensitas tinggi\r\n• Berat: ±9,8 kg\r\n', 'Tersedia'),
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
(23, 3, 'Naturehike Sleeping Bag Single Envelope U250 ', 10000, '3Jfauvrez8JRNFo1XQQZ.png', 'Sleeping bag tipe envelope dengan hood yang nyaman untuk camping tiga musim. Menggunakan isian hollow-cotton 250 g/m² yang cukup hangat, bahan luar polyester tahan angin, serta dapat dibuka penuh atau disambung dengan sleeping bag lain.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Model: U250 / NH20MSD07\r\n• Material luar: Polyester 190T (water-repellent)\r\n• Filling: Hollow cotton 250 g/m²\r\n• Ukuran: (190 + 30) × 75 cm\r\n• Dimensi packing: ± Ø25 × 43 cm\r\n• Berat: ±1.5 kg\r\n• Rentang suhu: Comfort ±6°C • Limit ±3°C • Extreme –10°C\r\n• Tipe: Envelope dengan hood\r\n• Fitur: Bisa di-splice jadi double, full zipper, bisa dibuka jadi selimut                                ', 'Tidak tersedia'),
(24, 9, 'Hydropack Antarestar Pionero', 25000, 'oQ96KIoPKPrTW5tCHlzA.png', 'Hydropack Antarestar Pionero adalah rompi hidrasi ultralight berkapasitas 6 liter yang ideal untuk trail running dan fast hiking. Dibuat dari material Polyester Diamond Hexagonal yang ringan dengan ventilasi Double Mesh, tali dada adjustable dengan peluit keselamatan, dan holder untuk trekking pole. Rompi ini didesain ergonomis agar stabil dan minim guncangan saat bergerak cepat\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Ringan\r\n• Dilengkapi lubang akses dan holder selang untuk water bladder\r\n• Kompartemen cukup lebar\r\n• Ringan dan nyaman', 'Tersedia'),
(25, 8, 'The North Face Alteo 35', 40000, 'hCQ5nbdmwkUtlgjMeQgX.jpg', 'Ransel 35 L dari The North Face yang ringan dan berventilasi tinggi dengan panel punggung “Windtunnel” yang membantu sirkulasi udara. Bagian atasnya (lid) bisa dilepas untuk mengurangi berat, atau digunakan terpisah sebagai tas pinggang. Arah desainnya cocok untuk hiking cepat, day trip, dan perjalanan yang membutuhkan mobilitas tinggi.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 35 Liter\r\n• Sistem ventilasi: Dynamic Ventilation Frame\r\n• Material: Nylon Cordura anti sobek\r\n• Fitur: Side mesh pockets, trekking pole loops, rain cover\r\n\r\n𝗪𝗮𝗿𝗻𝗮 : Dusty Teal', 'Tersedia'),
(26, 6, 'The North Face Mens Hydrenalite Hooded Down Jacket', 40000, 'YW3PgReJx23MSsMQoy0X.png', 'Puffer down ringan dan hangat yang cocok untuk aktivitas sehari-hari maupun komuter di musim dingin. Isolasi down daur ulang membuat jaket ini hangat namun tetap ramah lingkungan. Material luar menggunakan nylon daur ulang dengan lapisan tahan air (DWR) untuk menghadapi kelembapan ringan, dan terdapat hoodie terpasang agar kepala tetap hangat. Fit-nya cukup santai (relaxed), dengan tali di hem agar bisa disesuaikan untuk mengunci panas.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Insulasi: 600-fill 100% recycled waterfowl down \r\n• Bahan outer: 45 g/m² recycled nylon taffeta + Non-PFC DWR (water-repellent) \r\n• Lining: 78 g/m² recycled nylon taffeta \r\n• Kerudung (hood): 3-piece (terpasang) \r\n• Saku: 2 saku tangan dengan resleting \r\n𝗦𝗶𝘇𝗲 : L - XL', 'Tersedia'),
(27, 13, 'Eiger Pathfinder 2', 25000, 'Bux6M3zqPh1HR8K3gMDl.png', 'Pathfinder Shirt 2.0 adalah kemeja lengan panjang berbahan katun twill yang kuat, dilengkapi patch bordir untuk tampilan kasual yang lebih tegas. Bahannya yang kokoh membuatnya nyaman digunakan untuk kegiatan harian, traveling, atau aktivitas luar ruang ringan.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Terbuat dari bahan katun twill\r\n2 saku dada dengan penutup flap dan kancing\r\n• Patch bordir EIGER 1989 dan Pathfinder\r\n• Eyelet bordir untuk ventilasi\r\n• Lengan panjang dan regular fit\r\n\r\n𝗦𝗶𝘇𝗲 : S-L\r\n', 'Tersedia'),
(28, 9, 'Eiger Forlough 18 Backpack', 30000, 'L5k7Z3kmbbkVl95yg4ME.png', 'Ransel harian berkapasitas 18 liter dari Eiger yang dirancang untuk aktivitas sehari-hari. Terbuat dari polyester 600D (double face), tas ini memiliki kompartemen utama dengan saku dalam untuk dokumen, saku depan yang mudah dijangkau, dan dua saku samping untuk botol atau barang kecil. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 18 Liter\r\n• Dimensi: 28 × 15 × 45 cm\r\n• Berat: ± 500 gram\r\n• Material: Polyester 600D (double face)\r\n', 'Tersedia'),
(29, 4, 'Eiger Pollock 2', 30000, 'HL96bzmZm2bpJ2zxRtcF.png', 'Sepatu hiking mid-cut pria dari Eiger yang dirancang untuk daya tahan dan proteksi. Menggunakan konstruksi gusset dan membran tahan air agar tidak mudah kemasukan air dari atas. Ada sistem dukungan tumit (heel support) untuk stabilitas saat pendakian. Outsole-nya dibuat dari karet Vibram, dan insole Ortholite memberikan bantalan serta kenyamanan bernapas.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Upper nubuck waterproof\r\nMembran tropic breathable\r\n• Insole Ortholite\r\n• Outsole Vibram Grivola\r\n• Heel support + gusset construction\r\n• Tahan air optimal, tidak mudah kemasukan air dari atas\r\n𝗦𝗶𝘇𝗲 : 39 - 45\r\n', 'Tersedia'),
(30, 7, 'Dhaulagiri Mahika 5', 55000, 'xzAWChYTM8AIXsp0XRQe.png', 'Tenda Dhaulagiri memiliki tiga pintu, memungkinkan akses fleksibel, dan sirkulasi udara yang baik dengan ventilasi di beberapa titik. Terdapat canopy ekstra topi di bagian depan untuk melindungi dari sinar matahari saat pintu terbuka. Alas teras (vestibule) didesain menyerupai kolam untuk mencegah cipratan air. Kabin dalam memungkinkan berdiri dengan nyaman jika tinggi di bawah 180 cm.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 4–5 orang\r\n• Dimensi total: ± (210 cm + 200 cm) × 260 cm × 180 cm\r\n• Outer: 210T Polyester Ripstop, PU 3000 mm, UPF 50+\r\n• Inner: 190T Polyester breathable\r\n• Fitur: walled vestibule floor, ventilasi optimal\r\n• Berat: ±7,2 kg', 'Tersedia'),
(31, 8, 'Consina Carrier Extraterrestrial 60L ', 35000, 'ncAayIFM6v1Ymr8UpZvb.jpg', 'Carrier 60 L dari Consina yang dirancang untuk pendakian 2-3 hari. Memiliki sistem back comfort yang bisa disesuaikan, hip belt empuk dengan saku mesh, serta banyak ruang di kompartemen utama dan saku atas. Fitur seperti daisy chain, compression strap, dan top lid attachment memberikan fleksibilitas penyimpanan.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 60 Liter\r\n• Sistem punggung: Adjustable Backsystem\r\n• Material: Nylon + Polyester Ripstop\r\n• Fitur: Saku banyak, hipbelt lebar, kompartemen sleeping bag\r\n\r\n𝗖𝗼𝗹𝗼𝗿 : Grey\r\n', 'Tersedia'),
(32, 11, 'Eiger Alumunium Camp Table', 30000, 'PU6YC7nlY4icYxfAXDU7.png', 'Meja camping berbahan aluminium ringan dengan daya tahan baik terhadap cuaca luar. Mudah dibongkar-pasang dan cepat dilipat, ideal untuk kebutuhan makan, memasak, atau peralatan saat camping dan travelling.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Dimensi Terpasang: 40 × 34 × 32 cm\r\n• Berat: ±950 g\r\n• Material: Aluminium alloy\r\n• Fitur: Meja lipat portable + tas penyimpanan, tahan cuaca outdoor\r\n', 'Tersedia'),
(33, 10, 'Strato Compact Stove', 20000, 'O8UzSfWikBHqhTgMB8pW.png', 'Kompor portabel yang dirancang untuk kegiatan outdoor seperti camping, hiking, dan piknik. Kompor ini memiliki sistem pengapian elektronik yang praktis, kunci otomatis untuk keamanan, dan daya api hingga 2600W, sehingga proses memasak menjadi cepat dan efisien. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Dimensi: 25 × 11 × 8,8 cm \r\n• Dimensi kemasan: 26,5 × 11,5 × 9,5 cm \r\n• Berat: 1.300 gram (1,3 kg) \r\n• Material: Stainless steel, aluminium alloy, polyester \r\n• Daya API: hingga 2600 W \r\n\r\n', 'Tersedia'),
(34, 13, 'Credifox Sarung Tangan Outdoor Argo Series', 5000, 'Kt12OYEUsw9olOQLYkh8.png', 'Sarung tangan outdoor berbahan polar lembut dan hangat, dirancang untuk menemani aktivitas luar ruangan di cuaca dingin. Material polar memberikan kenyamanan maksimal, ringan, dan cepat kering, menjaga tangan tetap hangat tanpa membuat gerah. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Ukuran : Lingkar telapak 23cm, Panjang 22cm\r\n• Bahan Premium: 100% Polyester Fleece\r\n• Lubang jempol &amp; telunjuk untuk touchscreen\r\n• Anti slip dengan dot silicon di telapak\r\n', 'Tersedia'),
(35, 5, 'Salomon X Ultra 5 Gore-Tex', 65000, 'KsEy62W8W3sLyaTNFVNR.png', 'Sepatu hiking yang dirancang untuk medan berat dan cuaca basah. Dengan membran Gore-Tex, sepatu ini mampu tahan air sambil tetap bernapas. Sistem Advanced Chassis memberikan stabilitas lateral, sementara outsole All Terrain Contagrip memberikan traksi sangat baik di berbagai permukaan. Upper-nya menggunakan bahan Matryx yang diperkuat Kevlar, membuatnya kuat dan tahan abrasi tanpa terasa terlalu berat. Ditambah sistem Quicklace yang praktis, sepatu ini menjadi pilihan ideal untuk hiking teknis dan pendakian menantang.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Midsole: EnergyCell (EVA) \r\n• Outsole: All Terrain Contagrip \r\n• Upper: Matryx textile + Kevlar (sintetis / tekstil) \r\n• Membran: GORE-TEX PFC-free (tahan air, breathable) \r\n• Sistem penutup: Quicklace\r\n• Sockliner: Molded OrthoLite \r\n𝗦𝗶𝘇𝗲 : 40 - 44\r\n\r\n', 'Tersedia'),
(36, 6, 'Jaket Gunung Lavender V2 Arei Outdoorgear', 30000, 'pLGS4RgJmy7YQFkP5uuF.png', 'Jaket gunung khusus wanita yang dirancang untuk kegiatan hiking, camping, atau aktivitas outdoor ringan. Terbuat dari bahan polyester yang membuat tubuh tetap hangat, dan dilapisi water-repellent untuk menahan hujan ringan. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Bahan: Polyester \r\n• Fitur tahan air: Water repellent, cocok untuk hujan ringan \r\n• Penutup kepala (hood) \r\n• Fitur unik: Saat jaket terkena air, muncul motif khusus di bahan\r\n𝗦𝗶𝘇𝗲 : S - L\r\n', 'Tersedia'),
(37, 3, 'Naturehike Sleeping Bag NH21MSD03 P400', 15000, 'WiK3DRYDlQLJuLeAXrhm.png', 'Sleeping bag berbentuk mummy yang cukup hangat untuk camping dingin ringan hingga sedang. Memiliki desain hood (kapu) dan kerah angin untuk menjaga panas, serta tali pengencang agar tidak banyak ruang dingin masuk.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Bahan luar: Polyester pongee\r\n• Bahan dalam: Washed cotton\r\n• Isian: Feather-like cotton (400 g/m²)\r\n• Ukuran terbuka: (190 + 30) × 80 cm\r\n• Berat: ± 1,85 kg\r\n• Fitur: Hood dengan drawcord, windproof collar, zipper dua arah, compression sack&amp;amp;quot;\r\n                                ', 'Tersedia'),
(38, 12, 'Trekking Pole Naturehike NH17D001-Z ST01', 15000, 'EoPLxBhfeAKTdfww4gFL.png', 'Tongkat hiking ringan dan kuat yang dirancang untuk kegiatan trekking, hiking, dan mountaineering. Memiliki sistem penguncian “quick lock” 3-node sehingga bisa disesuaikan panjangnya, dan dilengkapi pegangan EVA yang nyaman serta strap pergelangan untuk stabilitas.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Material tiang: Aluminium alloy 6061\r\n• Strap: Nylon adjustable\r\nSistem penguncian: Quick-lock (3 segmen)\r\n• Panjang: 57–120 cm (atau hingga 135 cm tergantung varian)\r\n• Berat: ± 233–255 g\r\n• Diameter tiang: ± 1,7 cm\r\n', 'Tersedia'),
(39, 12, 'Consina Gaiter Pelindung Sepatu Hiking Gunung Taslan', 12000, 'xUN0O5x42WH9Lt0E38dW.png', 'Consina Gaiter Pelindung Sepatu Gunung berbahan Taslan dirancang untuk melindungi kaki dari kerikil, lumpur, dan air saat hiking atau trekking. Gaiter ini membantu mencegah benda asing masuk ke sepatu, serta mengurangi gesekan antar celana dan elemen alam. Cocok untuk pendakian ringan hingga ekspedisi.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Material: Nylon Taslan + mini ripstop WR PU\r\n• Fungsi: Waterproof &amp; dustproof\r\n• Penyesuaian: Strap buckle atas + drawstring &amp; buckle bawah\r\n• Berat: ± 150 gram per pasang\r\n\r\n', 'Tersedia'),
(40, 9, 'Rei Mochila 10L backpack. ', 25000, 'wLP5RxUX7aTfPKx4hrhe.png', 'Tas daypack simpel dan ringan berkapasitas 10 liter dari Rei / Arei. Umumnya terbuat dari bahan nilon (plus polyester), dengan sebuah kompartemen utama, saku depan, dan dua saku samping. Ukurannya kompak (sekitar 30 × 45 cm) dan ideal untuk kegiatan ringan seperti sekolah, jalan-jalan, atau olahraga ringan.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 10 Liter\r\n• Dimensi: ± 30 × 45 cm\r\n• Berat: ± 300 gram\r\n• Material: Nilon + Polyester\r\n• Kompartemen: 1 kompartemen utama, 1 saku depan, 1 saku dalam, 2 saku samping', 'Tersedia'),
(41, 10, 'DH Cooking Set 400 XTRA', 25000, 'VVFQGjEMCQAN9egWqCog.png', 'Set alat masak ringan yang dirancang untuk kegiatan outdoor seperti camping dan hiking. Terbuat dari aluminium hard-anodize yang tahan korosi, set ini juga dilengkapi wajan (fry pan) berlapis teflon agar memasak dan membersihkan lebih mudah. Semua komponen bisa ditumpuk (nesting), sehingga sangat efisien untuk dibawa dalam ransel.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Material: Aluminium hard-anodize + lapisan Teflon non-stick \r\n• Isi paket : Fry Pan 3L, Panci 2 L, Panci 1,4 L, Kettle 1,1 L,3 Mangkok plastik\r\n• Berat total: ± 631 gram \r\n• Dimensi saat disusun (teringkas): sekitar 10 × 8 cm ', 'Tersedia'),
(42, 3, 'Eiger Sleep Sack 600 ', 15000, 'QBAp2iggK1VI5BCqvmGq.png', 'Kantong tidur sintetis yang dirancang khusus untuk camping di iklim tropis. Dengan insulasi berteknologi Tropic Warm, kantong tidur ini menjaga kehangatan tubuh saat malam mulai dingin. Bahannya ringan dan awet (polyester), serta dilengkapi ritsleting dua arah dan tas penyimpanan praktis agar mudah dibawa.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Dimensi: 215 × 75 cm\r\n• Dimensi stuff sack: 22 × 13 cm\r\n• Berat: 800 g\r\n• Material: Polyester (shell, lining, filling)\r\n• Teknologi: Tropic Warm\r\n• Fitur tambahan: saku dalam, wind-resistant, stuff sack included', 'Tersedia'),
(43, 6, 'Mens Massif Down Jacket', 40000, '2YjyoFix26ORTDoR4DGv.png', 'Puffer down premium yang dirancang untuk menjaga kehangatan di cuaca dingin dengan bobot yang tetap relatif ringan. Isolasi bulu angsa (goose down) ber-fill-power tinggi memberikan kehangatan maksimal, sementara lapisan nylon dan finishing DWR (durable water-repellent) membuat jaket tahan terhadap kelembapan ringan. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Bahan shell: 100% Nylon \r\n• Isolasi: 700-fill goose down, tersertifikasi Responsible Down Standard (RDS) \r\n• Lapisan tahan air: Finishing DWR (water-repellent) untuk perlindungan dari kelembapan ringan \r\n• Fit: Standard fit — pas ukuran, nyaman untuk layering \r\n𝗦𝗶𝘇𝗲 : L - XL\r\n', 'Tersedia'),
(44, 4, 'SNTA 502 Hiking Shoes', 25000, 'GYvgz49Acf8APwZs9f8N.png', 'Sepatu hiking mid-cut dari brand SNTA dengan fitur semi-waterproof yang dapat mencegah air masuk tapi tetap memberikan ventilasi. Solnya dari karet anti-slip dengan tekstur 3D untuk daya cengkeram yang baik, dan bantalan peredam guncangan agar langkah lebih stabil. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Tipe mid-cut hiking boots\r\nSemi-waterproof\r\n• Outsole karet tekstur 3D anti-selip\r\n• Bantalan midsole tebal\r\nShock absorption (peredam guncangan)\r\n𝗦𝗶𝘇𝗲: 38 - 45\r\n', 'Tersedia'),
(45, 11, 'Canifer Hammock Double Layer Ayunan Gantung 2 Lapis', 25000, 'n7raUPMoQtNGS9JD4KFZ.png', 'Hammock dua lapis dengan material kuat dan breathable, dirancang untuk aktivitas outdoor seperti camping, hiking, maupun santai di taman. Memiliki lapisan ganda untuk kenyamanan ekstra serta daya tahan tinggi, aman menahan beban dan cocok digunakan bersama underquilt atau alas tidur.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Ukuran: 250 × 150 cm\r\n• Bahan: Parasut WP (waterproof)\r\n• Beban Maksimal: ±250 kg\r\n• Berat: ±200 g\r\n• Fitur: Jahitan Bartex kuat, webbing tebal 4 cm.', 'Tersedia'),
(46, 10, 'FireMaple Portable Grill Pan Panci Panggang Anti Lengket', 15000, '9ZO99W2d3eqqtypQczv1.png', 'Panci panggang portabel dari FireMaple ini dirancang khusus untuk penggunaan di alam terbuka seperti camping atau piknik. Permukaannya bergelombang dengan sistem aliran minyak (oil drainage) agar lemak berlebih bisa dikeluarkan saat memanggang, sehingga hasil masakan lebih sehat dan tidak berminyak. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Material: Aluminium alloy + stainless steel + lapisan non-stick\r\n• Berat: ±656 g\r\n• Dimensi terbuka: 43,8 × 31 × 2 cm\r\n• Dimensi terlipat: 31,2 × 31 × 2 cm\r\n• Fitur: Oil-drain system, pegangan lipat, permukaan grill bergelombang\r\n', 'Tersedia'),
(47, 13, ' Slimfit Stretch Quickdry Carumby Nouva Hiking Pants', 25000, 'rDX6ylwlpkgM5qwx9eML.png', 'Celana Slimfit Stretch Quickdry Carumby Nouva adalah celana outdoor ringan yang dirancang untuk aktivitas hiking dan perjalanan harian. Bahannya elastis dan cepat kering sehingga tetap nyaman digunakan saat bergerak maupun terkena hujan. Potongan slimfit memberi tampilan rapi tanpa mengurangi fleksibilitas, cocok untuk aktivitas dinamis di luar ruang.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Bahan stretch yang lentur dan nyaman\r\n• Quickdry: cepat kering saat berkeringat atau terkena air\r\n• Ringan dan breathable\r\n• Potongan slimfit\r\n𝗦𝗶𝘇𝗲: L - XL\r\n', 'Tersedia'),
(48, 3, 'Matras Alumunium V2 Arei Outdoorgear', 10000, 'q2pdvQ0aq6qTfxyho00u.png', 'Alas tidur tipis dan ringan yang menggunakan material aluminium foil. Cocok untuk alas camping atau piknik, terutama saat butuh isolasi dasar dari tanah dingin dan lembap.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Material: Aluminium foil \r\n• Ukuran: 200 × 120 cm \r\n• Berat: ± 600 gram \r\n• Fungsi: Isolasi dasar saat tidur di tenda / alas camping', 'Tersedia'),
(49, 12, 'Antarestar Mini Head Lamp Led Cob', 5000, 'gPiDEvvR2hFgpXqiN0aY.png', 'Lampu kepala compact dan multifungsi dengan lampu COB terang dan body yang bisa dilepas untuk digunakan sebagai lampu darurat. Dilengkapi magnet di bagian bodi agar bisa ditempel di permukaan logam seperti kap mobil. Cocok untuk camping, mendaki, perbaikan mobil, dan aktivitas outdoor.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Tipe LED: COB + LED biasa\r\nBaterai: Rechargeable via USB (micro-USB)\r\n• Mode Cahaya: COB sebagai lampu area / flood\r\n• Strap kepala: Adjustable\r\n• Material: Plastik kuat + lampu COB\r\n• Fitur tambahan: Lampu COB bisa dilepas untuk lampu darurat\r\n', 'Tersedia'),
(50, 12, 'Aonijie Foldable Trekking Pole Bend E4215 ', 15000, 'dEQdhJuUIt3gJp5ZQKua.png', 'Trekking pole lipat (foldable) yang dirancang untuk hiking, trail running, dan trekking ringan. Terbuat dari aluminium berkualitas tinggi, dengan pegangan EVA yang nyaman dan tali pergelangan yang bisa disesuaikan. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Panjang: 105–135 cm\r\n• Berat: ± 223 g per pole\r\n• Material tiang: Aluminium 7075\r\n• Pegangan: EVA foam\r\n• Tali pergelangan: Polyester adjustable\r\n• Segmen: 3 segmen lipat\r\n', 'Tersedia'),
(51, 6, 'Jaket Gunung Gorpcore Aerotrack Drizzle', 35000, 'vFVPZL2bvylxGIZgda2N.png', 'Outwear bergaya gorpcore yang tahan angin dan ringan cocok untuk hiking, kegiatan outdoor ringan, atau gaya street utilitarian. Bahan parasutnya memberikan perlindungan dasar dari hujan ringan, sementara desain unisex dan motif minimalis menjadikannya pilihan fungsional sekaligus trendi.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Material: Parasut (polyester / nylon ringan)\r\n• Jumlah lapisan: Single layer (windbreaker)\r\n• Sistem tahan air: Repellent dasar\r\n• Kapu­c hoodie: Melindungi kepala dari angin/hujan ringan\r\n', 'Tersedia'),
(52, 5, '910 Nineteen Yuza Mars Jezero', 45000, 'gCm9TK8XitSeeTAcH17h.png', 'Sepatu trail running lokal dari 910 Nineten yang dirancang untuk kenyamanan di medan alam tropis. Yuza Mars Jezero punya desain futuristik dengan tekstur topografi Mars. Upper-nya menggunakan mesh Maxi Breathe yang ringan dan breathable, dengan dukungan Hyperweb pada sisi atas dan teknologi Seamlock pada toe cap untuk konstruksi yang kokoh tapi tetap fleksibel. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Berat: 329 g (size UK 41) \r\n• Midsole: Air-Flex Sole (busa + karet)\r\n• Insole: Hexa Cush EVA dengan konstruksi heksagonal \r\n• Upper: Maxi Breathe mesh poliester \r\n• Sistem tali: Quick Lace (stopper) \r\n𝗦𝗶𝘇𝗲: 38-44', 'Tersedia'),
(53, 8, 'Eiger Ardor 45 Lunaris', 30000, 'Y7roZU3q0GQQFWQuGZmT.jpg', 'Carrier 45 L dari Eiger versi wanita (WS), dengan backsystem Aerovent Light yang memberikan ventilasi maksimal dan kontak minimal dengan punggung. Tali bahu ergonomis mengikuti bentuk tubuh wanita. Tas ini memiliki banyak kompartemen (utama, atas, depan, samping, hip belt) dan fitur seperti rain cover, pengikat trekking pole, tali kompresi, dan tali dada dengan peluit.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 45 Liter\r\n• Sistem ventilasi: Air Bridge Back System\r\n• Material: Polyester tahan abrasi + water repellent\r\n• Fitur: Hydration compartment, raincover, pole holder\r\n𝗖𝗼𝗹𝗼𝗿 : Fuschia', 'Tersedia'),
(54, 10, 'Eiger Enamel Mug 3.1', 5000, '3NG5GvEQuXtGop9SGW8T.png', 'Cangkir enamel klasik yang ringan dan mudah dibawa, ideal untuk kegiatan camping atau penggunaan sehari-hari. Terbuat dari tin enamel yang tidak bereaksi dengan minuman, mug ini aman untuk teh atau kopi panas. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Volume: 400 ml \r\n• Dimensi: 8 × 9 cm \r\n• Berat: 178 g \r\n• Material: Tin Enamel\r\n• Fitur: Bebas BPA, tidak bereaksi kimia dengan minuman, higienis dan mudah dibersihkan ', 'Tersedia'),
(55, 7, 'The North Face Assault 3 Futurelight Summit Series - 3P Tent', 60000, 'GJpDC4nv2tTdr7WObC1X.png', 'Tenda gunung / alpen kelas menengah-atas dengan kapasitas 3 orang, memakai bahan Futurelight yang bersifat breathable tapi tahan air. Karena desainnya “summit series”, tenda ini ditujukan untuk pendakian teknikal atau ekspedisi gunung dengan beban dan kondisi cuaca yang lebih ekstrem. Struktur kerangkanya kuat dan memungkinkan ketahanan terhadap angin dan hujan pada medan tinggi.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 3 orang\r\n• Berat total: ±3,1 kg\r\n• Area lantai: ±3,43 m²\r\n• Canopy: 20D, FUTURELIGHT™ 3-layer waterproof breathable\r\n• Lantai: 40D nylon ripstop, coating PU/Sil 3000 mm\r\n• Tiang: Easton Syclone™\r\n• Fitur: desain X-tent, ventilasi atas, vestibule opsional', 'Tersedia'),
(56, 11, 'Eiger Short Folding Chair', 25000, 'KxHAyFry6fONhdWnksI8.png', 'Kursi lipat pendek dengan konstruksi compact yang mudah dibawa dan disimpan. Cocok untuk duduk dekat api unggun, mancing, atau piknik. Rangkanya kuat dan tahan cuaca dengan dudukan nyaman.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Tipe: Kursi lipat pendek (low chair)\r\n• Material: Kain kuat + rangka aluminium\r\n• Kelebihan: Ringkas, ringan, mudah dibawa\r\n• Cocok untuk: Api unggun, mancing, piknik, camping minimalis.', 'Tersedia'),
(57, 6, 'The North Face Girls Warm Anthora', 40000, '6p5PIKg5m1ixCiBYOzP6.png', 'Jaket tahan angin yang juga memberi kehangatan berkat isolasi sintetis. Memiliki shell DryVent™ 2-lapis yang tahan air tapi tetap bernapas, serta lapisan fleece lembut di bagian atas tubuh dan hoodie untuk kenyamanan. Insulasi Heatseeker™ di lengan dan bagian bawah tubuh membantu menjaga suhu tubuh saat hujan dan udara dingin.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Teknologi bahan: DryVent™ 2L (seam-sealed) \r\n• Finishing tahan air: Non-PFC DWR (durable water repellent) \r\n• Bahan shell: 100% recycled nylon ripstop \r\n• Kerudung (hood): Terdiri dari 3 potongan + “rain-guard tunnel” elastis untuk pas di kepala \r\n𝗦𝗶𝘇𝗲 : S - L', 'Tersedia'),
(58, 3, 'Naturehike Sleeping Bag M400 CNK2350WS023', 10000, 'OtAmkkxkrRyUi4DotPpG.png', 'Kantong tidur berbentuk envelope dengan desain yang bisa dibuka penuh, sangat fleksibel dan nyaman untuk camping di musim semi hingga musim gugur. Isian sintetis (cotton fiber) menawarkan kehangatan tanpa terasa pengap, sementara bahan luar dari poliester 210T membuatnya tahan lama dan mudah dicuci.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Model: Mummy sleeping bag\r\n• Bahan luar: Polyester water-repellent\r\n• Bahan dalam: Polyester nyaman dan breathable\r\n• Isian: Hollow fiber (ketebalan sesuai varian)\r\n• Fitur: Dua arah zipper, adjustable hood, anti-jepit zipper', 'Tersedia'),
(59, 12, 'H2S Lampu Emergency Gantung Camping Lamp', 15000, 'uIQoeTxBdpF9ugDv8CrG.png', 'Lampu gantung darurat dari H2S ini sangat cocok untuk camping, hiking, atau penggunaan darurat ketika listrik padam. Bisa digantung di tenda atau pohon, dan memberikan penerangan yang terang dan stabil di area sekitar.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Tipe: Lampu gantung / lentera darurat (camping lamp)\r\n• Mode: Mode darurat / penerangan area\r\n• Daya / Tegangan: bisa diisi ulang (biasanya melalui USB) \r\n• Hook / Kait: Ada kait atau hook untuk menggantung lampu\r\n', 'Tersedia'),
(60, 9, 'Bogaboo Osmo 10L Hydropack', 25000, 'NIPnIBy9w5llwSSeVUZG.png', 'Tas hydropack (rantai untuk trail / lari) dengan kapasitas 10 liter dari Bogaboo. Dibuat dari bahan polyester dan nylon yang kuat dan tahan lama. Ukurannya cukup compact (sekitar 40 × 20 cm) dan bobot sangat ringan (sekitar 228 gram), cocok untuk trail run atau kegiatan ringan.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 10 Liter\r\n• Dimensi: 40 × 20 × 1 cm\r\n• Berat: ± 228 gram\r\n• Material: Polyester + Nylon\r\n• Desain compact dan ringan, kompatibel dengan pemasangan bladder', 'Tersedia'),
(61, 4, 'Salomon X Ultra 360 Edge Mid GTX', 45000, 'yHpVk3oKSXjsufd7lb5o.png', 'Sepatu hiking mid-height dari Salomon yang menggunakan membran Gore-Tex sehingga tahan air. Meski ringan dan responsif, ia tetap memberikan traksi kuat dengan sol Contagrip yang cocok untuk medan campuran. Interior cukup empuk untuk kenyamanan jangka panjang. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Membran Gore-Tex (waterproof breathable)\r\n• Potongan mid-height\r\n• Outsole Contagrip All Terrain\r\n• Upper ringan &amp; fleksibel\r\n• Sangat stabil di medan ', 'Tersedia'),
(62, 10, 'Eiger Dining Set 01', 15000, 'MP6LS5DrzE908jyTix2v.png', 'Set alat makan minimalis dan ringan yang ideal untuk aktivitas outdoor seperti camping atau hiking. Set ini memuat sendok, garpu, dan pisau dalam satu paket kompak, sehingga praktis dibawa dan digunakan saat makan di alam terbuka.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Isi: 1 pisau, 1 sendok, 1 garpu \r\n• Material: Stainless-steel (atau logam tahan karat) —bahan umum untuk alat makan Eiger ', 'Tersedia'),
(63, 13, 'Bigarmour Neira Pro Thermal Baselayer', 30000, 'B9fTbYQKV2z4vomt8KlD.png', 'Bigarmour Neira Pro Thermal Baselayer adalah baselayer thermal ringan yang dirancang sebagai first layer untuk aktivitas outdoor di cuaca dingin. Materialnya cepat kering, lembut di kulit, dan mampu mempertahankan suhu tubuh berkat teknologi Omni-Heat. Dilengkapi fleksibilitas yang baik untuk bergerak dan fitur antibakteri agar tetap nyaman digunakan dalam waktu lama.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Omni-Heat Technology\r\n• Quick dry (cepat kering)\r\n• Soft &amp; skin-friendly\r\n• Antibacterial\r\n• Ultralight', 'Tersedia'),
(64, 7, 'Archeos Blackdeer - 2P Tent', 35000, 'sccvK8pwdxLAAuf2cjOX.png', 'Tenda backpacking ringan dari Blackdeer untuk dua orang. Bahan kain luar berkualitas tinggi (polister 190T) dengan lapisan tahan air, serta pondasi (floor) dari Oxford 150D yang sangat tahan. Poles-nya menggunakan aluminium seri 7001 jadi cukup ringan tapi kuat. Ada desain mesh untuk ventilasi, dan beberapa versi memiliki “snow skirt” untuk penggunaan musim dingin.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Inner (2P): 215 × 130 × 100 cm\r\n• Outer (2P): 215 × 240 × 105 cm\r\n• Outer material: 190T Polyester PU2000 mm / versi baru 20D Nylon PU3000 mm\r\n• Floor: 150D Oxford PU3000 mm\r\n• Tiang: aluminium 7001\r\n', 'Tersedia'),
(65, 12, 'Decathlon Forclaz 1 - MT100 ', 10000, 'OOtS7OXbB23hWAfSN2mL.png', 'Decathlon Forclaz MT100 adalah trekking pole ringan yang dirancang untuk hiking dan trekking ringan hingga menengah. Materialnya kuat, mudah disesuaikan panjangnya, serta memberikan stabilitas tambahan di jalur tanah, bebatuan, maupun tanjakan. Pole ini cocok untuk pendaki pemula hingga menengah yang membutuhkan dukungan ekstra tanpa menambah banyak beban.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Material: Aluminium\r\n• Sistem pengaturan panjang: Push-pin\r\n• Panjang terlipat: ± 55 cm\r\n• Panjang maksimal: ± 110 cm\r\n• Pegangan: Busanya nyaman dan tidak licin', 'Tersedia'),
(66, 12, 'Canifer Gaiter Waterproof Pelindung Kaki Hiking Outdoor', 10000, 'cJC3aVNo8EGl0dMjyHZG.png', 'Pelindung kaki berbahan tahan air yang dirancang untuk hiking, trekking, atau aktivitas outdoor lainnya. Gaiter ini membantu melindungi kaki dari air, debu, kerikil, dan lumpur, sekaligus menjaga agar kaki tetap kering dan bersih selama perjalanan.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Material: Waterproof (kemungkinan poliester atau taslan)\r\n• Penyesuaian: Strap atas dan bawah untuk mengikat ke sepatu dan kaki\r\n• Pengunci: Velcro atau buckle di bagian atas / samping (biasanya)\r\n• Panjang gaiter: Sekitar 42 cm (standar gaiter hiking)\r\n• Fungsi: Melindungi dari air, debu, dan benda asing masuk ke sepatu', 'Tersedia'),
(67, 6, 'Dobujack Gorpcore Jacket Vela Black', 30000, 'PQqwNiv6WrXl4mwTj7ud.png', 'Jaket gorpcore ringan berbahan parasut yang tahan angin dan nyaman untuk aktivitas outdoor ringan maupun gaya urban. Dilengkapi patch Dobujack ber-velcro, zipper tahan air, serta penyesuaian pada pinggang dan hoodie. Memiliki banyak kantong fungsional termasuk hidden pocket, membuatnya praktis untuk membawa barang kecil saat beraktivitas.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Material: Parasut (windproof)\r\n• Patch: Dobujack velcro patch\r\n• Resleting: Waterproof zipper\r\n• Penyesuaian: Rope stopper pada pinggang &amp; hoodie\r\n• Berat: ± 300 g\r\n𝗦𝗶𝘇𝗲 : L - XL', 'Tersedia'),
(68, 3, 'Credifox Sleeping Bag Polar Tebal Seri Climber', 20000, 'ishE4G0vK8qmoz26ybLc.png', 'Sleeping bag sederhana berbahan polar tebal yang memberikan kehangatan untuk camping ringan. Modelnya berbentuk selimut (envelope) sehingga nyaman, mudah dilipat, dan cocok untuk penggunaan outdoor non-ekstrem.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Tipe: Envelope / selimut\r\n• Material: Bahan polar tebal\r\n• Kenyamanan: Hangat untuk camping ringan\r\n• Bentuk: Bisa dilipat dan digulung', 'Tersedia'),
(69, 3, 'Eiger Equator Inflatable Mat', 20000, 'D5HjzmYQALKWUQmcbkrK.png', 'Matras tiup ringan dan ringkas untuk kegiatan camping. Dirancang supaya mudah dikemas, pad ini cocok untuk digunakan sebagai alas tidur di tenda, memberikan kenyamanan tanpa menambah beban besar pada ransel.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Jenis: Matras tiup (inflatable)\r\n• Material: Fabric + lapisan tahan tekanan udara\r\n• Berat: ± 1000 g\r\n• Fitur: Ringkas saat dilipat, pengisian angin mudah, permukaan nyaman', 'Tersedia'),
(70, 10, 'Kompor Gas Portable 2In1 Satu Tungku', 25000, 'LkThxf2UuWA1lFz3UmMW.png', 'Kompor mini serbaguna yang bisa menggunakan dua jenis sumber bahan bakar: gas kaleng dan LPG (tabung). Karena satu tungku dan desain yang ringkas, kompor ini cocok untuk aktivitas camping, piknik, BBQ, atau penggunaan di ruang sempit. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Jumlah tungku: 1 \r\nTipe bahan bakar: 2-in-1 (kaleng + LPG) \r\n• Dimensi: contohnya 43 × 26,5 × 7 cm untuk model tertentu \r\n• Berat: misalnya ~1,3 kg untuk beberapa model \r\n• Sistem pengapian: automatic piezo / pemantik elektrik ', 'Tersedia'),
(71, 9, 'Eiger Junior Rockmaster 18L Backpack', 30000, 'XwLFsNbT8SDTB6AdwdSf.png', 'Eiger memiliki desain yang mendukung memanjat dengan bukaan lebar untuk akses mudah, saku dalam, saku khusus sepatu climbing, loop untuk carabiner, serta tali dada agar tetap stabil saat dipakai. Ada juga dua saku samping dan tali webbing yang bisa diatur agar pas di bahu. Terbuat dari bahan polyester yang cukup tahan dan sedikit water-repellent.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 18 Liter\r\n• Dimensi: 27 × 17 × 45 cm\r\n• Berat: ± 700 gram\r\n• Material: Polyester 600D Double Face Ripstop, PU coating, lining Polyester 200D (recycle)\r\n• Fitur: Bukaan lebar, saku sepatu climbing, loop untuk carabiner, 2 saku samping, tali dada stabilizer', 'Tersedia'),
(72, 11, 'Kursi Lipat Aleister Arei Outdoorgear', 20000, 'jqC1XsypdrN5PwqZ1NdN.png', 'Kursi lipat ringan dengan rangka kokoh dan bahan dudukan yang nyaman, ideal untuk camping, memancing, maupun kegiatan outdoor santai. Desain compact memudahkan penyimpanan serta dilengkapi penopang yang stabil.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas Beban: 150 kg\r\n• Material Rangka: Kokoh + karet anti-slip pada kaki\r\n• Material Dudukan: Kain tebal &amp; nyaman\r\n• Fitur: Compact, stabil, sudah termasuk tas penyimpanan (carry bag)', 'Tersedia'),
(73, 10, 'Cosmos CGC 121 P - Kompor Gas Portable', 30000, 'QMc0udR9EeiwwRPTJ6ah.png', 'Kompor gas portable satu tungku yang praktis dibawa untuk kegiatan outdoor, kost, ataupun perjalanan. Dilengkapi sistem pemutus aliran gas otomatis untuk keamanan jika tekanan gas terlalu tinggi. Tatakan panel terbuat dari aluminium yang anti panas dan anti slip, sehingga stabil saat digunakan. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Jumlah tungku: 1 \r\n• Material: Stainless steel / aluminium \r\n• Tatakan Panel: Aluminium (anti panas &amp; anti-slip) \r\n• Dimensi: sekitar 36 × 32 × 10 cm \r\n• Berat: sekitar 0,95 kg ', 'Tersedia'),
(74, 13, 'Bogaboo Sarung Tangan Outdoor Gezy', 8000, 'E7CtEcwA5EVacwKvs3bB.png', 'Sarung tangan outdoor berbahan polar yang hangat, tebal, dan nyaman digunakan. Didesain praktis dengan ujung jempol dan telunjuk yang bisa dibuka–tutup sehingga tetap mudah mengoperasikan ponsel. Telapak tangan dilengkapi anti-slip untuk grip lebih stabil, cocok untuk aktivitas outdoor di cuaca dingin.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Bahan: Polar tebal &amp; lembut\r\n• Ujung jari (jempol &amp; telunjuk) dapat dibuka–tutup\r\n• Telapak anti-slip\r\n• Ukuran: One size (P x L = 23 × 10 cm)\r\n• Berat: ± 80 g', 'Tersedia'),
(75, 3, 'Green Kazoo Sleeping Bag', 30000, 'IuDZaymM1CJRhJAEun4b.png', 'Sleeping bag mummy yang ringkas dan sangat hangat untuk pendakian atau camping di suhu dingin hingga sekitar –18°C. Menggunakan isolasi 700-fill ProDown yang kompresibel dan material luar nylon berlapis DWR untuk perlindungan terhadap kelembapan. Dilengkapi hood ber-insulasi, draft collar, serta baffle untuk mencegah cold-spot. \r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Rating suhu: ± –18°C\r\n• Isolasi: 700-fill ProDown (recycled)\r\n• Material luar: Nylon ringan dengan lapisan DWR\r\n• Fitur: Insulated hood, draft collar, anti cold-spot baffles\r\n• Berat: ± 1.3–1.4 kg (tergantung ukuran)', 'Tersedia'),
(76, 6, 'Jaket Pria Monta Track 01 Arei Outdoorgear', 25000, 'kLxkhb9LzuwUizAusV3f.png', 'Jaket ringan berbahan polyester yang breathable, ideal untuk hiking, lari, bersepeda, ataupun aktivitas sehari-hari. Jaket ini punya ventilasi di bagian punggung untuk aliran udara, serta penutup kepala (hood) untuk perlindungan. Tangan dilengkapi karet elastis agar pas di pergelangan, dan resleting YKK menjaga keandalan bukaan jaket.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Bahan: Polyester \r\n• Ventilasi udara di bagian belakang (back vent) \r\n• Penutup kepala (hood) \r\n• Saku: 2 saku samping dengan resleting \r\n• Pergelangan tangan: karet elastis \r\n𝗦𝗶𝘇𝗲 : M - L', 'Tersedia'),
(77, 12, 'H2S Senter LED P50 ', 10000, 'FQHUkLaUQos4xi77Ou78.png', 'Lampu saku yang sangat praktis dan terang, dengan kemampuan zoom out (fokus berubah) serta indikator LED untuk menunjukkan status baterai. Dilengkapi port USB Type‑C untuk pengisian ulang, membuatnya modern dan mudah diisi dari power bank atau adaptor.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Tipe LED: P50\r\n• Mode Zoom bisa disesuaikan antara fokus / menyebar\r\n• Pengisian daya: USB Type-C (rechargeable) \r\n• Model / Kode Produk: HS1887 ', 'Tersedia'),
(78, 3, 'Eiger Matras Cacing', 10000, 'cUQNY6jEnRkV4vUJGtai.png', 'Matras gulung berbahan busa yang ringan, fleksibel, dan praktis untuk kegiatan outdoor seperti camping atau hiking. Desain “cacing” membuatnya mudah digulung, tidak licin, serta memberikan kenyamanan dasar saat tidur di atas tanah.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Jenis: Matras gulung (model cacing)\r\n• Bahan: Busa elastis ringan\r\n• Tekstur: Bergelombang / beralur\r\n• Keunggulan: Mudah digulung, ringan, tidak licin', 'Tersedia'),
(79, 11, 'Kursi Lipat Orion Arei Outdoorgear', 25000, 'TulvXIO4uD54yMjBpGr4.png', 'Kursi lipat minimalis dengan rangka durable dan bantalan duduk ergonomis. Dibuat untuk mendukung posisi duduk stabil dan nyaman dalam waktu lama, cocok untuk camping, mancing, hingga acara outdoor.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Dimensi Terpasang: 50 × 48 × 80 cm\r\n• Berat: ±2,19 kg\r\n• Material: Rangka aluminium + Oxford 600D + tabung baja\r\n• Beban Maksimal: 100 kg\r\n• Fitur: Tas penyimpanan + 2 kantong samping (tempat botol/gelas).\r\n', 'Tersedia'),
(80, 10, 'OXONE OX108 Gas Portable', 7000, 'ciH1epx40uxnTi3Xyu7U.png', 'Tabung gas portable (butane) berkapasitas 250 gram yang dirancang untuk digunakan dengan kompor portabel dan torch. Karena ukurannya ringkas dan tekanan gas yang stabil, tabung ini cocok untuk aktivitas outdoor seperti camping, hiking, atau BBQ.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 250 gram gas butane murni \r\n• Dimensi tabung: 6,5 cm × 6,5 cm × 20 cm \r\n• Berat isi: 250 gram \r\n• Kompatibilitas: Cocok untuk hampir semua jenis kompor portable &amp; torch gun ', 'Tersedia'),
(81, 6, 'Jaket Gunung Oviolite V1 Arei Outdoorgear', 25000, 'pQ1eUphi9GzN7id4Vgqj.png', 'Jaket gunung ringan yang tahan air dan windproof, cocok untuk hiking, camping, dan aktivitas outdoor ringan. Dilengkapi hoodie yang dapat dilepas-pasang, empat saku depan, resleting YKK, serta pengaturan velcro di pergelangan dan stopper strap di bagian bawah untuk kenyamanan dan perlindungan yang optimal.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Bahan: Nylon\r\n• Waterproof / Water repellent\r\n• Hood dapat dilepas / dipasang\r\n• Saku: 4 saku depan                ', 'Tidak tersedia'),
(82, 12, 'Headlamp Eiger Horagalles', 7000, 'LpQBh7fb8y75HTsoWjHn.png', 'Lampu kepala adventure yang dirancang untuk hiking, camping, trekking, dan susur gua. Memiliki lima mode pencahayaan (4 LED, 8 LED, 14 LED, 14 LED Flashing, dan mati), serta kepala lampu bisa dimiringkan hingga 90° untuk menyesuaikan arah cahaya. Didukung oleh rangkaian sirkuit solid‑state agar baterai lebih awet.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Dimensi: 4,4 × 7,2 × 7,2 cm\r\n• Berat: ± 600 g\r\n• Material: ABS, TPR, PVC; lensa AS\r\n• LED: 14 LED + tambahan LED kecil\r\n• Mode pencahayaan: 4 LED / 8 LED / 14 LED / 14 LED Flashing / Off\r\n• Daya: 3× AAA (tidak termasuk)', 'Tersedia'),
(83, 5, 'Ortuseight Shkhara Graphite', 45000, 'Hbn5XeD9rlbWs2SBJbgK.png', 'Sepatu trail run lokal dari Ortuseight yang menggunakan outsole Vibram untuk traksi maksimal di medan teknikal. Dilengkapi Vibram Rolling Gait System untuk stabilitas, midsole EVA Phylon dengan OrtShox untuk peredaman, serta upper mesh dengan konstruksi PU Nosew yang ringan dan tahan lama. Sistem Quick Fit dan OrtStrap membantu mendapatkan fit yang aman dan stabil saat berlari di jalur alam.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Outsole: Vibram Ground Adaptive Zone + Vibram Multitrek Compound\r\n• Midsole: EVA Phylon + OrtShox\r\n• Upper: Mesh + PU Nosew\r\n• Fitur stabilitas: Quick Fit, OrtStrap\r\n• Traksi: Lug trapezium self-cleaning\r\n𝗦𝗶𝘇𝗲: 38 - 44', 'Tersedia');
INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `ketersediaan_stok`) VALUES
(84, 13, 'Eiger JR Moorland Rimba Hat', 15000, '7XNUWWd7NvsfQmCcbRL1.png', 'JR Moorland Rimba Hat adalah topi rimba anak yang dirancang untuk aktivitas luar ruang. Terbuat dari bahan nilon ringan dengan teknologi Tropic Repellent untuk perlindungan dari cipratan air dan hujan ringan, serta ventilasi laser-cut di sisi topi agar tetap sejuk saat cuaca panas. Dilengkapi tali dagu yang bisa dilepas-pasang untuk kenyamanan penggunaan.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Model: Topi rimba anak\r\n• Material: Nilon ringan\r\n• Teknologi: Tropic Repellent (water-repellent), Tropic Vent (laser-cut ventilation)\r\n• Fitur: Tali dagu removable', 'Tersedia'),
(85, 8, 'Carrier Rei Toba 40L', 25000, 'jg6tQmzVe0JqZ7sJw604.jpg', 'Carrier dari brand Rei (Arei) dengan kapasitas sekitar 40 L, ideal untuk hiking harian atau backpacking singkat. Karena kapasitasnya cukup sedang, tas ini cocok untuk pendakian 1–2 hari atau trip di mana kamu tidak membawa beban sangat besar. Modul desainnya memungkinkan pemakaian fleksibel dengan ruang cukup untuk perlengkapan penting.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 40 Liter\r\n• Sistem punggung: Adjustable • Fit sehingga fleksibel untuk berbagai tinggi badan\r\n• Material: Polyester Ripstop\r\n• Fitur: Raincover, side pocket, hipbelt pockets\r\n𝗖𝗼𝗹𝗼𝗿: Navy', 'Tersedia'),
(86, 7, 'Consina Magnum - 6P Tent', 70000, 'x1wcxtnfPA6hy7xP9sg9.png', 'Tenda dome besar dari Consina, dirancang untuk menampung hingga 6 orang. Cocok digunakan untuk camping keluarga, basecamp ringan, atau kegiatan berkelompok. Struktur tenda cukup kokoh dan ruang internalnya luas sehingga nyaman untuk banyak orang.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 6 orang\r\n• Dimensi: teras 80 cm + ruang 200 × 175 × 132/135 cm\r\n• Outer: 190T Polyester PU coated\r\n• Inner: 170T Polyester breathable\r\n• Floor: PE\r\n• Fitur: ventilasi depan &amp; belakang\r\n• Berat: ±3,9 kg', 'Tersedia'),
(87, 9, 'Consina Detroid 25L', 35000, 'uk4uBNp8KjsRXE6rThdE.png', 'Daypack yang ideal untuk kegiatan sehari-hari, hiking ringan, atau traveling ringan. Meskipun spesifikasi detail seperti bahan dan jumlah kompartemen sulit ditemukan secara terbuka, ransel di segmen ini biasanya memadukan daya tahan dan kapasitas yang cukup besar dengan bobot yang masih terjangkau.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas: 25 Liter\r\n• Fitur umum: Kompartemen besar, saku depan, saku samping botol, tali bahu ergonomis\r\n• Material umum Consina: Polyester water-repellent&quot;', 'Tersedia'),
(88, 4, 'Consina Askole', 30000, 'oiPE9I3pE34Exz2n7vFQ.png', 'Sepatu gunung premium dari Consina, dengan bahan suede leather yang lentur dan dukungan pergelangan kaki (ankle support) yang cukup kuat. Memakai membran Uneebtex yang tahan air sekaligus breathable, menahan air masuk tetapi tetap bisa mengeluarkan panas. Ringan, tahan lama, dan cocok untuk hiking maupun trekking harian.\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Upper suede leather premium\r\n• Membran Uneebtex waterproof\r\n• Outsole anti-slip\r\n• Ankle support kuat\r\n• Kedap air namun tetap breathable\r\n𝗦𝗶𝘇𝗲 : 40 - 45', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `verification_token` varchar(64) DEFAULT NULL,
  `reset_token` varchar(64) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `verification_token`, `reset_token`, `reset_expires`, `is_verified`, `created_at`, `password`) VALUES
(1, 'admin', '', NULL, NULL, NULL, 0, '2025-11-26 19:05:30', '$2y$10$oijihNDDAotoTub2a.jgju/Cx/ULxmFKLnOtlcytMuISJ1JdOK5MS'),
(2, 'zahramynd', 'zahrasalma31@gmail.com', NULL, NULL, NULL, 1, '2025-11-26 19:19:51', '$2y$10$oJvV2Ol9vnKsCvdF2oXaiu0xZVP.loDzgkuET4GwlWrK4UZ6X7Reu'),
(3, 'Milan', 'zahrasdm14@gmail.com', NULL, NULL, NULL, 1, '2025-11-29 16:43:23', '$2y$10$mWWuHpRjx.2DX4DXJ8Dal.749zjDIK0ZvepiC9uavBesm2vRroxfi'),
(4, 'besus', 'elektrocar@kidoshopeu.xyz', NULL, NULL, NULL, 1, '2025-12-02 19:34:39', '$2y$10$vSH0.tgQ7fbYffROmB5VZOUpbZpc8X2WMbtTXOYgbA1ZVnDHzPpBq');

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
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
