<html>
    <head>
        <title>CRUD DATABASE</title>
</head>

<body>
<h1>Data Karyawan PT. David
<a href="<?php echo base_url(). 'Home_david' ?>">(Back to Home)</a>
</h1>

<a href="<?php echo base_url(). 'Karyawan_david/tambah_data_david' ?>">+ Tambah Data</a>

<table border="1">
    <tr>
        <th>NIK</th>
        <th>Nama Karyawan</th>

        <th>Nomor HP</th>
        <th>Jenis Kelamin</th>

        <th>Jabatan</th>
        <th>Aksi</th>
</tr>

<?php
foreach($karyawan as $listkaryawan_david) { ?>
    <tr>
        <td><?php echo $listkaryawan_david->nik ?></td>
        <td><?php echo $listkaryawan_david->nama_karyawan ?></td>
        <td><?php echo $listkaryawan_david->no_hp ?></td>
        <td><?php echo $listkaryawan_david->jenis_kelamin ?></td>
        <td><?php echo $listkaryawan_david->nama_jabatan ?></td>
        <td>
            <a href="<?php echo base_url(). 'Karyawan_david/edit_data_david/'.$listkaryawan_david->nik; ?>">Edit</a> || 
            <a href="<?php echo base_url(). 'Karyawan_david/delete_data_david/'.$listkaryawan_david->nik; ?>">Hapus</a>
        </td>
    </tr>
<?php
}
?>
</table>

</body>
</html>