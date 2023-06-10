-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 12:49 PM
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
(1, 'admin', '$2y$10$tv7kc2mDRYieR3xW85qNOunlJUj8MUNyEonNao94UtlqEHHEXrM5S');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `idDokter` bigint(20) UNSIGNED NOT NULL,
  `namaDokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisDokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoDokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`idDokter`, `namaDokter`, `jenisDokter`, `fotoDokter`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Dr. Andreas', 'Dokter THT', 'dokter/ALzvL1JOxXKsQKSQF5flFXpya2AHqep9JyZ96nCj.jpg', '2023-06-10 03:19:30', '2023-06-10 03:19:30', NULL),
(3, 'Dr. Budi', 'Dokter Jantung', 'dokter/UDoj8vUcJbDObGkUz1808ZBsnCGn0B3DNtu9WXav.jpg', '2023-06-10 03:20:13', '2023-06-10 03:20:13', NULL),
(4, 'Dr. Caroline', 'Dokter Otak dan Neurologi', 'dokter/3A4MNL6Ip3OoWfr3qtwAjCr9iFWJrs2eWX7EMgPh.jpg', '2023-06-10 03:21:41', '2023-06-10 03:21:41', NULL),
(6, 'Dr. Mulyanti', 'Dokter Gigi', 'dokter/N5PYoUgnIdAoGA7YwbhoS4QXZifd0f5I8EVY1rmE.jpg', '2023-06-10 03:22:32', '2023-06-10 03:22:32', NULL),
(7, 'Dr. Mulyanto', 'Dokter Tulang', 'dokter/KOBqJyVWNjOizS6cQOSyZaxyqaAFYWX0hxrcqg51.jpg', '2023-06-10 03:23:03', '2023-06-10 03:23:03', NULL),
(8, 'Dr. Panji', 'Dokter Penyakit Dalam', 'dokter/8uGYRXlrBl39eIhavp7FHcM1QRFXaTpROonEzXkD.jpg', '2023-06-10 03:23:25', '2023-06-10 03:23:25', NULL),
(9, 'Dr. Yanto', 'Dokter Umum', 'dokter/yZpmCFCMoDPLiu8mUdCqGzBZvXHr25dtwEosf3PR.jpg', '2023-06-10 03:24:07', '2023-06-10 03:24:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `janji`
--

CREATE TABLE `janji` (
  `idJanji` bigint(20) UNSIGNED NOT NULL,
  `idDokter` bigint(20) UNSIGNED NOT NULL,
  `idPasien` bigint(20) UNSIGNED NOT NULL,
  `tanggal_temu` date NOT NULL,
  `jam_temu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `janji`
--

INSERT INTO `janji` (`idJanji`, `idDokter`, `idPasien`, `tanggal_temu`, `jam_temu`, `keluhan`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2023-06-01', '09.00 - 10.00', 'Saya punya keluhan sekarang otak saya sakit kebanyakan mikir buat ujian. Apalagi kita harus bikin website', 'Accepted', '2023-06-10 03:42:12', '2023-06-10 03:42:12');

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
(20, '2023_06_02_212014_create_dokter_table', 1),
(21, '2023_06_02_212049_create_admin_table', 2),
(22, '2023_06_02_212114_create_pasien_table', 3),
(23, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(24, '2023_06_02_211826_create_janji_table', 4),
(25, '2023_06_02_212138_create_review_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `idPasien` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`idPasien`, `username`, `nama`, `tempatLahir`, `tanggalLahir`, `telepon`, `alamat`, `password`, `created_at`, `updated_at`) VALUES
(1, 'michael', 'Michael Harry Setiawan', 'Jakarta', '2023-05-31', '0123456789', 'Tangerang Allogio', '$2y$10$oXGQMqHVdaXHJbXzPfaORu2byO3M2ayiqUZQ5YTujTtRKGHwDxNCC', '2023-06-10 03:34:56', '2023-06-10 03:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `idReview` bigint(20) UNSIGNED NOT NULL,
  `idDokter` bigint(20) UNSIGNED NOT NULL,
  `idPasien` bigint(20) UNSIGNED NOT NULL,
  `idJanji` bigint(20) UNSIGNED NOT NULL,
  `rating` double(8,2) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idReview`),
  ADD KEY `review_idjanji_foreign` (`idJanji`),
  ADD KEY `review_iddokter_foreign` (`idDokter`),
  ADD KEY `review_idpasien_foreign` (`idPasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `idDokter` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `janji`
--
ALTER TABLE `janji`
  MODIFY `idJanji` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `idPasien` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `review_idjanji_foreign` FOREIGN KEY (`idJanji`) REFERENCES `janji` (`idJanji`),
  ADD CONSTRAINT `review_idpasien_foreign` FOREIGN KEY (`idPasien`) REFERENCES `janji` (`idPasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
