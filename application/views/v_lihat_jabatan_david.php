<html>
    <head>
        <title>CRUD DATABASE</title>
</head>

<body>
<h1>Data Jabatan PT. David
<a href="<?php echo base_url(). 'Home_david' ?>">(Back to Home)</a>
</h1>

<a href="<?php echo base_url(). 'Jabatan_david/tambah_data_david' ?>">+ Tambah Data</a>

<table border="1">
    <tr>
        <th>ID Jabatan</th>
        <th>Nama Jabatan</th>

        <th>Tunjangan Jabatan</th>
        <th>Aksi</th>
</tr>

<?php
foreach($jabatan as $listjabatan_david) { ?>
    <tr>
        <td><?php echo $listjabatan_david->id_jabatan ?></td>
        <td><?php echo $listjabatan_david->nama_jabatan ?></td>
        <td><?php echo $listjabatan_david->tunjangan_jabatan ?></td>
        <td>
            <a href="<?php echo base_url(). 'Jabatan_david/edit_data_david/'.$listjabatan_david->id_jabatan; ?>">Edit</a> || 
            <a href="<?php echo base_url(). 'Jabatan_david/delete_data_david/'.$listjabatan_david->id_jabatan; ?>">Hapus</a>
        </td>
    </tr>
<?php
}
?>
</table>

</body>
</html>