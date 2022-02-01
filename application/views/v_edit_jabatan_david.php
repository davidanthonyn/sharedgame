<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>
    <h1>Edit Data Jabatan</h1>

    <?php foreach ($jabatanDavidEdit as $listJabatanDavidEdit) { ?>

        <form action="<?php echo base_url() . 'Jabatan_david/proses_edit_data_david'; ?>" method="POST">

            <table>
                <tr>
                    <td>ID Jabatan</td>
                    <td><input readonly type="text" name="id_jabatan_david" value="<?= $listJabatanDavidEdit->id_jabatan ?>" </td>
                </tr>

                <tr>
                    <td>Nama Jabatan</td>
                    <td><input type="text" name="nama_jabatan_david" value="<?= $listJabatanDavidEdit->nama_jabatan ?>" readonly</td>
                </tr>

                <tr>
                    <td>Tunjangan Jabatan</td>
                    <td><input type="text" name="tunjangan_jabatan_david" value="<?= $listJabatanDavidEdit->tunjangan_jabatan ?>" readonly</td>
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

        </form>

        <form method="POST" action="<?php echo base_url() . 'Jabatan_david/batal_inputeditjabatan_data_david'; ?>">
            <tr>
                <td></td>
                <td><input type="submit" Value="BATAL"></td>
            </tr>
        </form>


</body>

</html>