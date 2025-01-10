-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2025 at 03:09 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `judul` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `gambar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tanggal` datetime DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'JUARA 1 TIKI MAPSI PUTRI', 'Pada tahun 2016, tepatnya saat saya menduduki bangku kelas 6 SD, saya mendapatkan juara 1 TIKI Putri MAPSI tingkat kecamatan.', 'TIKI.jpg', '2016-06-07 14:46:15', 'admin'),
(2, 'JUARA 3 DESAIN POSTER DIGITAL', 'Saya mendapatkan juara 3 desain poster digital tingkat kabupaten saat saya menduduki bangku kelas 7 SMP pada tahun 2018.', 'poster.jpg', '2018-04-10 15:01:26', 'admin'),
(3, 'JUARA 3 FOTOGRAFI', 'Saya mendapatkan juara 3 fotografi tingkat nasional saat saya menduduki bangku kelas 12 SMA pada tahun 2022.', 'fotografi.jpg', '2022-11-22 18:15:01', 'admin'),
(4, 'LOLOS PENDANAAN P2MW', 'Tahun 2024, berhasil lolos pendanaan P2MW dengan judul \"Temo: Jasa Foto dan Video Booth Holographic\".', '20241215154828.jpeg', '2024-12-15 15:48:28', 'admin'),
(6, 'itc', 'itc promosi di semnasti', '20250105175845.jpg', '2025-01-05 17:58:45', 'auliya');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `judul` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tanggal` datetime DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `foto`, `tanggal`, `username`) VALUES
(3, 'matrikulasi', '20250105172754.jpeg', '2025-01-05 17:27:54', 'auliya'),
(4, 'itc', '20250105172905.jpeg', '2025-01-05 17:29:05', 'auliya'),
(5, 'semnasti', '20250105190416.jpeg', '2025-01-05 19:04:16', 'auliya'),
(6, 'rapat', '20250109074427.jpg', '2025-01-09 07:44:27', 'nabilah'),
(7, 'probstat', '20250109074448.jpg', '2025-01-09 07:44:48', 'nabilah'),
(8, 'ug1', '20250109074506.jpg', '2025-01-09 07:45:06', 'nabilah'),
(9, 'rpl', '20250109074533.jpg', '2025-01-09 07:45:33', 'nabilah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(2, 'danny', '$2y$10$XuJV6217PdHuooOo.OZusOmAs7B5dSCdaK8baJgbtimBuE2GiVWm2', 'muichiro tokito (1).jpeg'),
(3, 'auliya', '$2y$10$qfCaNWySCpK/WBZrXpUmfuh9613OLmraxfrw4kydqD3hNRJJsv92S', '「ᴍᴜɪᴄʜɪʀᴏ ɪᴄᴏɴ」.jpeg'),
(5, 'auliyasn2', '$2y$10$0vwC1nAAq0JYGYWP4A8UFOEVOBlpWpt3GW.IBjIZbg862WpB4dvMi', '20250109213543.jpeg'),
(6, 'admin', '$2y$10$j7aMGUfJoOixwE8gL/b5sukayK4mLC06DFfrI6oqZiWpAlW.Oh1Cu', 'download (4).jpeg'),
(7, 'nabilah', '$2y$10$5TrTKg6V2lFSggvu5iH3W.ptRY3LBj0i0QqAdU19EDddY84b12/Cm', 'download.jpeg'),
(8, 'auliyasn', '$2y$10$EqauFbwWhFD2u5VqNWBtD.Te.8JtOqjA0sdYSCnlTiqN8MPDZQcp.', 'aul.jpg'),
(9, 'shadrina', '$2y$10$xaWTXaTtD62b6NU3JAIY3.wmuR0lCfzPF9Nrv/QdewFMoW2gVZUli', 'aul2.jpg'),
(10, 'coba1', '$2y$10$YACnkPPZiEF0kIDPFuhO6er3HWwhV6G7iCKlfD6DlM0e8Tiwc4Xxe', '20250109213224.png'),
(11, 'cobaya', '$2y$10$nHwzukVy0Zi67EDrMOzRVOwX4T462fDX.NcHjbGRZXy2xVL6ss.Xq', 'download.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
