<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>

    <h1>Data Enroll SISTECH
        <a href="<?php echo base_url() . 'Home' ?>">(Back to Home)</a>
    </h1>

    <a href="<?php echo base_url() . 'Enroll/tambah_data' ?>">+ Tambah Data</a>
    </h1>
    <table border="1">
        <tr>
            <th>Kode Enroll</th>
            <th>NPM</th>
            <th>Kode Matkul</th>
            <th>Aksi</th>
        </tr>

        <?php
        foreach ($enroll as $listEnroll) { ?>
            <tr>
                <td><?php echo $listEnroll->kode_enroll ?></td>
                <td><?php echo $listEnroll->npm ?></td>
                <td><?php echo $listEnroll->kode_matkul ?></td>
                <td>
                    <a href="<?php echo base_url() . 'Enroll/edit_data/' . $listEnroll->kode_enroll; ?>">Edit</a> ||
                    <a href="<?php echo base_url() . 'Enroll/delete_data/' . $listEnroll->kode_enroll; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>