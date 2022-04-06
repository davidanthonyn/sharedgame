INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `waktu_buat_transaksi`, `waktu_pembayaran`, `kode_unik_pembayaran`, `jumlah_pembayaran`, `total_pembayaran`, `status_pembayaran`, `bukti_pembayaran`, `no_rekening_user`, `bank_asal_user`, `id_rekening_toko`) VALUES ('1', '22', '2022-04-05 09:17:40.000000', '2022-04-05 09:17:40.000000', '517', '500000', '500517', 'diterima', 'bukti.jpg', '1234567890', 'BCA', '1');

INSERT INTO `booking` (`id_booking`, `id_transaksi`, `id_user`, `created_at`) VALUES ('1', '1', '22', '2022-04-05 10:09:24.000000');

INSERT INTO `detailbooking` (`id_detail_booking`, `id_booking`, `id_produk`, `qty_produk`, `tgl_jam_awal_sewa`, `tgl_jam_akhir_sewa`) VALUES ('1', '1', '13', '1', '2022-04-05 10:10:14.000000', '2022-04-05 10:10:14.000000');

INSERT INTO `membership` (`id_member`, `id_user`, `start_member`, `end_member`, `status`, `total_month_subs`) VALUES ('1', '22', '2022-04-05 10:10:57.000000', '2022-05-04 10:10:57.000000', 'yes', '1');