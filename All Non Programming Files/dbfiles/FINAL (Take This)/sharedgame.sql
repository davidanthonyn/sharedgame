-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 06:51 PM
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

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_transaksi`, `id_user`, `created_at`) VALUES
(1, 1, 22, '2022-04-05 10:09:24');

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
(2, 'logitech', 'Screenshot_(26).png', 'tidak_aktif', '2022-04-10 02:41:27'),
(5, 'Oculus Quest 2', 'Screenshot_(61).png', 'aktif', '2022-03-31 00:22:44'),
(7, 'Konami', '', 'aktif', '0000-00-00 00:00:00'),
(8, 'Apple', 'empty', 'aktif', '2022-02-24 15:21:09'),
(9, 'Riot3456', 'Screenshot_(6).png', 'tidak_aktif', '2022-03-21 00:17:04'),
(10, 'batu', 'Screenshot_(35).png', 'aktif', '2022-03-31 00:29:19'),
(11, 'a', 'Screenshot_(15).png', 'aktif', '2022-03-31 00:43:55'),
(12, 'Sony Playstation', 'Screenshot_(57).png', 'tidak_aktif', '2022-03-31 14:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `updated_at`) VALUES
(1, 22, '2022-04-01 18:53:51'),
(3, 70, '2022-04-21 15:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `change_email`
--

CREATE TABLE `change_email` (
  `id_change_email` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email_before` varchar(256) NOT NULL,
  `email_after` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `confirmed_at` datetime NOT NULL,
  `status_change` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `change_email`
--

INSERT INTO `change_email` (`id_change_email`, `id_user`, `email_before`, `email_after`, `created_at`, `confirmed_at`, `status_change`) VALUES
(3, 22, 'davidasli@gmail.com', 'danthonynathanael@gmail.com', '2022-04-07 02:39:34', '0000-00-00 00:00:00', 0),
(4, 22, 'davidasli@gmail.com', 'kontolbinatang@protonmail.com', '2022-04-07 10:31:13', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `shipping` int(11) DEFAULT NULL,
  `id_rekening_toko` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `id_user`, `shipping`, `id_rekening_toko`, `updated_at`) VALUES
(4, 22, 1, 1, '2022-04-21 15:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `customerservice`
--

CREATE TABLE `customerservice` (
  `id_cs` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email_cs` varchar(100) NOT NULL,
  `number_cs` varchar(100) NOT NULL,
  `pesan_cs` varchar(500) NOT NULL,
  `reply_cs` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('pending','processed','done','ignored') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerservice`
--

INSERT INTO `customerservice` (`id_cs`, `nama_lengkap`, `email_cs`, `number_cs`, `pesan_cs`, `reply_cs`, `created_at`, `status`) VALUES
(1, 'Mangga Dua, Jakarta', 'cs@sharedgame.tech', '021 12345', 'Sharing Time', NULL, '2022-03-24 13:59:11', 'done');

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

--
-- Dumping data for table `detailbooking`
--

INSERT INTO `detailbooking` (`id_detail_booking`, `id_booking`, `id_produk`, `qty_produk`, `tgl_jam_awal_sewa`, `tgl_jam_akhir_sewa`) VALUES
(1, 1, 13, 1, '2022-04-05 10:10:14', '2022-04-05 10:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `detailcart`
--

CREATE TABLE `detailcart` (
  `id_detail_cart` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_tarif_sewa` int(11) NOT NULL,
  `qty_produk` int(11) NOT NULL,
  `start_plan` datetime NOT NULL,
  `finish_plan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailcart`
--

INSERT INTO `detailcart` (`id_detail_cart`, `id_cart`, `id_produk`, `id_tarif_sewa`, `qty_produk`, `start_plan`, `finish_plan`) VALUES
(41, 3, 3, 9, 1, '2022-04-22 00:00:00', '2022-04-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_final` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `lama_sewa_hari` int(11) NOT NULL,
  `startrent` datetime NOT NULL,
  `finishrent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`id_detail_transaksi`, `id_transaksi`, `id_produk`, `harga_final`, `qty`, `lama_sewa_hari`, `startrent`, `finishrent`) VALUES
(2, 1, 13, 100000, 2, 3, '2022-04-12 13:01:29', '2022-04-15 13:01:29'),
(3, 1, 5, 1000000, 2, 3, '2022-04-12 13:01:29', '2022-04-15 13:01:29'),
(4, 2, 13, 123, 1, 1, '2022-04-12 22:22:49', '2022-04-12 22:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `loginhistory`
--

CREATE TABLE `loginhistory` (
  `id_login_history` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `time_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id_member` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `start_member` datetime DEFAULT NULL,
  `end_member` datetime DEFAULT NULL,
  `status` enum('yes','no','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id_member`, `id_user`, `start_member`, `end_member`, `status`) VALUES
(1, 22, '2022-04-05 10:10:57', '2022-05-04 10:10:57', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `membership_package`
--

CREATE TABLE `membership_package` (
  `id_member_package` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership_package`
--

INSERT INTO `membership_package` (`id_member_package`, `month`, `price`, `updated_at`) VALUES
(1, 1, 100000, '2022-04-14 07:51:54'),
(2, 6, 300000, '2022-04-14 07:52:18'),
(3, 12, 500000, '2022-04-14 07:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `membership_request`
--

CREATE TABLE `membership_request` (
  `id_member_history` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `month` enum('1','6','12') NOT NULL,
  `status` enum('waiting','confirmed','rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_request`
--

INSERT INTO `membership_request` (`id_member_history`, `id_user`, `month`, `status`) VALUES
(7, 57, '1', 'confirmed'),
(8, 57, '12', 'waiting'),
(9, 57, '6', 'waiting'),
(10, 57, '12', 'waiting'),
(0, 22, '6', 'waiting'),
(0, 22, '12', 'waiting'),
(0, 22, '1', 'waiting'),
(0, 22, '1', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id_newsletter` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_active` enum('yes','no') NOT NULL,
  `joined_at` datetime NOT NULL,
  `last_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id_newsletter`, `email`, `is_active`, `joined_at`, `last_updated_at`) VALUES
(1, 'dudung@gmail.com', 'yes', '2022-03-24 12:51:36', '2022-03-24 12:51:36'),
(2, 'dadang@gmail.com', 'yes', '2022-03-24 12:56:14', '2022-03-24 12:56:14'),
(3, 'diding@gmail.com', 'yes', '2022-03-24 12:59:00', '2022-03-24 12:59:00'),
(4, 'dudung321@gmail.com', 'yes', '2022-03-30 01:20:44', '2022-03-30 01:20:44'),
(5, 'diding222222@gmail.com', 'yes', '2022-03-30 01:23:20', '2022-03-30 01:23:20'),
(6, 'yofan@gmail.com', 'yes', '2022-03-30 21:17:47', '2022-03-30 21:17:47'),
(7, 'a@dsfsad', 'yes', '2022-03-30 21:27:12', '2022-03-30 21:27:12'),
(8, 'pipi@gmail.com', 'yes', '2022-04-06 01:33:23', '2022-04-06 01:33:23'),
(9, 'lala@gmail.com', 'yes', '2022-04-06 01:37:10', '2022-04-06 01:37:10'),
(10, 'satu@gmail.com', 'yes', '2022-04-06 01:42:12', '2022-04-06 01:42:12'),
(11, 'yoyo@gmail.com', 'yes', '2022-04-06 01:48:56', '2022-04-06 01:48:56'),
(12, 'disney@gmail.com', 'yes', '2022-04-06 01:49:16', '2022-04-06 01:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id_page` int(11) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `detail` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id_page`, `page_name`, `type`, `detail`) VALUES
(1, 'About Us', 'aboutus', '<p>halo yoy</p>\r\n'),
(2, 'FAQ', 'faq', '<p><strong>Q:</strong>&nbsp;Apa benefit Membership? Benefit yang diberikan dari membership adalah potongan harga sebesar 10 persen dari harga sewa</p>\n\n<p><strong>Q:</strong>&nbsp;Bagaimana cara mendapatkan Membership? Dengan membayar sebesar Rp 150.000 maka customer akan mendapatkan Membership selama 3 bulan</p>\n\n<p><strong>Q:</strong>&nbsp;Bagaimana cara melakukan pemesanan? Login akun anda yang sudah terdaftar &gt; pilih alat gaming yang diinginkan &gt; pilih berapa lama ingin menyewa alat gaming &gt; isi form penyewa &gt; lakukan pembayaran &gt; pickup barang</p>\n\n<p><strong>Jika ada pertanyaan lebih lanjut bisa melalui Contact US</strong></p>\n'),
(3, 'Privacy Policy', 'privacypolicy', '<p>test3</p>'),
(4, 'Terms of Services', 'termsofservices', '<p>lala</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_detail_transaksi` int(11) NOT NULL,
  `deadline` datetime NOT NULL,
  `kode_pengembalian` int(11) NOT NULL,
  `status_pengembalian` int(11) NOT NULL,
  `pengembalian_pada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_driver` varchar(256) DEFAULT NULL,
  `foto_driver` varchar(256) DEFAULT NULL,
  `status_driver` enum('pending','menuju_ke_toko','sampai_di_toko','menuju_ke_alamat','selesai') NOT NULL
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
(3, 1, 'playstation 4', 'console', 'hitam', 'Screenshot_(23).png', '', '1234', 3),
(5, 2, 'logitech g29', 'game_gear', '#000000', 'Screenshot_(96).png', '<p>steering wheel terbaru</p>', '123', 2),
(6, 5, 'Oculus Quest 2', 'game_gear', 'hitam', 'https://i.ebayimg.com/images/g/j2YAAOSw-IheQHZh/s-l600.jpg', '', '123', 2),
(8, 7, 'Kaset PlayStation 4 \"Pro Evolution Soccer 2021\"', 'game_physics', 'putih', 'https://images.tokopedia.net/img/cache/500-square/product-1/2020/9/14/2860018/2860018_e1c7f385-85da-', '', '123', 4),
(9, 1, 'Kaset PlayStation 4 \"Horizon Forbidden West\"', 'game_physics', 'biru', 'https://images.tokopedia.net/img/cache/700/VqbcmM/2021/11/26/8e4051a9-826b-424f-9d7c-e720eb6e2196.jp', '', '123', 4),
(10, 2, 'fdsfsdfd', 'console', '#ffffff', '', 'asdad', 'sdfsdf112', 1),
(11, 8, 'Spiderman 2', 'console', '#ffffff', 'Screenshot_(81).png', 'Tobey, Andrew, Tom', 'ABC123', 5),
(12, 10, 'Turning Red', 'console', '#ffffff', 'Screenshot_(90).png', '<p><strong>Turning Red, beli sekarang!&nbsp;</strong>GAK MAU TAU</p>', 'DFGDFG222', 1),
(13, 10, 'GTA V', 'game_physics', '#ffffff', 'Screenshot_(23).png', '<p>GTA V</p>', 'SN123', 1),
(14, 12, 'Horizon Forbidden West', 'game_physics', '#00ff11', 'Feed.jpg', '<p>Horizo</p>', 'SN12', 5);

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
(1, '12345678', 'BCA', 'aktif', '2022-02-23 12:01:28'),
(2, '1234567', 'Bukopin', 'aktif', '2022-02-23 12:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id_search` int(11) NOT NULL,
  `keyword` varchar(256) NOT NULL,
  `tgl_pencarian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id_search`, `keyword`, `tgl_pencarian`) VALUES
(1, 'lala', '2022-04-11 15:04:59'),
(2, 'A', '2022-04-11 16:11:31'),
(3, 'X', '2022-04-11 16:11:38'),
(4, 'Horizon', '2022-04-11 21:12:45'),
(5, 'lala', '2022-04-11 21:12:53'),
(6, 'a', '2022-04-11 21:12:58'),
(7, 'Lala', '2022-04-11 22:42:29'),
(8, 'PS5', '2022-04-11 22:42:36'),
(9, 'Play', '2022-04-11 22:42:46'),
(10, 'Play', '2022-04-11 22:43:03');

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

--
-- Dumping data for table `tarifsewa`
--

INSERT INTO `tarifsewa` (`id_tarif_sewa`, `id_produk`, `tarif_harga`, `lama_sewa_hari`, `updated_at`) VALUES
(1, 6, 100000, 1, '0000-00-00 00:00:00'),
(2, 6, 240000, 3, '0000-00-00 00:00:00'),
(5, 6, 480000, 7, '0000-00-00 00:00:00'),
(6, 1, 250000, 1, '0000-00-00 00:00:00'),
(7, 1, 670000, 3, '0000-00-00 00:00:00'),
(8, 1, 1570000, 7, '0000-00-00 00:00:00'),
(9, 3, 200000, 1, '0000-00-00 00:00:00'),
(10, 3, 520000, 3, '0000-00-00 00:00:00'),
(11, 3, 1220000, 7, '0000-00-00 00:00:00'),
(12, 5, 100000, 1, '0000-00-00 00:00:00'),
(13, 5, 240000, 3, '0000-00-00 00:00:00'),
(16, 5, 480000, 7, '0000-00-00 00:00:00'),
(20, 8, 40000, 1, '0000-00-00 00:00:00'),
(21, 8, 100000, 3, '0000-00-00 00:00:00'),
(22, 8, 210000, 7, '0000-00-00 00:00:00'),
(23, 9, 40000, 1, '0000-00-00 00:00:00'),
(24, 9, 100000, 3, '0000-00-00 00:00:00'),
(25, 9, 210000, 7, '0000-00-00 00:00:00'),
(26, 10, 123, 1, '2022-03-31 01:19:08'),
(27, 10, 456, 3, '2022-03-31 01:19:08'),
(28, 10, 789, 7, '2022-03-31 01:19:08'),
(29, 11, 123, 1, '2022-03-31 01:21:38'),
(30, 11, 456, 3, '2022-03-31 01:21:38'),
(31, 11, 789, 7, '2022-03-31 01:21:38'),
(32, 12, 1, 1, '2022-03-31 02:04:38'),
(33, 12, 1, 3, '2022-03-31 02:04:38'),
(34, 12, 1, 7, '2022-03-31 02:04:38'),
(35, 13, 100000, 1, '2022-03-31 13:11:57'),
(36, 13, 200000, 3, '2022-03-31 13:11:57'),
(37, 13, 300000, 7, '2022-03-31 13:11:57'),
(38, 14, 100000, 1, '2022-04-11 21:20:34'),
(39, 14, 20000, 3, '2022-04-10 02:54:27'),
(40, 14, 300000, 7, '2022-04-10 18:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_buat_transaksi` datetime NOT NULL,
  `waktu_pembayaran` datetime DEFAULT NULL,
  `kode_unik_pembayaran` int(11) NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `status_pembayaran` enum('pending','diverifikasi','ditolak','diterima','dibatalkan') NOT NULL,
  `bukti_pembayaran` varchar(256) DEFAULT NULL,
  `no_rekening_user` int(11) DEFAULT NULL,
  `bank_asal_user` varchar(100) DEFAULT NULL,
  `id_rekening_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `waktu_buat_transaksi`, `waktu_pembayaran`, `kode_unik_pembayaran`, `jumlah_pembayaran`, `total_pembayaran`, `status_pembayaran`, `bukti_pembayaran`, `no_rekening_user`, `bank_asal_user`, `id_rekening_toko`) VALUES
(1, 22, '2022-04-05 09:17:40', '2022-04-05 09:17:40', 517, 500000, 500517, 'diterima', 'bukti.jpg', 1234567890, 'BCA', 1),
(2, 22, '2022-04-12 22:22:09', '2022-04-12 22:22:09', 123, 100000, 100123, 'pending', 'benbabi.jpg', 123456, 'BCA', 2),
(10, 23, '2022-04-19 23:28:16', NULL, 875, 2441368, 2442243, 'pending', NULL, NULL, NULL, 1),
(11, 44, '2022-04-20 23:42:42', NULL, 111, 2480912, 2481023, 'pending', NULL, NULL, NULL, 1),
(12, 22, '2022-04-21 15:08:14', NULL, 978, 2440912, 2441890, 'pending', NULL, NULL, NULL, 1);

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
  `no_hp` varchar(15) NOT NULL,
  `no_hp_dua` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` enum('yes','off_by_admin','off_by_user','not_yet_activated') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `password`, `alamat_lengkap`, `no_hp`, `no_hp_dua`, `tgl_lahir`, `id_role`, `is_active`, `created_at`, `updated_at`) VALUES
(22, 'david', 'davidasli@gmail.com', '$2y$10$NXBy.K86Z0V2x8CqMjYPGOrB/8Y0.sznlzGJ7PrKUSbZ0LBu8eO1u', 'DUDUNG', '0812345678902', '08123456789022', '2021-01-01', 1, 'yes', '2022-02-24 01:26:53', '2022-04-14 12:08:53'),
(23, 'David', 'david@gmail.com', '$2y$10$7DyWSaJTCynm6mgb.ZtNnOmqXjzym6jR7KFCU3uR8.WW3XSwDyHq2', 'empty', 'empty', 'emptysecond', '0000-00-00', 2, 'yes', '2022-02-24 15:17:09', '2022-02-24 15:17:09'),
(44, 'David', '01081190015@student.uph.edu', '$2y$10$edWyMEAjvgWcsFwQkFH30.qjQX6198HfdUxsiclhLKF0ohpUh0RX.', 'empty', 'empty', 'emptysecond', '0000-00-00', 3, 'yes', '2022-03-17 01:56:22', '2022-03-17 01:56:22'),
(70, 'david', 'danthonynathanael@gmail.com', '$2y$10$EEIdBzEQoH1tYTANcx..uOFdB6tJXR20U66t.1ZC.QtEhas3Xjeom', 'jalan duren no 10', '081234567890', '0812345678901', '2021-12-02', 3, 'yes', '2022-04-21 10:50:49', '2022-04-21 15:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `usercard`
--

CREATE TABLE `usercard` (
  `id_card` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto_ktp` varchar(256) DEFAULT NULL,
  `foto_selfie_ktp` varchar(256) DEFAULT NULL,
  `status_ktp` enum('belum','sedang_verifikasi','diterima','ditolak') NOT NULL,
  `note_user` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercard`
--

INSERT INTO `usercard` (`id_card`, `id_user`, `foto_ktp`, `foto_selfie_ktp`, `status_ktp`, `note_user`) VALUES
(2, 22, 'Screenshot_(6)1.png', 'Screenshot_(84).png', 'diterima', 'KTP Blur, mohon upload ulang.'),
(3, 70, 'Screenshot_(206).png', 'Screenshot_(207).png', 'diterima', '');

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
(28, '01081190015@student.uph.edu', 'nJccrVCCyu7m0O5pgMZkz5F8GB3l+RYnyye82ztdOys=', '2022-03-17 01:56:22'),
(63, 'danthonynathanael@gmail.com', 'KtewROS4VTfjpEYC9Ee+ouHh1gNiOzxgiFc3rZr5BJE=', '2022-04-21 10:50:49'),
(64, 'danthonynathanael@gmail.com', 'vnq1eLxOrQhQiCzOpKTBicj4fT65bPvZOCw0sS6izRE=', '2022-04-21 15:27:49');

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
-- Indexes for table `change_email`
--
ALTER TABLE `change_email`
  ADD PRIMARY KEY (`id_change_email`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_rekening_toko` (`id_rekening_toko`);

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
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_tarif_sewa` (`id_tarif_sewa`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `loginhistory`
--
ALTER TABLE `loginhistory`
  ADD PRIMARY KEY (`id_login_history`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `membership_package`
--
ALTER TABLE `membership_package`
  ADD PRIMARY KEY (`id_member_package`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id_newsletter`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

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
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`id_search`);

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
-- Indexes for table `usercard`
--
ALTER TABLE `usercard`
  ADD PRIMARY KEY (`id_card`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `change_email`
--
ALTER TABLE `change_email`
  MODIFY `id_change_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customerservice`
--
ALTER TABLE `customerservice`
  MODIFY `id_cs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detailbooking`
--
ALTER TABLE `detailbooking`
  MODIFY `id_detail_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detailcart`
--
ALTER TABLE `detailcart`
  MODIFY `id_detail_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loginhistory`
--
ALTER TABLE `loginhistory`
  MODIFY `id_login_history` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `membership_package`
--
ALTER TABLE `membership_package`
  MODIFY `id_member_package` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id_newsletter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rekeningtoko`
--
ALTER TABLE `rekeningtoko`
  MODIFY `id_rekening_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id_search` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tarifsewa`
--
ALTER TABLE `tarifsewa`
  MODIFY `id_tarif_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `usercard`
--
ALTER TABLE `usercard`
  MODIFY `id_card` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usertoken`
--
ALTER TABLE `usertoken`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
-- Constraints for table `change_email`
--
ALTER TABLE `change_email`
  ADD CONSTRAINT `change_email_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkout_ibfk_2` FOREIGN KEY (`id_rekening_toko`) REFERENCES `rekeningtoko` (`id_rekening_toko`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `detailcart_ibfk_2` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailcart_ibfk_3` FOREIGN KEY (`id_tarif_sewa`) REFERENCES `tarifsewa` (`id_tarif_sewa`);

--
-- Constraints for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `detailtransaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailtransaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tarifsewa`
--
ALTER TABLE `tarifsewa`
  ADD CONSTRAINT `tarifsewa_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

--
-- Constraints for table `usercard`
--
ALTER TABLE `usercard`
  ADD CONSTRAINT `usercard_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
