<html>
    <head>
        <title>CRUD DATABASE</title>
</head>

<body>
    <h1>Tambah Data Karyawan</h1>

    <form method="POST" action="<?php echo base_url(). 'Karyawan_david/proses_tambah_data_david'; ?>">
    <table>
        <tr>
            <td>NIK</td>
            <td><input type="text" name="nik_david" maxlength="16" required></td>
        </tr>

            <tr>
                <td>Nama Karyawan</td>
                <td><input type="text" name="nama_karyawan_david" required></td>
            </tr> 

            <tr>
                <td>Nomor HP</td>
                <td><input type="text" name="no_hp_david" maxlength="12" required></td>
            </tr> 

            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenis_kelamin_david">
  <option value="Laki-Laki">Laki-Laki</option>
  <option value="Perempuan">Perempuan</option>
</select>
                    </td>
            </tr>

            <tr>
                <td>Jabatan</td>
                <td>
                    <select name="id_jabatan_david">

                    <?php foreach($jabatan as $listJabatan) { ?>

                        <option value="<?php echo $listJabatan->id_jabatan ?>">

                        <?php echo $listJabatan->nama_jabatan ?>

                    </option>

                    <?php } ?>
                    </select>
                    
                    </td>
            </tr>

                    <tr>
                        <td></td>
                        <td><input type="submit" Value="SIMPAN"></td>
                    </tr>
                    </table>
                    </form>

                    <form method="POST" action="<?php echo base_url(). 'Karyawan_david/batal_inputeditkaryawan_data_david'; ?>">
                    <tr>
                        <td></td>
                        <td><input type="submit" Value="BATAL"></td>
                    </tr>
</form>
</body>
</html>