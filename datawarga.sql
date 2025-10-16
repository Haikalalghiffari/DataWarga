-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2025 at 08:13 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datawarga`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_15_031100_create_rws', 1),
(5, '2025_10_15_031110_create_rts', 1),
(6, '2025_10_15_031130_create_wargas', 1),
(7, '2025_10_15_043134_add_role_to_users_table', 1),
(8, '2025_10_15_043424_add_foto_to_wargas_table', 2),
(9, '2025_10_15_210258_add_foto_to_rt_and_rw_tables', 2),
(10, '2025_10_15_210307_add_foto_to_rw_table', 2),
(11, '2025_10_16_001606_add_detail_fields_to_rts_and_rws_table', 2),
(12, '2025_10_16_001614_add_detail_fields_to_rws_table', 2),
(13, '2025_10_16_011804_add_biodata_to_rws_and_rts_table', 2),
(14, '2025_10_16_012407_add_status_to_wargas_table', 3),
(15, '2025_10_16_021727_remove_rumah_id_add_alamat_to_wargas_table', 4),
(16, '2025_10_16_022948_add_rt_rw_to_wargas_table', 5),
(17, '2025_10_16_031104_add_biodata_fields_to_rws_table', 6),
(18, '2025_10_16_034613_add_tanggal_lahir_to_wargas_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rts`
--

CREATE TABLE `rts` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketua_rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rts`
--

INSERT INTO `rts` (`id`, `nama_rt`, `foto`, `ketua_rt`, `rw_id`, `created_at`, `updated_at`, `nik`, `jenis_kelamin`, `agama`, `pekerjaan`, `alamat`) VALUES
(1, 'RT 01', 'storage/rt/OR5OzheA01lNEBB65phSd8XZ2wZZ6xV23ksKNTSE.png', 'Bapak Fajar Prasetyo', 18, '2025-10-16 04:42:58', '2025-10-15 23:58:51', '3275011111110001', 'L', 'Islam', 'Guru', 'Jl. Melati No. 11'),
(2, 'RT 02', 'storage/rt/xoRIcRIxJArJigy19WTfKVnRdvaC9z22Cdoj50Gc.png', 'Ibu Laila Nur', 8, '2025-10-16 04:42:58', '2025-10-15 23:12:20', '3275012222220002', 'P', 'Islam', 'Perawat', 'Jl. Melati No. 12'),
(3, 'RT 03', 'storage/rt/JNthtITGEf4K3ldv3iXnAP9eKq3vtnR83SZjikdh.png', 'Bapak Dedi Santoso', 16, '2025-10-16 04:42:58', '2025-10-15 23:31:04', '3275013333330003', 'L', 'Kristen', 'Pegawai Negeri', 'Jl. Anggrek No. 4'),
(4, 'RT 04', 'storage/rt/s4ccbB0Bru3KppbwXBLEfFrU9SQETs3y9Dbwnqft.png', 'Ibu Wulan Putri', 18, '2025-10-16 04:42:58', '2025-10-15 23:58:51', '3275014444440004', 'P', 'Islam', 'Guru', 'Jl. Mawar No. 7'),
(5, 'RT 05', 'storage/rt/FpDt47L1YS0fNoFwizQba7OuGisFzHRfuev6QZso.png', 'Bapak Hendra Kurniawan', 17, '2025-10-16 04:42:58', '2025-10-15 23:32:32', '3275015555550005', 'L', 'Islam', 'Satpam', 'Jl. Kenanga No. 6'),
(9, 'RT 50', 'storage/rt/BxcyycrXlQqYytdTrDl5ISdxzK9y4mUyEgEhlQWm.png', 'alvin', 18, '2025-10-15 23:59:48', '2025-10-15 23:59:48', '6655441166545678', 'P', 'Kristen', 'guuru', 'Jl. Anggrek No. 4');

-- --------------------------------------------------------

--
-- Table structure for table `rws`
--

CREATE TABLE `rws` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_rw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketua_rw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt_tempat_tinggal_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rws`
--

INSERT INTO `rws` (`id`, `nama_rw`, `foto`, `ketua_rw`, `created_at`, `updated_at`, `nik`, `jenis_kelamin`, `agama`, `pekerjaan`, `alamat`, `rt_tempat_tinggal_id`) VALUES
(8, 'RW 03', 'storage/rw/nWrM2wR1E95v4da0qNOMx3SlCLiN7h4vIBJcAJQ1.png', 'Bapak Surya Adi', '2025-10-15 21:57:38', '2025-10-15 23:12:09', '3275010606060006323', 'L', 'Islam', 'Polisi', 'Jl Anggrek 13', 5),
(13, 'RW 78', 'storage/rw/j54OdTFwjAx4oBSYJzXiRXLws39l9zr33l4hyIpw.png', 'Pak Haikal AHHAH', '2025-10-15 22:15:13', '2025-10-15 22:15:13', '327501060606000612312', 'L', 'Islam', 'Pegawai Negeri', 'Jalan AAnjay', 5),
(14, 'RW 90', 'storage/rw/HC348ysjiv14VIR6ELwm9fHfHdkeFQv9b9IoRd8A.png', 'Ibu Kin', '2025-10-15 22:18:17', '2025-10-15 22:18:17', '32750102020200022313', 'L', 'Islam', 'guuru', 'Jl Anggrek 13', 3),
(15, 'RW 38', 'storage/rw/JAsz611yROXqNfSco6Vsu8QmlOAyS7OpjngDLMnU.png', 'Ibu Dashboard Aha', '2025-10-15 22:40:00', '2025-10-15 23:11:56', '327501060606000621312', 'L', 'Kristen', 'Perawat', 'jalan angklung', 5),
(16, 'RW 67', 'storage/rw/6ihujMMC26hIz0HSi33irnU2Vp6aJeNx1w5jIj65.png', 'Pak Pian', '2025-10-15 23:31:04', '2025-10-15 23:31:04', '327501020203554', 'L', 'Islam', 'Guru', 'Jl Anggrek 16', 8),
(17, 'RW 65', 'storage/rw/x3AwFv7AUBpEg1X9JpoWNflURlR8jbSeX65sKD7r.png', 'Pak Gibral', '2025-10-15 23:32:31', '2025-10-15 23:32:31', '32750102020896', 'L', 'Islam', 'Perawat', 'Jl Anggrek 13', 8),
(18, 'RW 99', 'storage/rw/hUlqAuhc1wcUKjzcPPNsvDdUPoxVbPzX95e1pUzf.png', 'Faiz', '2025-10-15 23:58:50', '2025-10-15 23:58:50', '1100229988765434', 'L', 'Islam', 'Perawat', 'Jalan AAnjay', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('oSKeopjbhtVRMSoqzxP7yJerZFH14VHpCD345DYX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoicTVtTGwxTGU3dkRSWFYwVURTY2RsclJrRzBVdlNtd0hwMnZhY053bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1760598457),
('txkja4IkFJuyX1TBWuqteppjltpOFryRsUDWBsla', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieUw1clhxeWFMWVh3VUxaWjg1MmlLcHVHZzdqNXp1bk1ydHRrcHIyZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93YXJnYT9zZWFyY2g9aGFpa2FsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo3OiJ1c2VyX2lkIjtpOjI7czo5OiJ1c2VyX25hbWUiO3M6NjoiSGFpa2FsIjtzOjk6InVzZXJfcm9sZSI7czo0OiJ1c2VyIjt9', 1760594174);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Test User', 'test@example.com', '2025-10-15 19:50:31', '$2y$12$JD5nesYcTpWpVD6ViTfH.u1dPeKNV331xo.PC7MwWTvREl7va2/l6', 'Wg6KB03nve', '2025-10-15 19:50:31', '2025-10-15 19:50:31', 'user'),
(2, 'Haikal', 'haikal@gmail.com', NULL, '123456', NULL, NULL, NULL, 'user'),
(12422, 'haikal', 'haikal2@gmail.com', '2025-10-15 02:55:05', '123456', '3', '2025-10-16 02:55:05', '2025-10-16 02:55:05', 'user'),
(12424, 'haikal', 'haikal3@gmail.com', '2025-10-15 02:55:05', '123456', '3', '2025-10-16 02:55:05', '2025-10-16 02:55:05', 'user'),
(12425, 'Haikal', 'haikal5@gmail.com', NULL, '123456', NULL, '2025-10-16 03:01:43', '2025-10-16 03:01:43', 'user'),
(12426, 'Gibral', 'gibral@gmail.com', NULL, '$2y$12$0LDWJYpxya.T1r4a9mmOS.KhhjNbVlhVj2cZqMgnK5VoE1onZa7T2', NULL, '2025-10-15 22:27:00', '2025-10-15 22:27:00', 'user'),
(12427, 'azzam', 'azzam@gmail.com', NULL, '$2y$12$jl21KinpOVgVnJXk/RYURuAPL/RZeoFjJ9t3aH1KGVM6dp7ty/slO', NULL, '2025-10-15 22:32:29', '2025-10-15 22:32:29', 'user'),
(12428, 'buzzer', 'buzzer@gmail.com', NULL, '123456', NULL, '2025-10-15 22:36:07', '2025-10-15 22:36:07', 'user'),
(12429, 'pian', 'pian@gmail.com', NULL, '123456', NULL, '2025-10-15 23:41:03', '2025-10-15 23:41:03', 'user'),
(12430, 'bambang', 'bambang@gmail.com', NULL, '123456', NULL, '2025-10-15 23:53:05', '2025-10-15 23:53:05', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wargas`
--

CREATE TABLE `wargas` (
  `id` bigint UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt_id` bigint UNSIGNED DEFAULT NULL,
  `rw_id` bigint UNSIGNED DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Warga',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wargas`
--

INSERT INTO `wargas` (`id`, `nik`, `nama`, `jenis_kelamin`, `agama`, `tanggal_lahir`, `pekerjaan`, `alamat`, `rt_id`, `rw_id`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(4, '3275010606060077', 'Haikal Alghiffari Sunggoro', 'P', 'Islam', '2025-10-16', 'Perawat', 'Jl. Melati No. 5', 4, 13, 'storage/warga/ftoSD0B7TdpbM8NbzhU1e55Zxam1rRptGbBlXtBU.png', 'Warga', '2025-10-16 03:03:24', '2025-10-15 23:08:20'),
(5, '32750102020200657', 'Farrel', 'P', 'Kristen', '4435-03-12', 'Perawat', 'jalan budaya', 3, 13, 'storage/warga/Hu9NSP67SyAAwwVwML8DpWJfLZPLUerJmdSlNWb0.png', 'Warga', '2025-10-16 03:03:24', '2025-10-15 22:21:04'),
(9, '32750106060600061231', 'Haikal sada', 'P', 'Kristen', '1212-12-12', 'Polisi', 'Jl Anggrek 16', 5, 13, 'storage/warga/rpsuN4a76OvdD4g82ZSI6jYfpoGBA4BHN8yipKN7.png', 'Warga', '2025-10-15 21:11:50', '2025-10-15 22:21:15'),
(23, '3275010606060006323', 'Bapak Surya Adi', 'L', 'Islam', '1980-10-16', 'Polisi', 'Jl Anggrek 13', 5, 8, 'storage/rw/nWrM2wR1E95v4da0qNOMx3SlCLiN7h4vIBJcAJQ1.png', 'Ketua RW', '2025-10-15 21:57:38', '2025-10-15 23:12:09'),
(26, '327501060606000612312', 'Pak Haikal AHHAH', 'L', 'Islam', '1980-10-16', 'Pegawai Negeri', 'Jalan AAnjay', 5, 13, 'storage/rw/j54OdTFwjAx4oBSYJzXiRXLws39l9zr33l4hyIpw.png', 'Ketua RW', '2025-10-15 22:15:13', '2025-10-15 22:15:13'),
(27, '3275010606060006312312', 'Bapak Fajar Prasetyo Haikal', 'L', 'Islam', '1985-10-16', 'Pegawai Negeri', 'jalan angklung', NULL, 13, 'storage/rt/KyG26kDvSnxpBjfJlnGyq8yomg96UouuS6lxim3m.png', 'Ketua RT', '2025-10-15 22:17:16', '2025-10-15 22:17:16'),
(28, '32750102020200022313', 'Ibu Kin', 'L', 'Islam', '1980-10-16', 'guuru', 'Jl Anggrek 13', 3, 14, 'storage/rw/HC348ysjiv14VIR6ELwm9fHfHdkeFQv9b9IoRd8A.png', 'Ketua RW', '2025-10-15 22:18:17', '2025-10-15 22:18:17'),
(30, '327501060606000621312', 'Ibu Dashboard Aha', 'L', 'Kristen', '1980-10-16', 'Perawat', 'jalan angklung', 5, 15, 'storage/rw/JAsz611yROXqNfSco6Vsu8QmlOAyS7OpjngDLMnU.png', 'Ketua RW', '2025-10-15 22:40:00', '2025-10-15 23:11:56'),
(32, '3275010606060006123167', 'Bapak GIBRALo', 'L', 'Islam', '1985-10-16', 'Guru', 'Jl Anggrek 16', NULL, 14, 'storage/rt/VR8texjkGScXtpK2kP5W30IfP3xIHtccwb5FNuvC.png', 'Ketua RT', '2025-10-15 22:41:00', '2025-10-15 22:42:04'),
(33, '327501020203554', 'Pak Pian', 'L', 'Islam', '1980-10-16', 'Guru', 'Jl Anggrek 16', NULL, 16, 'storage/rw/6ihujMMC26hIz0HSi33irnU2Vp6aJeNx1w5jIj65.png', 'Ketua RW', '2025-10-15 23:31:04', '2025-10-15 23:31:04'),
(34, '32750102020896', 'Pak Gibral', 'L', 'Islam', '1980-10-16', 'Perawat', 'Jl Anggrek 13', NULL, 17, 'storage/rw/x3AwFv7AUBpEg1X9JpoWNflURlR8jbSeX65sKD7r.png', 'Ketua RW', '2025-10-15 23:32:31', '2025-10-15 23:32:31'),
(35, '32750102020232423', 'Azzam', 'L', 'Hindu', '3122-03-22', 'Polisi', 'jalan angklung', 5, 17, 'storage/warga/Pv3FJGEBV1JeGERramHPdnLYPfZZr0vP5w3blvvi.png', 'Warga', '2025-10-15 23:36:55', '2025-10-15 23:36:55'),
(36, '32750102020257648', 'Reyhan', 'L', 'Islam', '2005-02-16', 'Fury', 'Jl Anime', 3, 14, 'storage/warga/hjgjQNXNRgFchQd2xkc9tbRDnzFTsHfnmmglemkr.jpg', 'Warga', '2025-10-15 23:55:37', '2025-10-15 23:55:37'),
(37, '1100229988765434', 'Faiz', 'L', 'Islam', '1980-10-16', 'Perawat', 'Jalan AAnjay', 2, 18, 'storage/rw/hUlqAuhc1wcUKjzcPPNsvDdUPoxVbPzX95e1pUzf.png', 'Ketua RW', '2025-10-15 23:58:51', '2025-10-15 23:58:51'),
(38, '6655441166545678', 'alvin', 'P', 'Kristen', '1985-10-16', 'guuru', 'Jl. Anggrek No. 4', 9, 18, 'storage/rt/BxcyycrXlQqYytdTrDl5ISdxzK9y4mUyEgEhlQWm.png', 'Ketua RT', '2025-10-15 23:59:48', '2025-10-15 23:59:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rts`
--
ALTER TABLE `rts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rts_rw_id_foreign` (`rw_id`);

--
-- Indexes for table `rws`
--
ALTER TABLE `rws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wargas`
--
ALTER TABLE `wargas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wargas_nik_unique` (`nik`),
  ADD KEY `wargas_rt_id_foreign` (`rt_id`),
  ADD KEY `wargas_rw_id_foreign` (`rw_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rts`
--
ALTER TABLE `rts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rws`
--
ALTER TABLE `rws`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12431;

--
-- AUTO_INCREMENT for table `wargas`
--
ALTER TABLE `wargas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rts`
--
ALTER TABLE `rts`
  ADD CONSTRAINT `rts_rw_id_foreign` FOREIGN KEY (`rw_id`) REFERENCES `rws` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wargas`
--
ALTER TABLE `wargas`
  ADD CONSTRAINT `wargas_rt_id_foreign` FOREIGN KEY (`rt_id`) REFERENCES `rts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `wargas_rw_id_foreign` FOREIGN KEY (`rw_id`) REFERENCES `rws` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
