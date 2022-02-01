<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>
    <h1>Edit Data Prodi SISTECH</h1>

    <?php foreach ($prodiEdit as $listProdiEdit) { ?>

        <form action="<?php echo base_url() . 'Prodi/proses_edit_data'; ?>" method="POST">

            <table>
                <tr>
                    <td>Kode Prodi</td>
                    <td><input type="text" name="kode_prodi" value="<?= $listProdiEdit->kode_prodi ?>" readonly</td>
                </tr>

                <tr>
                    <td>Nama Prodi</td>
                    <td><input type="text" name="nama_prodi" value="<?= $listProdiEdit->nama_prodi ?>" readonly</td>
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