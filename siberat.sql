-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 01:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siberat6`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(15,0) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `deskripsi`, `harga`, `stok`, `foto`, `created_at`, `updated_at`) VALUES
(20, 'Truk', 'Excavator Komatsu adalah alat berat yang sangat populer dan banyak digunakan di berbagai industri, seperti konstruksi, pertambangan, dan kehutanan. Komatsu Ltd., perusahaan asal Jepang yang memproduksi excavator ini, dikenal dengan teknologi canggih dan inovasi dalam desain dan performa alat berat.', 3000000000, 8, NULL, '2024-06-06 01:57:26', '2024-06-14 06:44:55'),
(21, 'Truk', 'Truk bagus', 2000000000, 9, NULL, '2024-06-06 02:30:08', '2024-06-27 08:17:31'),
(22, 'Barbel', 'abot', 2000, 145, NULL, '2024-06-06 04:48:37', '2024-06-14 06:44:55'),
(23, 'asd', 'asd', 12, 7, NULL, '2024-06-14 04:52:23', '2024-06-27 08:26:18'),
(24, 'huft', 'huft', 121212, 10, NULL, '2024-06-14 04:53:20', '2024-06-14 04:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `barang_fotos`
--

CREATE TABLE `barang_fotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `barang_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_fotos`
--

INSERT INTO `barang_fotos` (`id`, `created_at`, `updated_at`, `barang_id`, `path`) VALUES
(1, '2024-05-27 02:23:52', '2024-05-27 02:23:52', 8, 'public/foto-barang/xyOALHSeLuZGxI4VGpf2zp7WyWot5b9tv6COx8vE.jpg'),
(2, '2024-05-27 02:23:52', '2024-05-27 02:23:52', 8, 'public/foto-barang/FNGcxZ3QlFNTUPyUoUdflFZs0iB5QWu1DiCT4Zdr.png'),
(3, '2024-05-27 02:31:36', '2024-05-27 02:31:36', 9, 'public/foto-barang/m9W2EPXcqjG7WMEjo6ndhKAfdGwMY4ZOb8wikMzc.jpg'),
(4, '2024-05-27 02:31:36', '2024-05-27 02:31:36', 9, 'public/foto-barang/oQY6YeylR3yKnO0HKrUlxnQWYPTxHa7dbxoHnoRg.png'),
(5, '2024-05-27 02:40:16', '2024-05-27 02:40:16', 10, 'uploads/z2camagYyP6MzImiGLXW7U6ybDhhtDML6zmgMOmw.png'),
(6, '2024-05-27 02:40:16', '2024-05-27 02:40:16', 10, 'uploads/4YOybIQr41y1w3GFiz83T3Y9oagdFTdyM7Nsrf7k.png'),
(7, '2024-05-27 02:42:41', '2024-05-27 02:42:41', 11, 'uploads/53vnjNzUimadD0JSbLOdkxD9S0THOs76Bj7zvQAL.png'),
(8, '2024-05-27 02:42:41', '2024-05-27 02:42:41', 11, 'uploads/WwdzsccDPHrio58Zx93TAU9xdirzlikArG4kkiTs.png'),
(9, '2024-05-27 02:45:53', '2024-05-27 02:45:53', 12, 'public/uploads/XTYmTACqPPJ3kbSvkS355HjqEqyW2G86pIDjM4Jv.png'),
(10, '2024-05-27 02:45:53', '2024-05-27 02:45:53', 12, 'public/uploads/0LHfaeNKCDJKsFwNpeDBhtYMtpctRAsLblfJDS24.png'),
(11, '2024-05-27 02:54:27', '2024-05-27 02:54:27', 13, 'public/uploads/aoyI1IitVR2MYregnc30OXNViLjHXmXabaXAFMQ8.png'),
(12, '2024-05-27 02:58:59', '2024-05-27 02:58:59', 14, 'public/uploads/5sN4XkTBnVQ5Dhj25BxeOVxubcGWFJqHjUxNwH3t.png'),
(13, '2024-05-27 02:58:59', '2024-05-27 02:58:59', 14, 'public/uploads/IlaqoOKoDmZv0Ur3F6x5BGLntjGaDn7UDeE2ElXJ.png'),
(14, '2024-05-27 02:58:59', '2024-05-27 02:58:59', 14, 'public/uploads/dN07X2mmd9I4PrQY7eSyJPiO8JZQmecAltkg55Ho.png'),
(15, '2024-05-27 06:49:01', '2024-05-27 06:49:01', 15, 'uQl1P0SQqKQGyFnmqkZglabtjFPlMBddlOZLiHem.png'),
(16, '2024-05-27 06:49:01', '2024-05-27 06:49:01', 15, '1lgZiUAdCxmSqeFmhKdq4KNbnTIYecv6bzxEURL1.jpg'),
(17, '2024-05-27 06:49:01', '2024-05-27 06:49:01', 15, 'w77wIninyxLbceBh76op3ZiJOBJa7W6Hyl04L5G6.png'),
(20, '2024-06-03 11:23:04', '2024-06-03 11:23:04', 17, 'fFR5B7U3WlWi6rFt0s0e7TG1jite67fCckNkAQih.png'),
(21, '2024-06-03 11:23:04', '2024-06-03 11:23:04', 17, 'wDxjIoUyMk5gtoJ0zcKSLhSuVMugPyGdqlCBspy7.png'),
(26, '2024-06-06 01:57:26', '2024-06-06 01:57:26', 20, 'JyMqEjQxj2rQrWXFvgFomtkHjqy3g5zIBCRd18rT.png'),
(27, '2024-06-06 01:57:26', '2024-06-06 01:57:26', 20, 'AiKxQmW5m5Zgo8LV4sczzdrcGu9UL5gOkTFJFmGH.png'),
(28, '2024-06-06 02:30:08', '2024-06-06 02:30:08', 21, 'jVwJG80Y90xXhBbIwXLwHBul3xsd75uFPJ1uZEev.png'),
(29, '2024-06-06 02:30:08', '2024-06-06 02:30:08', 21, 'Wy27UOgIAER1L3zb5gsehn5BFSNNz57jfcoyxflI.png'),
(30, '2024-06-14 04:52:24', '2024-06-14 04:52:24', 23, 'HLvSNmjRdV7duiX6Zydd1E33PRYnoI6FkcrEk0JF.jpg'),
(31, '2024-06-14 04:52:24', '2024-06-14 04:52:24', 23, 'DZ2wuUDUVkWR5RjfmVBrQbmZCJuDXHwuJkU8UO21.png'),
(38, '2024-06-14 05:05:26', '2024-06-14 05:05:26', 24, 'umbOPquwI0dZplEetW3Mz8NQ8qbCOYNizPSqAVso.png');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penawaran`
--

CREATE TABLE `detail_penawaran` (
  `id` int(11) NOT NULL,
  `id_penawaran` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga_per_barang` decimal(50,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penawaran`
--

INSERT INTO `detail_penawaran` (`id`, `id_penawaran`, `id_barang`, `kuantitas`, `harga_per_barang`, `created_at`, `updated_at`) VALUES
(33, 40, 9, 3, 213213.00, NULL, NULL),
(34, 41, 17, 12, 10000.00, NULL, NULL),
(36, 42, 17, 4, 10000.00, NULL, NULL),
(37, 42, 17, 4, 10000.00, NULL, NULL),
(38, 42, 17, 4, 10000.00, NULL, NULL),
(39, 42, 17, 4, 10000.00, NULL, NULL),
(40, 42, 17, 4, 10000.00, NULL, NULL),
(42, 46, 20, 1, 3000000000.00, NULL, NULL),
(44, 47, 21, 1, 2000000000.00, NULL, NULL),
(48, 51, 22, 1, 2000.00, NULL, NULL),
(49, 52, 20, 2, 3000000000.00, NULL, NULL),
(50, 53, 20, 1, 3000000000.00, NULL, NULL),
(53, 54, 20, 2, 100000000000.00, '2024-06-14 03:42:45', '2024-06-14 04:47:08'),
(54, 54, 20, 2, 2000000000.00, '2024-06-14 03:42:45', '2024-06-14 04:47:08'),
(55, 51, 21, 5, 200000000000.00, '2024-06-14 04:12:04', '2024-06-14 04:46:42'),
(59, 57, 22, 5, 20000000000000.00, NULL, '2024-06-14 06:41:53'),
(63, 57, 20, 1, 3000000000.00, '2024-06-14 06:41:53', '2024-06-14 06:41:53'),
(64, 58, 21, 1, 2000000000.00, NULL, NULL),
(65, 59, 22, 4, 2000.00, NULL, '2024-06-27 07:11:15'),
(66, 60, 23, 5, 12.00, NULL, '2024-06-27 07:45:47'),
(67, 61, 21, 1, 2000000.00, NULL, '2024-06-27 07:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `detail_purchase_order`
--

CREATE TABLE `detail_purchase_order` (
  `id` int(11) NOT NULL,
  `id_purchase_order` int(11) DEFAULT NULL,
  `id_penawaran` int(11) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga_per_barang` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_purchase_order`
--

INSERT INTO `detail_purchase_order` (`id`, `id_purchase_order`, `id_penawaran`, `kuantitas`, `harga_per_barang`, `created_at`, `updated_at`, `id_barang`) VALUES
(1, 38, NULL, 1, 2000000000.00, '2024-06-27 06:55:40', '2024-06-27 06:55:40', 21),
(2, 40, 59, 1, 2000.00, '2024-06-27 06:57:38', '2024-06-27 06:57:38', 22),
(3, 41, 60, 1, 12.00, '2024-06-27 07:21:50', '2024-06-27 07:21:50', 23),
(4, 43, 61, 3, 1000.00, '2024-06-27 07:43:52', '2024-06-27 07:52:16', 21);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `perusahaan` varchar(20) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`perusahaan`, `pic`, `alamat`, `jenis_kelamin`, `jabatan`, `no_telp`, `created_at`, `updated_at`, `id`) VALUES
('PT A', 'Gilang', 'Ungaaran', 'Laki-laki', 'CEO', '085', '2024-06-06 06:53:12', '2024-06-06 06:53:12', 18),
('Pt. Anda', 'Anda', 'Krapyak', 'Perempuan', 'CEO', '082', '2024-06-06 06:54:50', '2024-06-06 06:54:50', 19);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `id_html` varchar(255) DEFAULT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `urutan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES
(1, 'Menu Manajemen', '#', '', NULL, '0', '1'),
(2, 'Dashboard', 'home', 'fas fa-home', NULL, '1', '1'),
(3, 'Manajemen Pengguna', '#', 'fas fa-users-cog', NULL, '1', '2'),
(4, 'Kelola Pengguna', 'manage-user', NULL, NULL, '3', '1'),
(5, 'Kelola Role', 'manage-role', NULL, NULL, '3', '2'),
(6, 'Kelola Menu', 'manage-menu', NULL, NULL, '3', '3'),
(7, 'Backup Server', '#', '', NULL, '0', '2'),
(8, 'Backup Database', 'dbbackup', 'fas fa-database', NULL, '7', '1'),
(9, 'Referensi', '#', 'fas fa-user-tag', NULL, '1', '3'),
(10, 'Barang', 'manage-barang', NULL, NULL, '9', '2'),
(11, 'Penawaran', 'manage-penawaran', NULL, NULL, '20', '3'),
(12, 'Purchase Order', 'manage-purchaseorder', NULL, NULL, '20', '4'),
(14, 'Selesai', '#', NULL, NULL, '9', '6'),
(15, 'Menu Manajemen', '#', '', NULL, '0', '1'),
(16, 'Dashboard', 'home', 'fas fa-home', NULL, '15', '1'),
(17, 'Manajemen Pengguna', '#', 'fas fa-users-cog', NULL, '15', '2'),
(18, 'Kelola Pengguna', 'manage-user', NULL, NULL, '17', '1'),
(19, 'Konsumen', 'manage-konsumen', NULL, NULL, '9', '1'),
(20, 'Transaksi', '#', 'fas fa-money-bill-wave', NULL, '1', '1'),
(21, 'Surat Jalan', 'suratjalan', NULL, NULL, '20', '1'),
(22, 'Menu Manajemen', '#', '', NULL, '0', '1'),
(23, 'Dashboard', 'home', 'fas fa-home', NULL, '22', '1'),
(24, 'Manajemen Pengguna', '#', 'fas fa-users-cog', NULL, '22', '2'),
(25, 'Kelola Pengguna', 'manage-user', NULL, NULL, '24', '1'),
(26, 'Menu Manajemen', '#', '', NULL, '0', '1'),
(27, 'Dashboard', 'home', 'fas fa-home', NULL, '26', '1'),
(28, 'Manajemen Pengguna', '#', 'fas fa-users-cog', NULL, '26', '2'),
(29, 'Kelola Pengguna', 'manage-user', NULL, NULL, '28', '1'),
(30, 'Menu Manajemen', '#', '', NULL, '0', '1'),
(31, 'Dashboard', 'home', 'fas fa-home', NULL, '30', '1'),
(32, 'Manajemen Pengguna', '#', 'fas fa-users-cog', NULL, '30', '2'),
(33, 'Kelola Pengguna', 'manage-user', NULL, NULL, '32', '1');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_01_234158_create_menus_table', 1),
(6, '2024_02_02_053619_create_permission_tables', 1),
(7, '2024_02_03_232722_create_role_has_menus_tables', 1),
(8, '2024_02_03_235312_add_menu_id_on_permission', 1),
(9, '2024_04_17_104341_menu', 2),
(10, '2024_04_24_162837_bisa', 3),
(11, '2024_04_25_074649_konsumen', 4),
(12, '2024_05_15_234819_add_timestamps_to_barang_table', 5),
(13, '2024_05_16_001339_add_updated_at_to_konsumen_table', 6),
(14, '2024_05_16_080017_add_timestamps_to_penawaran_table', 7),
(15, '2024_05_16_084921_add_columns_to_purchase_order_table', 8),
(16, '2024_05_16_085143_add_timestamps_to_purchase_order_table', 9),
(17, '2024_05_27_090517_create_barang_fotos_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_purchase_order` int(11) DEFAULT NULL,
  `nomor` varchar(20) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `jenis_pembayaran` enum('qris','bank_transfer') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id` int(11) NOT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nomor` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `total_harga` decimal(50,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id`, `id_konsumen`, `tanggal`, `nomor`, `status`, `total_harga`, `created_at`, `updated_at`) VALUES
(46, 5, '2024-06-06', '20240606P02', 'Sukses', 3000000000.00, NULL, '2024-06-06 02:05:32'),
(47, 5, '2024-06-06', '20240606P03', 'Sukses', 5000000000.00, NULL, '2024-06-06 02:49:48'),
(48, 19, '2024-06-06', '20240606P04', 'Sukses', 2000800000.00, NULL, '2024-06-14 04:31:50'),
(51, 19, '2024-06-14', 'PE - D0B7B70', 'Sukses', 1000000200000.00, NULL, '2024-06-14 04:12:51'),
(52, 18, '2024-06-14', 'PE - F0799FA', 'Sukses', 6000000000.00, NULL, '2024-06-14 02:32:20'),
(53, 18, '2024-06-14', 'PE - 550DB2F', 'Sukses', 3000000000.00, NULL, '2024-06-14 02:53:20'),
(54, 18, '2024-06-15', 'PE - 4A58520', 'Pending', 6000000000.00, NULL, '2024-06-14 03:42:45'),
(55, 18, '2024-06-13', 'PE - 5A17494', 'Sukses', 10000000000000.00, NULL, '2024-06-27 07:43:21'),
(56, 18, '2024-06-22', 'PE - B808E34', 'Sukses', 61000000000000.00, NULL, '2024-06-27 06:56:54'),
(57, 19, '2024-06-15', 'PE - 8F16941', 'Sukses', 100003000000000.00, NULL, '2024-06-14 06:44:37'),
(58, 19, '2024-06-27', 'PE - 5184603', 'Sukses', 2000000000.00, NULL, '2024-06-27 06:53:27'),
(59, 18, '2024-06-27', 'PE - 5E3A9D6', 'Sukses', 2000.00, NULL, '2024-06-27 06:57:38'),
(60, 18, '2024-06-27', 'PE - 21B637B', 'Sukses', 12.00, NULL, '2024-06-27 07:21:50'),
(61, 19, '2024-06-27', 'PE - 776246A', 'Sukses', 2000000000.00, NULL, '2024-06-27 07:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES
(1, 'create_user', 'web', '2024-04-17 03:27:28', '2024-04-17 03:27:28', 4),
(2, 'read_user', 'web', '2024-04-17 03:27:28', '2024-04-17 03:27:28', 4),
(3, 'update_user', 'web', '2024-04-17 03:27:28', '2024-04-17 03:27:28', 4),
(4, 'delete_user', 'web', '2024-04-17 03:27:28', '2024-04-17 03:27:28', 4),
(5, 'create_role', 'web', '2024-04-17 03:27:28', '2024-04-17 03:27:28', 5),
(6, 'read_role', 'web', '2024-04-17 03:27:28', '2024-04-17 03:27:28', 5),
(7, 'update_role', 'web', '2024-04-17 03:27:28', '2024-04-17 03:27:28', 5),
(8, 'delete_role', 'web', '2024-04-17 03:27:28', '2024-04-17 03:27:28', 5),
(9, 'create_menu', 'web', '2024-04-17 03:27:28', '2024-04-17 03:27:28', 6),
(10, 'read_menu', 'web', '2024-04-17 03:27:28', '2024-04-17 03:27:28', 6),
(11, 'update_menu', 'web', '2024-04-17 03:27:28', '2024-04-17 03:27:28', 6),
(12, 'delete_menu', 'web', '2024-04-17 03:27:28', '2024-04-17 03:27:28', 6),
(13, 'backup_database', 'web', '2024-04-17 03:27:28', '2024-04-17 03:27:28', 8);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `id_penawaran` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nomor` varchar(20) DEFAULT NULL,
  `total_harga` bigint(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `id_penawaran`, `tanggal`, `nomor`, `total_harga`, `status`, `jenis`, `created_at`, `updated_at`) VALUES
(28, 46, '2024-06-06', '20240606P02', 3000000000, 'Sukses', 'QRIS', '2024-06-06 02:05:32', '2024-06-06 02:05:47'),
(29, 47, '2024-06-06', '20240606P03', 2000000000, 'Sukses', 'Bank Transfer', '2024-06-06 02:49:48', '2024-06-06 02:53:17'),
(30, 48, '2024-06-06', '20240606P04', 8000, 'Sukses', 'QRIS', '2024-06-06 06:05:29', '2024-06-06 06:05:55'),
(31, 51, '2024-06-14', 'PO - A861A10', 2000, 'Pending', 'QRIS', '2024-06-14 02:13:39', '2024-06-14 02:18:07'),
(33, 53, '2024-06-14', 'PO - FD1924B', 3000000000, 'Sukses', 'Bank Transfer', '2024-06-14 02:53:20', '2024-06-14 03:16:09'),
(34, 57, '2024-06-15', 'PO - 04BBB4A', 100003000000000, 'Sukses', 'Bank Transfer', '2024-06-14 06:44:37', '2024-06-14 06:44:55'),
(35, 58, '2024-06-27', 'PO - 3908257', 2000000000, 'Pending', '', '2024-06-27 06:53:27', '2024-06-27 06:53:27'),
(36, 58, '2024-06-27', 'PO - 3908257', 2000000000, 'Pending', '', '2024-06-27 06:53:53', '2024-06-27 06:53:53'),
(37, 58, '2024-06-27', 'PO - 8E59684', 2000000000, 'Pending', '', '2024-06-27 06:55:21', '2024-06-27 06:55:21'),
(38, 58, '2024-06-27', 'PO - 8E59684', 2000000000, 'Pending', '', '2024-06-27 06:55:40', '2024-06-27 06:55:40'),
(39, 56, '2024-06-22', 'PO - 38DBE28', 0, 'Pending', '', '2024-06-27 06:56:54', '2024-06-27 06:56:54'),
(40, 59, '2024-06-27', 'PO - 32DF474', 8000, 'Pending', 'Bank Transfer', '2024-06-27 06:57:38', '2024-06-27 07:11:15'),
(41, 60, '2024-06-27', 'PO - 574C6C8', 60, 'Sukses', 'QRIS', '2024-06-27 07:21:50', '2024-06-27 08:26:18'),
(42, 55, '2024-06-13', 'PO - 7B9CBA0', 0, 'Pending', '', '2024-06-27 07:43:21', '2024-06-27 07:43:21'),
(43, 61, '2024-06-27', 'PO - 7B9CBA0', 3000, 'Sukses', 'Bank Transfer', '2024-06-27 07:43:52', '2024-06-27 08:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2024-04-17 03:27:29', '2024-04-17 03:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_menus`
--

CREATE TABLE `role_has_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_has_menus`
--

INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(15, 19, 1),
(16, 10, 1),
(18, 20, 1),
(19, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id` int(11) NOT NULL,
  `id_purchase_order` int(11) DEFAULT NULL,
  `nomor` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `alamat_tujuan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nomor_po` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_jalan`
--

INSERT INTO `surat_jalan` (`id`, `id_purchase_order`, `nomor`, `tanggal`, `alamat_tujuan`, `created_at`, `updated_at`, `nomor_po`) VALUES
(50, 28, 'SJ001 - 06062024', '2024-06-06', 'uy', '2024-06-06 02:19:50', '2024-06-06 02:19:53', '20240606P02'),
(51, 28, 'SJ002 - 06062024', '2024-06-06', NULL, '2024-06-06 02:20:22', '2024-06-06 02:20:22', '20240606P02'),
(52, 29, 'SJ003 - 06062024', '2024-06-06', 'Semarang', '2024-06-06 02:53:17', '2024-06-06 02:53:26', '20240606P03'),
(53, 30, 'SJ004 - 06062024', '2024-06-06', NULL, '2024-06-06 06:05:55', '2024-06-06 06:05:55', '20240606P04'),
(54, 30, 'SJ005 - 06062024', '2024-06-06', NULL, '2024-06-06 06:58:33', '2024-06-06 06:58:33', '20240606P04'),
(55, 31, 'SJ - 2F658EF', '2024-06-14', 'Jl. Singosari Panotoyudo, Kauman, Kec. Brebes, Kabupaten Brebes, Jawa Tengah 52212', '2024-06-14 02:18:07', '2024-06-14 02:18:50', 'PO - A861A10'),
(56, 32, 'SJ - 0D726D8', '2024-06-14', NULL, '2024-06-14 02:32:49', '2024-06-14 02:32:49', 'PO - 0D726D8'),
(57, 32, 'SJ - 18E2BD8', '2024-06-14', NULL, '2024-06-14 02:35:23', '2024-06-14 02:35:23', 'PO - 0D726D8'),
(58, 32, 'SJ - 18E2BD8', '2024-06-14', NULL, '2024-06-14 02:35:43', '2024-06-14 02:35:43', 'PO - 0D726D8'),
(59, 31, 'SJ - 9748216', '2024-06-14', NULL, '2024-06-14 02:36:34', '2024-06-14 02:36:34', 'PO - A861A10'),
(60, 31, 'SJ - FA147D8', '2024-06-14', NULL, '2024-06-14 02:42:18', '2024-06-14 02:42:18', 'PO - A861A10'),
(61, 31, 'SJ - FA147D8', '2024-06-14', NULL, '2024-06-14 02:42:32', '2024-06-14 02:42:32', 'PO - A861A10'),
(62, 31, 'SJ - 0F2D8F2', '2024-06-14', NULL, '2024-06-14 02:44:20', '2024-06-14 02:44:20', 'PO - A861A10'),
(63, 31, 'SJ - 6D72BEB', '2024-06-14', NULL, '2024-06-14 02:50:58', '2024-06-14 02:50:58', 'PO - A861A10'),
(64, 33, 'SJ - FD1924B', '2024-06-14', NULL, '2024-06-14 02:53:25', '2024-06-14 02:53:25', 'PO - FD1924B'),
(65, 33, 'SJ - FD42391', '2024-06-14', NULL, '2024-06-14 02:55:37', '2024-06-14 02:55:37', 'PO - FD1924B'),
(66, 33, 'SJ - FD42391', '2024-06-14', NULL, '2024-06-14 02:55:39', '2024-06-14 02:55:39', 'PO - FD1924B'),
(67, 33, 'SJ - F77622A', '2024-06-14', NULL, '2024-06-14 02:56:09', '2024-06-14 02:56:09', 'PO - FD1924B'),
(68, 31, 'SJ - F77622A', '2024-06-14', NULL, '2024-06-14 02:56:15', '2024-06-14 02:56:15', 'PO - A861A10'),
(75, 33, 'SJ - AA8E86B8B0D691D40683DAD58ACBA386', '2024-06-14', NULL, '2024-06-14 03:16:09', '2024-06-14 03:16:09', 'PO - FD1924B'),
(76, 34, 'SJ - 04BBB4A1E519287B1F082505845AF00D', '2024-06-14', NULL, '2024-06-14 06:44:55', '2024-06-14 06:44:55', 'PO - 04BBB4A'),
(77, 43, 'SJ - A6E1639B331345C1EA9135223482C10F', '2024-06-27', 'Semarang\r\nJalan Tlogo Berlian No.7, Palebon, Pedurungan, Semarang', '2024-06-27 08:17:31', '2024-06-27 08:24:45', 'PO - 7B9CBA0'),
(78, 41, 'SJ - AB83AE2', '2024-06-27', NULL, '2024-06-27 08:26:18', '2024-06-27 08:26:18', 'PO - 574C6C8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '2024-04-17 03:27:29', '$2y$10$lsz9mQGtsprpqvMFlAABBO9HBCY0QRx2DFD/c1TSQwZp7sMkaNXCi', 'BO03GPQxpIIlZTvRnzot2RQ3bQQqoaL9kk44mnjkL8vafrzJlrxf7NVwzLYZ', '2024-04-17 03:27:29', '2024-04-17 03:27:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `barang_fotos`
--
ALTER TABLE `barang_fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barang_id` (`barang_id`);

--
-- Indexes for table `detail_penawaran`
--
ALTER TABLE `detail_penawaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penawaran` (`id_penawaran`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `detail_purchase_order`
--
ALTER TABLE `detail_purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_purchase_order` (`id_purchase_order`),
  ADD KEY `detail_purchase_order_ibfk_2` (`id_penawaran`),
  ADD KEY `fk_id_barang` (`id_barang`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_purchase_order` (`id_purchase_order`);

--
-- Indexes for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_konsumen` (`id_konsumen`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penawaran` (`id_penawaran`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_menus`
--
ALTER TABLE `role_has_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_has_menus_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_purchase_order` (`id_purchase_order`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `barang_fotos`
--
ALTER TABLE `barang_fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `detail_penawaran`
--
ALTER TABLE `detail_penawaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `detail_purchase_order`
--
ALTER TABLE `detail_purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_has_menus`
--
ALTER TABLE `role_has_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_purchase_order`
--
ALTER TABLE `detail_purchase_order`
  ADD CONSTRAINT `fk_id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
