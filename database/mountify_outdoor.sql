-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2025 at 07:08 AM
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
(4, 'Sepatu Hiking'),
(5, 'Sepatu Trail Running'),
(6, 'Jaket'),
(7, 'Tenda'),
(8, 'Carrier'),
(9, 'Hiking Packs'),
(10, 'Cooking Set'),
(11, 'Camping Gear'),
(12, 'Hiking Gear'),
(13, 'Apparel');

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
(6, 9, 'Greenforest Arvensis Hydration Pack 10L', 25000, '5xzuZ9hrPYxp9fGdWCGy.png', 'Hydration vest ringan untuk trail run, hiking, gowes, atau summit. Kapasitas 10L dengan kompartemen lengkap buat HP, snack, soft flask, dan perlengkapan kecil. Nyaman dipakai, breathable, dan stabil saat bergerak.\r\n\r\n𝗙𝗶𝘁𝘂𝗿 𝗽𝗿𝗼𝗱𝘂𝗸 :\r\n• Kapasitas 10L\r\n• Material ringan (Nylon + Spandex)\r\n• Bobot cuma ±222g\r\n• Mesh breathable\r\n• Banyak kantong fungsional\r\n• Adjustable strap, fit di badan\r\n\r\n𝗖𝗼𝗰𝗼𝗸 𝘂𝗻𝘁𝘂𝗸 : Hiking, trail running, summit, speed hiking, cycling.', 'Tersedia'),
(7, 7, 'BigAdventure Tambora Series - Tenda 2P', 45000, 'zhOu5VUcySWELDWEBvUi.jpg', 'Bigadventure Tambora Series adalah tenda kapasitas 2 orang dengan material premium yang tahan cuaca ekstrem. Cocok untuk pendakian gunung, camping, maupun ekspedisi outdoor. Menggunakan bahan ripstop, waterproof tinggi, serta rangka aluminium yang kuat namun ringan.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗣𝗿𝗼𝗱𝘂𝗸:\r\n• Flysheet: 210T Ripstop Polyester, PU 3000mm, UPF 50+, seam taped\r\n• Inner Tent: 190T Ripstop breathable + B3 mesh\r\n• Lantai Tenda: 210T Ripstop Polyester, PU 3000mm, seam taped\r\n• Footprint: 210T Ripstop Polyester PU 3000mm (200 gram)\r\n• Rangka (Poles): Aluminium 8.5 mm dengan triangle joining\r\n• Pasak: Aluminium Y-stakes\r\n• Guyrope: Reflective D3mm with aluminium stopper\r\n• Fitur Tambahan: Saku penyimpanan, lamp hanger\r\n• Ukuran Terpasang: 210 × (70 + 140 + 70) × 105 cm\r\n• Ukuran Packing: 40 × 15 cm\r\n• Berat: 2350 gram (tanpa footprint)', 'Tersedia'),
(8, 5, '910 Nineten Yuza Evo - Sepatu Trail Running', 35000, 'ALWxgulBnR5isIcfAYBT.jpg', 'Yuza Evo adalah sepatu lari trail terbaru dari Yuza yang dirancang khusus untuk medan alam tropis Indonesia. Menggabungkan teknologi modern untuk memberikan kenyamanan, stabilitas, dan daya tahan maksimal saat berlari di jalur off-road.\r\n\r\n𝗦𝗽𝗲𝘀𝗶𝗳𝗶𝗸𝗮𝘀𝗶 𝗣𝗿𝗼𝗱𝘂𝗸:\r\n• Upper Maxi Breathe: ringan &amp; breathable\r\n• Hexa Cush insole: empuk, tidak mudah panas\r\n• Seamlock: upper kokoh &amp; fleksibel\r\n• HyperWeb: struktur stabil tanpa menambah beban\r\n• Airflex Sole: grip kuat &amp; ringan\r\n• Rubber Tech-Outsole: traksi tinggi, tahan abrasi\r\n\r\n𝗨𝗸𝘂𝗿𝗮𝗻 : 39-44', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$oijihNDDAotoTub2a.jgju/Cx/ULxmFKLnOtlcytMuISJ1JdOK5MS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
