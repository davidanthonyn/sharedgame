-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 03:30 PM
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
(2, 'Apple', 'empty', 'aktif', '2022-02-20 19:30:56'),
(3, 'Acer', 'empty', 'aktif', '2022-02-20 19:32:46');

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
(3, 'm@gmail.com', '2022-02-20 13:38:11');

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
  `gambar_produk` varchar(100) NOT NULL,
  `deskripsi_produk` varchar(100) NOT NULL,
  `serial_produk` varchar(100) NOT NULL,
  `jumlah_tersedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekeningtoko`
--

CREATE TABLE `rekeningtoko` (
  `id_rekening_toko` int(11) NOT NULL,
  `no_rekening_toko` varchar(100) NOT NULL,
  `bank_rekening_toko` int(11) NOT NULL,
  `status_rekening_toko` enum('aktif','tidak_aktif','','') NOT NULL,
  `created_at` datetime NOT NULL
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
  `user_level` enum('admin','karyawan','customer') NOT NULL,
  `status_ktp` enum('belum','sedang_verifikasi','diterima','ditolak') NOT NULL,
  `is_active` enum('yes','off_by_admin','off_by_user','not_yet_activated') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `password`, `alamat_lengkap`, `no_hp`, `no_hp_dua`, `tgl_lahir`, `foto_ktp`, `foto_selfie_ktp`, `user_level`, `status_ktp`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'Tara', 'tara@gmail.com', '$2y$10$RuDOdeShVAHMgDP366lDSeZOg2llIGmk7jRzgVo1N55YK7F0SnYTS', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 'customer', 'belum', 'yes', '2022-02-19 12:47:07', '2022-02-19 12:47:07'),
(5, 'gema', 'gema@gmail.com', '$2y$10$1l0vlb8TaO4eb2MCpQcJNOT3uVGrzdpOloUcoqgkn7sqXrDwZVdtu', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 'customer', 'belum', 'yes', '1970-01-01 07:00:01', '1970-01-01 07:00:01'),
(6, 'chris', 'chris@gmail.com', '$2y$10$7wvKBZBIF0NAYB7Du1.rouhydFxXuHosV4MqEsdLZzg.MXEa2BZVi', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 'customer', 'belum', 'yes', '1970-01-01 07:00:01', '1970-01-01 07:00:01'),
(7, 'alip', 'alip@gmail.com', '$2y$10$aWOGY7TSfzk0NPBQ8LW9H.EWo1zGD0ljlVwhzzxseVKy6F0br1h3W', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 'customer', 'belum', 'yes', '2022-02-19 18:55:47', '2022-02-19 18:55:47'),
(8, 'fall guys', 'fallguys@gmail.com', '$2y$10$4Fhnd7Rave0b7ONsz4eN8OoLlQniL1p20MyZck0mlTr.QsDD7L7Yy', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 'customer', 'belum', 'yes', '2022-02-20 01:00:45', '2022-02-20 01:00:45'),
(9, 'm', 'm@gmail.com', '$2y$10$kwEoHV3fg8axbdk.Gvxhze1.3f6IvYd8nMKDuNVMSCi71Lcmv.s32', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 'customer', 'belum', 'yes', '2022-02-20 01:07:29', '2022-02-20 01:07:29'),
(10, 'trevor', 'trevor@gmail.com', '$2y$10$dhGTJlR02RrNVAvHU2ZG2ed8X9PXSw7f0sRGKnjP8L6me7IJxmyzO', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 'customer', 'belum', 'yes', '2022-02-20 13:53:06', '2022-02-20 13:53:06'),
(11, 'Michael', 'michael@gmail.com', '$2y$10$rDuO73rBFn/QZQcUdZ3ZA.Cv.Dog/ntcr.CxwemhmjwjxTmg5ejz2', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 'customer', 'belum', 'yes', '2022-02-20 15:36:55', '2022-02-20 15:36:55'),
(12, 'halohalo', 'halohalo@gmail.com', '$2y$10$.ytOi6jTnVhGXqBzBjMl1er9LqYvaGmN65m6mU.x6OPjAuZGFygl.', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 'admin', 'belum', 'yes', '2022-02-20 15:49:28', '2022-02-21 15:49:28'),
(13, 'Ebenheizer', 'ebenheizer@gmail.com', '$2y$10$CWkNI8EZxGx8dnsXzWkM8.xm4pEJc8QACvBNCpfAzIzRdj8enoX22', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 'customer', 'belum', 'yes', '2022-02-22 21:24:16', '2022-02-22 21:24:16');

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
  ADD PRIMARY KEY (`id_user`);

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
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customerservice`
--
ALTER TABLE `customerservice`
  MODIFY `id_cs` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_login_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nomorhphistory`
--
ALTER TABLE `nomorhphistory`
  MODIFY `id_nomor_hp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekeningtoko`
--
ALTER TABLE `rekeningtoko`
  MODIFY `id_rekening_toko` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_rekening_toko`) REFERENCES `rekeningtoko` (`id_rekening_toko`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
