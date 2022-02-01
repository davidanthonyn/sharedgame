<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>
    <h1>Edit Data Matkul SISTECH</h1>

    <?php foreach ($matkulEdit as $listMatkulEdit) { ?>

        <form action="<?php echo base_url() . 'Matakuliah/proses_edit_data'; ?>" method="POST">

            <table>
                <tr>
                    <td>Kode Matkul</td>
                    <td><input type="text" name="kode_matkul" value="<?= $listMatkulEdit->kode_matkul ?>" readonly</td>
                </tr>

                <tr>
                    <td>Nama Matkul</td>
                    <td><input type="text" name="nama_matkul" value="<?= $listMatkulEdit->nama_matkul ?>" readonly</td>
                </tr>

                <tr>
                    <td>SKS</td>
                    <td><input type="text" name="sks" value="<?= $listMatkulEdit->sks ?>" readonly</td>
                </tr>

                <tr>
                    <td>Sisa Kuota</td>
                    <td><input type="text" name="sisa_kuota" value="<?= $listMatkulEdit->sisa_kuota ?>" readonly</td>
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