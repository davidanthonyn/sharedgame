<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>
    <h1>Edit Data Karyawan SISTECH</h1>

    <?php foreach ($karyawanDavidEdit as $listKaryawanDavidEdit) { ?>

        <form action="<?php echo base_url() . 'Karyawan_david/proses_edit_data_david'; ?>" method="POST">

            <table>
                <tr>
                    <td>NIK</td>
                    <td><input readonly type="text" name="nik_david" value="<?= $listKaryawanDavidEdit->nik ?>" </td>
                </tr>

                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama_karyawan_david" value="<?= $listKaryawanDavidEdit->nama_karyawan ?>" readonly</td>
                </tr>

                <tr>
                    <td>No. HP</td>
                    <td><input type="text" name="no_hp_david" maxlength="12" value="<?= $listKaryawanDavidEdit->no_hp ?>" readonly</td>
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
                            <?php foreach ($jabatan as $listJabatan) { ?>

                                <option value="<?php echo $listJabatan->id_jabatan ?>" <?php if ($listJabatan->id_jabatan == $listKaryawanDavidEdit->id_jabatan) {
                                                                                            echo "selected";
                                                                                        } ?>>

                                    <?php echo $listJabatan->nama_jabatan ?> </option>

                            <?php } ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" value="Ubah"></td>
                </tr>
            <?php
        }
            ?>

            </table>
        </form>

        <form method="POST" action="<?php echo base_url() . 'Karyawan_david/batal_inputeditkaryawan_data_david'; ?>">
            <tr>
                <td></td>
                <td><input type="submit" Value="BATAL"></td>
            </tr>
        </form>
</body>

</html>