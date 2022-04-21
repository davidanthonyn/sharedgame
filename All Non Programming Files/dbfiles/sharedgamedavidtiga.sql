-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2022 at 08:44 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharedgame`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `nama_brand` varchar(100) NOT NULL,
  `gambar_brand` varchar(100) NOT NULL,
  `status_brand` enum('aktif','tidak_aktif','','') NOT NULL,
  `datetime_brand_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`, `gambar_brand`, `status_brand`, `datetime_brand_added`) VALUES
(2, 'logitech', '', 'aktif', '0000-00-00 00:00:00'),
(5, 'Oculus Quest 2', '', 'aktif', '0000-00-00 00:00:00'),
(6, 'Rockstar', '', 'aktif', '0000-00-00 00:00:00'),
(7, 'Konami', '', 'aktif', '0000-00-00 00:00:00'),
(8, 'Apple', 'empty', 'aktif', '2022-02-24 15:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customerservice`
--

CREATE TABLE `customerservice` (
  `id_cs` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email_cs` varchar(100) NOT NULL,
  `number_cs` varchar(100) NOT NULL,
  `pesan_cs` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('pending','processed','done','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerservice`
--

INSERT INTO `customerservice` (`id_cs`, `nama_lengkap`, `email_cs`, `number_cs`, `pesan_cs`, `created_at`, `status`) VALUES
(1, 'Mangga Dua, Jakarta', 'cs@sharedgame.tech', '021 123456', 'Contact Info SharedGame', '2022-03-03 10:19:56', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `detailbooking`
--

CREATE TABLE `detailbooking` (
  `id_detail_booking` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty_produk` int(11) NOT NULL,
  `tgl_jam_awal_sewa` datetime NOT NULL,
  `tgl_jam_akhir_sewa` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detailcart`
--

CREATE TABLE `detailcart` (
  `id_detail_cart` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty_produk` int(11) NOT NULL,
  `total_harga_produk` int(11) NOT NULL,
  `plan_sewa_awal` datetime NOT NULL,
  `plan_sewa_akhir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loginhistory`
--

CREATE TABLE `loginhistory` (
  `id_login_history` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `time_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginhistory`
--

INSERT INTO `loginhistory` (`id_login_history`, `email`, `time_login`) VALUES
(1, 'm@gmail.com', '2022-02-20 01:47:15'),
(2, 'm@gmail.com', '2022-02-20 02:00:56'),
(3, 'm@gmail.com', '2022-02-20 13:38:11'),
(4, 'm@gmail.com', '2022-02-24 01:03:11'),
(5, 'm@gmail.com', '2022-02-24 01:05:33'),
(6, 'm@gmail.com', '2022-02-24 01:05:52'),
(7, 'halohalo@gmail.com', '2022-02-24 01:22:53'),
(8, 'halohalo@gmail.com', '2022-02-24 01:23:29'),
(9, 'halohalo@gmail.com', '2022-02-24 01:23:41'),
(10, 'halohalo@gmail.com', '2022-02-24 01:23:57'),
(11, 'halohalo@gmail.com', '2022-02-24 01:24:11'),
(12, 'halohalo@gmail.com', '2022-02-24 01:26:20'),
(13, 'davidasli@gmail.com', '2022-02-24 01:27:15'),
(14, 'davidasli@gmail.com', '2022-02-24 01:28:11'),
(15, 'halohalo@gmail.com', '2022-02-24 01:28:25'),
(16, 'halohalo@gmail.com', '2022-02-24 01:28:44'),
(17, 'davidasli@gmail.com', '2022-02-24 01:32:34'),
(18, 'davidasli@gmail.com', '2022-02-24 01:35:20'),
(19, 'davidasli@gmail.com', '2022-02-24 01:37:55'),
(20, 'davidasli@gmail.com', '2022-02-24 01:43:56'),
(21, 'davidasli@gmail.com', '2022-02-24 01:44:34'),
(22, 'davidasli@gmail.com', '2022-02-24 01:49:25'),
(23, 'davidasli@gmail.com', '2022-02-24 01:53:16'),
(24, 'tara@gmail.com', '2022-02-24 01:53:38'),
(25, 'davidasli@gmail.com', '2022-02-24 01:55:09'),
(26, 'davidasli@gmail.com', '2022-02-24 01:55:58'),
(27, 'davidasli@gmail.com', '2022-02-24 01:56:58'),
(28, 'davidasli@gmail.com', '2022-02-24 01:59:10'),
(29, 'davidasli@gmail.com', '2022-02-24 02:04:31'),
(30, 'davidasli@gmail.com', '2022-02-24 02:05:32'),
(31, 'davidasli@gmail.com', '2022-02-24 02:07:09'),
(32, 'davidasli@gmail.com', '2022-02-24 15:20:16'),
(33, 'kontolbinatang@protonmail.com', '2022-02-28 19:21:58'),
(34, 'kontolbinatang@protonmail.com', '2022-02-28 19:55:24'),
(35, 'kontolbinatang@protonmail.com', '2022-02-28 21:46:44'),
(36, 'kontolbinatang@protonmail.com', '2022-02-28 21:51:54'),
(37, 'kontolbinatang@protonmail.com', '2022-02-28 21:52:39'),
(38, 'kontolbinatang@protonmail.com', '2022-02-28 21:56:36'),
(39, 'kontolbinatang@protonmail.com', '2022-02-28 22:01:16'),
(40, 'kontolbinatang@protonmail.com', '2022-02-28 22:05:25'),
(41, 'kontolbinatang@protonmail.com', '2022-02-28 22:11:44'),
(42, 'kontolbinatang@protonmail.com', '2022-03-01 00:11:26'),
(43, 'davidasli@gmail.com', '2022-03-01 00:17:38'),
(44, 'kontolbinatang@protonmail.com', '2022-03-01 00:30:38'),
(45, 'kontolbinatang@protonmail.com', '2022-03-01 00:32:40'),
(46, 'davidasli@gmail.com', '2022-03-01 00:33:03'),
(47, 'kontolbinatang@protonmail.com', '2022-03-01 20:59:41'),
(48, 'danthonynathanael@gmail.com', '2022-03-01 21:14:38'),
(49, 'davidasli@gmail.com', '2022-03-01 21:15:05'),
(50, 'davidasli@gmail.com', '2022-03-08 23:05:38'),
(51, 'davidasli@gmail.com', '2022-03-08 23:08:41'),
(52, 'davidasli@gmail.com', '2022-03-09 12:13:39'),
(53, 'david@gmail.com', '2022-03-09 14:38:26'),
(54, 'david@gmail.com', '2022-03-09 14:39:00'),
(55, 'david@gmail.com', '2022-03-09 14:45:14'),
(56, 'davidasli@gmail.com', '2022-03-09 14:54:23'),
(57, 'david@gmail.com', '2022-03-09 14:54:31'),
(58, 'davidasli@gmail.com', '2022-03-09 14:59:45'),
(59, 'davidasli@gmail.com', '2022-03-09 15:16:29'),
(60, 'david@gmail.com', '2022-03-09 15:16:39'),
(61, 'davidasli@gmail.com', '2022-03-09 15:17:39'),
(62, 'davidasli@gmail.com', '2022-03-09 17:45:10'),
(63, 'davidasli@gmail.com', '2022-03-09 18:22:06'),
(64, 'davidasli@gmail.com', '2022-03-09 20:57:16'),
(65, 'halohalo@gmail.com', '2022-03-09 20:59:41'),
(66, 'tara@gmail.com', '2022-03-09 21:00:10'),
(67, 'tara@gmail.com', '2022-03-09 21:04:19'),
(68, 'davidasli@gmail.com', '2022-03-09 21:07:51'),
(69, 'davidasli@gmail.com', '2022-03-09 21:10:15'),
(70, 'davidasli@gmail.com', '2022-03-09 22:25:28'),
(71, 'david@gmail.com', '2022-03-09 22:26:01'),
(72, 'davidasli@gmail.com', '2022-03-09 22:28:50'),
(73, 'tara@gmail.com', '2022-03-09 22:32:07'),
(74, 'davidasli@gmail.com', '2022-03-10 00:36:45'),
(75, 'davidasli@gmail.com', '2022-03-10 12:59:26'),
(76, 'davidasli@gmail.com', '2022-03-10 14:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `nomorhphistory`
--

CREATE TABLE `nomorhphistory` (
  `id_nomor_hp` int(11) NOT NULL,
  `nomor_hp` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori_produk` enum('console','game_physics','game_gear','') NOT NULL,
  `warna_produk` varchar(100) NOT NULL,
  `gambar_produk` varchar(256) NOT NULL,
  `deskripsi_produk` varchar(100) NOT NULL,
  `serial_produk` varchar(100) NOT NULL,
  `jumlah_tersedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_brand`, `nama_produk`, `kategori_produk`, `warna_produk`, `gambar_produk`, `deskripsi_produk`, `serial_produk`, `jumlah_tersedia`) VALUES
(1, 1, 'playstation 5', 'console', 'putih', 'https://asset.kompas.com/crops/OShkHBI40cCFj6mMFFcYmhbhBaw=/187x12:1126x638/750x500/data/photo/2020/', 'playstation 5 terbaru', '123', 1),
(3, 1, 'playstation 4', 'console', 'hitam', 'https://cdn1-production-images-kly.akamaized.net/Tib_XTBmEyghebeVYZPvqM0HDCY=/640x360/smart/filters:', '', '1234', 1),
(5, 2, 'logitech g29', 'game_gear', 'hitam', 'https://s2.bukalapak.com/uploads/content_attachment/2e5be96d20e8d762b88169c5/w-740/Setir.jpg', 'steering wheel terbaru', '123', 2),
(6, 5, 'Oculus Quest 2', 'game_gear', 'hitam', 'https://i.ebayimg.com/images/g/j2YAAOSw-IheQHZh/s-l600.jpg', '', '123', 2),
(7, 6, 'Kaset PlayStation 4 \"Grand Theft Auto V\"', 'game_physics', 'coklat', 'https://cf.shopee.co.id/file/70667261780ce5784cf3e2dd82551075', '', '123', 4),
(8, 7, 'Kaset PlayStation 4 \"Pro Evolution Soccer 2021\"', 'game_physics', 'putih', 'https://images.tokopedia.net/img/cache/500-square/product-1/2020/9/14/2860018/2860018_e1c7f385-85da-', '', '123', 4),
(9, 1, 'Kaset PlayStation 4 \"Horizon Forbidden West\"', 'game_physics', 'biru', 'https://images.tokopedia.net/img/cache/700/VqbcmM/2021/11/26/8e4051a9-826b-424f-9d7c-e720eb6e2196.jp', '', '123', 4);

-- --------------------------------------------------------

--
-- Table structure for table `rekeningtoko`
--

CREATE TABLE `rekeningtoko` (
  `id_rekening_toko` int(11) NOT NULL,
  `no_rekening_toko` varchar(100) NOT NULL,
  `bank_rekening_toko` varchar(100) NOT NULL,
  `status_rekening_toko` enum('aktif','tidak_aktif','','') NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekeningtoko`
--

INSERT INTO `rekeningtoko` (`id_rekening_toko`, `no_rekening_toko`, `bank_rekening_toko`, `status_rekening_toko`, `updated_at`) VALUES
(1, '12345678', 'BCA', 'aktif', '2022-02-23 12:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `tarifsewa`
--

CREATE TABLE `tarifsewa` (
  `id_tarif_sewa` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tarif_harga` int(11) NOT NULL,
  `lama_sewa_hari` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_buat_transaksi` datetime NOT NULL,
  `waktu_pembayaran` datetime NOT NULL,
  `kode_unik_pembayaran` int(11) NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `status_pembayaran` enum('pending','diverifikasi','ditolak','diterima','dibatalkan') NOT NULL,
  `no_rekening_user` int(11) NOT NULL,
  `bank_asal_user` varchar(100) NOT NULL,
  `id_rekening_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `no_hp_dua` varchar(12) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto_ktp` varchar(100) NOT NULL,
  `foto_selfie_ktp` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL,
  `status_ktp` enum('belum','sedang_verifikasi','diterima','ditolak') NOT NULL,
  `is_active` enum('yes','off_by_admin','off_by_user','not_yet_activated') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `password`, `alamat_lengkap`, `no_hp`, `no_hp_dua`, `tgl_lahir`, `foto_ktp`, `foto_selfie_ktp`, `id_role`, `status_ktp`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'Tara', 'tara@gmail.com', '$2y$10$RuDOdeShVAHMgDP366lDSeZOg2llIGmk7jRzgVo1N55YK7F0SnYTS', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-19 12:47:07', '2022-02-19 12:47:07'),
(5, 'gema', 'gema@gmail.com', '$2y$10$1l0vlb8TaO4eb2MCpQcJNOT3uVGrzdpOloUcoqgkn7sqXrDwZVdtu', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '1970-01-01 07:00:01', '1970-01-01 07:00:01'),
(6, 'chris', 'chris@gmail.com', '$2y$10$7wvKBZBIF0NAYB7Du1.rouhydFxXuHosV4MqEsdLZzg.MXEa2BZVi', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '1970-01-01 07:00:01', '1970-01-01 07:00:01'),
(7, 'alip', 'alip@gmail.com', '$2y$10$aWOGY7TSfzk0NPBQ8LW9H.EWo1zGD0ljlVwhzzxseVKy6F0br1h3W', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-19 18:55:47', '2022-02-19 18:55:47'),
(8, 'fall guys', 'fallguys@gmail.com', '$2y$10$4Fhnd7Rave0b7ONsz4eN8OoLlQniL1p20MyZck0mlTr.QsDD7L7Yy', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-20 01:00:45', '2022-02-20 01:00:45'),
(9, 'm', 'm@gmail.com', '$2y$10$kwEoHV3fg8axbdk.Gvxhze1.3f6IvYd8nMKDuNVMSCi71Lcmv.s32', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-20 01:07:29', '2022-02-20 01:07:29'),
(10, 'trevor', 'trevor@gmail.com', '$2y$10$dhGTJlR02RrNVAvHU2ZG2ed8X9PXSw7f0sRGKnjP8L6me7IJxmyzO', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-20 13:53:06', '2022-02-20 13:53:06'),
(11, 'Michael', 'michael@gmail.com', '$2y$10$rDuO73rBFn/QZQcUdZ3ZA.Cv.Dog/ntcr.CxwemhmjwjxTmg5ejz2', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-20 15:36:55', '2022-02-20 15:36:55'),
(12, 'halohalo', 'halohalo@gmail.com', '$2y$10$.ytOi6jTnVhGXqBzBjMl1er9LqYvaGmN65m6mU.x6OPjAuZGFygl.', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 1, 'belum', 'yes', '2022-02-20 15:49:28', '2022-02-21 15:49:28'),
(13, 'Ebenheizer', 'ebenheizer@gmail.com', '$2y$10$CWkNI8EZxGx8dnsXzWkM8.xm4pEJc8QACvBNCpfAzIzRdj8enoX22', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-22 21:24:16', '2022-02-22 21:24:16'),
(14, 'Pika', 'pikachu@gmail.com', '$2y$10$T4.FYKornBXpRMMeB8RXmOTEw3smNLUM7IcYf0igcOlXTOmixFYl6', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-24 00:44:28', '2022-02-24 00:44:28'),
(15, 'yoyo', 'yoyo@gmail.com', '$2y$10$dJSBqDXYozRNtqR6YiFomefvWK4SIUWEuhYtBh4X47V/tZ5/85eGS', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-24 00:45:49', '2022-02-24 00:45:49'),
(16, 'lala@gmail.com', 'lala@gmail.com', '$2y$10$Gmsa0hH7YY49y/C5GGh3WuqwVZ0TbJbRZ3wF5k79gXzRAuH76g.ey', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-24 00:46:19', '2022-02-24 00:46:19'),
(17, 'lol', 'lol@gmail.com', '$2y$10$H6DE/IHZjxAOKPl3xvB3heCPZBhZUC2RwyVJuINX6UcNlyr6zlSiK', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-24 00:49:46', '2022-02-24 00:49:46'),
(18, 'dudul', 'dudul@gmail.com', '$2y$10$ol5aC7nvTFDKTqTReQ9NBON6OKrFf1UBZTGzmiyFKaD6foKTAuIrW', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-24 00:52:13', '2022-02-24 00:52:13'),
(19, 'dudung', 'dudung3@gmail.com', '$2y$10$gLwzWxuAcCw7Z7vlK9R5YugI9XxB.wqRANfX6J.oyagXCyPoqhmtS', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-24 00:54:23', '2022-02-24 00:54:23'),
(20, 'monster', 'monster@gmail.com', '$2y$10$UzYn0PvlAw8BYmUqUNU/MumsvuboqR1gnZzWKmfQyOPopfS7xjeve', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-24 00:55:40', '2022-02-24 00:55:40'),
(21, 'tommy', 'tommy@gmail.com', '$2y$10$nPcbNwmuD7I2LnU6hqyq3uWDInDMcCWby5HzFC7TlhqScTJ9tkQ4i', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 3, 'belum', 'yes', '2022-02-24 00:57:15', '2022-02-24 00:57:15'),
(22, 'david', 'davidasli@gmail.com', '$2y$10$HzLd0JG.x.nv.qgcCn4ebefVTEMz3NiDZOHNi1Gjr5xwCxpU8Gb8y', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 1, 'belum', 'yes', '2022-02-24 01:26:53', '2022-02-24 01:26:53'),
(23, 'David', 'david@gmail.com', '$2y$10$7DyWSaJTCynm6mgb.ZtNnOmqXjzym6jR7KFCU3uR8.WW3XSwDyHq2', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 2, 'belum', 'yes', '2022-02-24 15:17:09', '2022-02-24 15:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `usertoken`
--

CREATE TABLE `usertoken` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `time_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertoken`
--

INSERT INTO `usertoken` (`id_token`, `email`, `token`, `time_created`) VALUES
(22, 'danthonynathanael@gmail.com', 'LRLZeNg/Ixd5QYDrp5MTXfbfhLGj8fXepS8J8n/2r1I=', '2022-03-10 14:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Karyawan'),
(3, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_customer` (`id_user`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `customerservice`
--
ALTER TABLE `customerservice`
  ADD PRIMARY KEY (`id_cs`);

--
-- Indexes for table `detailbooking`
--
ALTER TABLE `detailbooking`
  ADD PRIMARY KEY (`id_detail_booking`),
  ADD KEY `id_booking` (`id_booking`),
  ADD KEY `id_product` (`id_produk`);

--
-- Indexes for table `detailcart`
--
ALTER TABLE `detailcart`
  ADD PRIMARY KEY (`id_detail_cart`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `loginhistory`
--
ALTER TABLE `loginhistory`
  ADD PRIMARY KEY (`id_login_history`);

--
-- Indexes for table `nomorhphistory`
--
ALTER TABLE `nomorhphistory`
  ADD PRIMARY KEY (`id_nomor_hp`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Indexes for table `rekeningtoko`
--
ALTER TABLE `rekeningtoko`
  ADD PRIMARY KEY (`id_rekening_toko`);

--
-- Indexes for table `tarifsewa`
--
ALTER TABLE `tarifsewa`
  ADD PRIMARY KEY (`id_tarif_sewa`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_rekening_toko` (`id_rekening_toko`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `usertoken`
--
ALTER TABLE `usertoken`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customerservice`
--
ALTER TABLE `customerservice`
  MODIFY `id_cs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detailbooking`
--
ALTER TABLE `detailbooking`
  MODIFY `id_detail_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detailcart`
--
ALTER TABLE `detailcart`
  MODIFY `id_detail_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loginhistory`
--
ALTER TABLE `loginhistory`
  MODIFY `id_login_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `nomorhphistory`
--
ALTER TABLE `nomorhphistory`
  MODIFY `id_nomor_hp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rekeningtoko`
--
ALTER TABLE `rekeningtoko`
  MODIFY `id_rekening_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tarifsewa`
--
ALTER TABLE `tarifsewa`
  MODIFY `id_tarif_sewa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `usertoken`
--
ALTER TABLE `usertoken`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailbooking`
--
ALTER TABLE `detailbooking`
  ADD CONSTRAINT `detailbooking_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id_booking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailbooking_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailcart`
--
ALTER TABLE `detailcart`
  ADD CONSTRAINT `detailcart_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailcart_ibfk_2` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nomorhphistory`
--
ALTER TABLE `nomorhphistory`
  ADD CONSTRAINT `nomorhphistory_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tarifsewa`
--
ALTER TABLE `tarifsewa`
  ADD CONSTRAINT `tarifsewa_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_rekening_toko`) REFERENCES `rekeningtoko` (`id_rekening_toko`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
