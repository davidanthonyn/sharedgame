<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>
    <h1>Edit Data Enroll SISTECH</h1>

    <?php foreach ($enrollEdit as $listEnrollEdit) { ?>

        <form action="<?php echo base_url() . 'Enroll/proses_edit_data'; ?>" method="POST">

            <table>
                <tr>
                    <td>Kode Enroll</td>
                    <td><input readonly type="text" name="kode_enroll" value="<?= $listEnrollEdit->kode_enroll ?>" </td>
                </tr>

            <?php
        }
            ?>




            <tr>
                <td>NPM - Nama Mahasiswa</td>
                <td><input type="text" name="npm" value="<?= $listEnrollEdit->npm ?>" readonly</td>
            </tr>

            <tr>
                <td>Kode Matkul - Nama Matkul</td>
                <td><input type="text" name="kode_matkul" value="<?= $listEnrollEdit->kode_matkul ?>" readonly</td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Ubah"></td>
            </tr>

            </table>
        </form>
</body>

</html>