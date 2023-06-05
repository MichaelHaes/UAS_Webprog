-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 04:58 PM
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
(1, 'admin', '$2y$10$L3LUeu0tshSmsPPEJVg1P.C7BMbivGXF.8SFQ3Ynenx3fxqv5asZO');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`idDokter`, `namaDokter`, `jenisDokter`, `fotoDokter`, `created_at`, `updated_at`) VALUES
(1, 'Mikael Doc', 'Dokter Umum', 'dokter/ooQKdCBnQmpuoWaxl6T5Qg27YEjzZIEhFEFReufI.png', '2023-06-04 01:08:17', '2023-06-04 01:08:17'),
(2, 'Harry Nih', 'Dokter Hewan', 'dokter/qJQdbyhW7MuteVgfR5YHFeBkJDOzqjULzUbzm27g.png', '2023-06-04 01:08:31', '2023-06-04 01:08:31');

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
(1, 1, 1, '2023-06-23', '09.00 - 10.00', 'Test', 'Pending', '2023-06-05 06:38:45', '2023-06-05 06:38:45'),
(4, 2, 2, '2023-06-16', '15.00 - 16.00', 'test kedua', 'Pending', '2023-06-05 07:18:01', '2023-06-05 07:18:01'),
(5, 1, 1, '2023-06-30', '17.00 - 18.00', 'test3', 'Pending', '2023-06-05 07:23:38', '2023-06-05 07:23:38'),
(6, 1, 2, '2023-07-13', '09.00 - 10.00', 'test4', 'Pending', '2023-06-05 07:27:16', '2023-06-05 07:27:16'),
(7, 1, 2, '2023-07-02', '09.00 - 10.00', 'test5', 'Pending', '2023-06-05 07:29:27', '2023-06-05 07:29:27'),
(8, 1, 2, '2023-06-24', '09.00 - 10.00', 'test6', 'Pending', '2023-06-05 07:30:35', '2023-06-05 07:30:35');

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
(11, '2023_06_02_212114_create_pasien_table', 1),
(12, '2023_06_02_212049_create_admin_table', 2),
(13, '2023_06_02_212014_create_dokter_table', 3),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(15, '2023_06_02_211826_create_janji_table', 4),
(16, '2023_06_02_212138_create_review_table', 4);

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
(1, 'pasien', 'pasien', 'Tangerang', '2023-06-02', '12345678', 'Tangerang', '$2y$10$kjxQ2URCgf8/OymhC1/bb.0R2pIohnsdqJPT8mq8K7EigiUOHkHM6', '2023-06-04 01:07:51', '2023-06-04 01:07:51'),
(2, 'michael', 'Michael Harry Setiawan', 'Cirebon', '2002-10-01', '0812345678', 'Allogio', '$2y$10$/62AsmZ21L6v2waHVszVi.zbsG8Q1umg4yD3IZtaN.fwe9VVfnFfy', '2023-06-04 07:40:21', '2023-06-04 07:40:21'),
(3, 'test', 'Test Coba', 'Tangerang', '2023-05-31', '12345', 'Tangerang', '$2y$10$4eXmeuQ9CD9l5E5IL5EB5Oeo4d4oTSPGjr1zIQuPtpnoz3uEWCHye', '2023-06-05 02:48:46', '2023-06-05 02:48:46'),
(4, 'gatau', 'Test Lagi', 'Tangerang', '2023-06-01', '12345678', 'Siliwangi', '$2y$10$u12YcXjKWcyooVs5Q4HPiuBuDOARm7BWwIcZVQ6ih2Sr.gv/rdJi2', '2023-06-05 02:50:36', '2023-06-05 02:50:36');

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
  `rating` int(11) NOT NULL,
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
  ADD KEY `review_iddokter_foreign` (`idDokter`),
  ADD KEY `review_idpasien_foreign` (`idPasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `idDokter` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `janji`
--
ALTER TABLE `janji`
  MODIFY `idJanji` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `idPasien` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `review_idpasien_foreign` FOREIGN KEY (`idPasien`) REFERENCES `janji` (`idPasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
