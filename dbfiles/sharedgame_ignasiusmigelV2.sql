-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2022 pada 16.33
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

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
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `nama_brand` varchar(100) NOT NULL,
  `gambar_brand` varchar(100) NOT NULL,
  `status_brand` enum('aktif','tidak_aktif','','') NOT NULL,
  `datetime_brand_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`, `gambar_brand`, `status_brand`, `datetime_brand_added`) VALUES
(1, 'sony', '', 'aktif', '0000-00-00 00:00:00'),
(2, 'logitech', '', 'aktif', '0000-00-00 00:00:00'),
(5, 'Oculus Quest 2', '', 'aktif', '0000-00-00 00:00:00'),
(6, 'Rockstar', '', 'aktif', '0000-00-00 00:00:00'),
(7, 'Konami', '', 'aktif', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
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
-- Struktur dari tabel `customerservice`
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
-- Struktur dari tabel `detailbooking`
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
-- Struktur dari tabel `detailcart`
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
-- Struktur dari tabel `loginhistory`
--

CREATE TABLE `loginhistory` (
  `id_login_history` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `time_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `loginhistory`
--

INSERT INTO `loginhistory` (`id_login_history`, `email`, `time_login`) VALUES
(1, 'm@gmail.com', '2022-02-20 01:47:15'),
(2, 'm@gmail.com', '2022-02-20 02:00:56'),
(3, 'm@gmail.com', '2022-02-20 13:38:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nomorhphistory`
--

CREATE TABLE `nomorhphistory` (
  `id_nomor_hp` int(11) NOT NULL,
  `nomor_hp` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori_produk` enum('console','game_physics','game_gear','') NOT NULL,
  `warna_produk` varchar(100) NOT NULL,
  `gambar_produk` varchar(500) NOT NULL,
  `deskripsi_produk` varchar(100) NOT NULL,
  `serial_produk` varchar(100) NOT NULL,
  `jumlah_tersedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_brand`, `nama_produk`, `kategori_produk`, `warna_produk`, `gambar_produk`, `deskripsi_produk`, `serial_produk`, `jumlah_tersedia`) VALUES
(1, 1, 'playstation 5', 'console', 'putih', 'https://asset.kompas.com/crops/OShkHBI40cCFj6mMFFcYmhbhBaw=/187x12:1126x638/750x500/data/photo/2020/06/12/5ee2bae6901d6.jpg', 'playstation 5 terbaru', '123', 1),
(3, 1, 'playstation 4', 'console', 'hitam', 'https://cdn1-production-images-kly.akamaized.net/Tib_XTBmEyghebeVYZPvqM0HDCY=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3218222/original/083216700_1598339935-playstation-4-pro-vertical-product-shot-01.jpg', '', '1234', 1),
(5, 2, 'logitech g29', 'game_gear', 'hitam', 'https://s2.bukalapak.com/uploads/content_attachment/2e5be96d20e8d762b88169c5/w-740/Setir.jpg', 'steering wheel terbaru', '123', 2),
(6, 5, 'Oculus Quest 2', 'game_gear', 'hitam', 'https://i.ebayimg.com/images/g/j2YAAOSw-IheQHZh/s-l600.jpg', '', '123', 2),
(7, 6, 'Kaset PlayStation 4 \"Grand Theft Auto V\"', 'game_physics', 'coklat', 'https://cf.shopee.co.id/file/70667261780ce5784cf3e2dd82551075', '', '123', 4),
(8, 7, 'Kaset PlayStation 4 \"Pro Evolution Soccer 2021\"', 'game_physics', 'putih', 'https://images.tokopedia.net/img/cache/500-square/product-1/2020/9/14/2860018/2860018_e1c7f385-85da-447b-9cdd-a1da0188bdc4_500_500', '', '123', 4),
(9, 1, 'Kaset PlayStation 4 \"Horizon Forbidden West\"', 'game_physics', 'biru', 'https://images.tokopedia.net/img/cache/700/VqbcmM/2021/11/26/8e4051a9-826b-424f-9d7c-e720eb6e2196.jpg', '', '123', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekeningtoko`
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
-- Struktur dari tabel `transaksi`
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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `no_hp_dua` varchar(12) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto_ktp` varchar(100) NOT NULL,
  `foto_selfie_ktp` varchar(100) NOT NULL,
  `user_level` enum('admin','karyawan','customer') NOT NULL,
  `status_ktp` enum('belum','sedang_verifikasi','diterima','ditolak') NOT NULL,
  `is_active` enum('yes','off_by_admin','off_by_user') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
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
(13, 'Ebenheizer', 'ebenheizer@gmail.com', '$2y$10$CWkNI8EZxGx8dnsXzWkM8.xm4pEJc8QACvBNCpfAzIzRdj8enoX22', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 'customer', 'belum', 'yes', '2022-02-22 21:24:16', '2022-02-22 21:24:16'),
(14, 'migeell', 'migel@gmail.com', '$2y$10$V4ZlCTHc7pLSLiejer.97Obj2OzuVfY4fGN2/5NRFVTqoC/SPfWXm', 'empty', 'empty', 'empty', '0000-00-00', 'empty', 'empty', 'customer', 'belum', 'yes', '2022-02-22 22:20:17', '2022-02-22 22:20:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_customer` (`id_user`);

--
-- Indeks untuk tabel `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `customerservice`
--
ALTER TABLE `customerservice`
  ADD PRIMARY KEY (`id_cs`);

--
-- Indeks untuk tabel `detailbooking`
--
ALTER TABLE `detailbooking`
  ADD PRIMARY KEY (`id_detail_booking`),
  ADD KEY `id_booking` (`id_booking`),
  ADD KEY `id_product` (`id_produk`);

--
-- Indeks untuk tabel `detailcart`
--
ALTER TABLE `detailcart`
  ADD PRIMARY KEY (`id_detail_cart`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `loginhistory`
--
ALTER TABLE `loginhistory`
  ADD PRIMARY KEY (`id_login_history`);

--
-- Indeks untuk tabel `nomorhphistory`
--
ALTER TABLE `nomorhphistory`
  ADD PRIMARY KEY (`id_nomor_hp`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Indeks untuk tabel `rekeningtoko`
--
ALTER TABLE `rekeningtoko`
  ADD PRIMARY KEY (`id_rekening_toko`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_rekening_toko` (`id_rekening_toko`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customerservice`
--
ALTER TABLE `customerservice`
  MODIFY `id_cs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detailbooking`
--
ALTER TABLE `detailbooking`
  MODIFY `id_detail_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detailcart`
--
ALTER TABLE `detailcart`
  MODIFY `id_detail_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `loginhistory`
--
ALTER TABLE `loginhistory`
  MODIFY `id_login_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `nomorhphistory`
--
ALTER TABLE `nomorhphistory`
  MODIFY `id_nomor_hp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `rekeningtoko`
--
ALTER TABLE `rekeningtoko`
  MODIFY `id_rekening_toko` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detailbooking`
--
ALTER TABLE `detailbooking`
  ADD CONSTRAINT `detailbooking_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id_booking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailbooking_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detailcart`
--
ALTER TABLE `detailcart`
  ADD CONSTRAINT `detailcart_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailcart_ibfk_2` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nomorhphistory`
--
ALTER TABLE `nomorhphistory`
  ADD CONSTRAINT `nomorhphistory_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_rekening_toko`) REFERENCES `rekeningtoko` (`id_rekening_toko`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
