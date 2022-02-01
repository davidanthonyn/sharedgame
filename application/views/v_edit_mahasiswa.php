<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>
    <h1>Edit Data Mahasiswa SISTECH</h1>

    <?php foreach ($mahasiswaEdit as $listMahasiswaEdit) { ?>

        <form action="<?php echo base_url() . 'Mahasiswa/proses_edit_data'; ?>" method="POST">

            <table>
                <tr>
                    <td>NPM Mahasiswa</td>
                    <td><input type="text" name="npm" value="<?= $listMahasiswaEdit->npm ?>" readonly</td>
                </tr>

                <tr>
                    <td>Nama Mahasiswa</td>
                    <td><input type="text" name="nama_mahasiswa" value="<?= $listMahasiswaEdit->nama_mahasiswa ?>" readonly</td>
                </tr>

                <tr>
                    <td>Email Mahasiswa</td>
                    <td><input type="text" name="email_mahasiswa" value="<?= $listMahasiswaEdit->email_mahasiswa ?>" readonly</td>
                </tr>

                <tr>
                    <td>Kode Prodi</td>
                    <td><input type="text" name="kode_prodi" value="<?= $listMahasiswaEdit->kode_prodi ?>" readonly</td>
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
</body>

</html>