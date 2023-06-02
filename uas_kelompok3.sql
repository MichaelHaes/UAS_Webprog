-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 12:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_kelompok3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$JI47DcpWsnDleueRegF59efSwI9H8SF3ExA9ogTrpXZosgvd.sq8a');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `idDokter` bigint(20) UNSIGNED NOT NULL,
  `namaDokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisDokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoDokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `janji`
--

CREATE TABLE `janji` (
  `idJanji` bigint(20) UNSIGNED NOT NULL,
  `idDokter` bigint(20) UNSIGNED NOT NULL,
  `idPasien` bigint(20) UNSIGNED NOT NULL,
  `tanggal_temu` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_06_02_212114_create_pasien_table', 1),
(2, '2023_06_02_212014_create_dokter_table', 2),
(3, '2023_06_02_212049_create_admin_table', 3),
(4, '2023_06_02_211826_create_janji_table', 4),
(5, '2023_06_02_212138_create_review_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `idPasien` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `idReview` bigint(20) UNSIGNED NOT NULL,
  `idDokter` bigint(20) UNSIGNED NOT NULL,
  `idPasien` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`idDokter`);

--
-- Indexes for table `janji`
--
ALTER TABLE `janji`
  ADD PRIMARY KEY (`idJanji`),
  ADD KEY `janji_iddokter_foreign` (`idDokter`),
  ADD KEY `janji_idpasien_foreign` (`idPasien`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`idPasien`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idReview`),
  ADD KEY `review_iddokter_foreign` (`idDokter`),
  ADD KEY `review_idpasien_foreign` (`idPasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `idDokter` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `janji`
--
ALTER TABLE `janji`
  MODIFY `idJanji` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `idPasien` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `idReview` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `janji`
--
ALTER TABLE `janji`
  ADD CONSTRAINT `janji_iddokter_foreign` FOREIGN KEY (`idDokter`) REFERENCES `dokter` (`idDokter`),
  ADD CONSTRAINT `janji_idpasien_foreign` FOREIGN KEY (`idPasien`) REFERENCES `pasien` (`idPasien`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_iddokter_foreign` FOREIGN KEY (`idDokter`) REFERENCES `janji` (`idDokter`),
  ADD CONSTRAINT `review_idpasien_foreign` FOREIGN KEY (`idPasien`) REFERENCES `janji` (`idPasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
