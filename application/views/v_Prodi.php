<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>

    <h1>Data Prodi SISTECH
        <a href="<?php echo base_url() . 'Home' ?>">(Back to Home)</a>
    </h1>

    <a href="<?php echo base_url() . 'Prodi/tambah_data' ?>">+ Tambah Data</a>
    </h1>
    <table border="1">
        <tr>
            <th>Kode Prodi</th>
            <th>Nama Prodi</th>
            <th>Aksi</th>
        </tr>

        <?php
        foreach ($prodi as $listProdi) { ?>
            <tr>
                <td><?php echo $listProdi->kode_prodi ?></td>
                <td><?php echo $listProdi->nama_prodi ?></td>
                <td>
                    <a href="<?php echo base_url() . 'Prodi/edit_data/' . $listProdi->kode_prodi; ?>">Edit</a> ||
                    <a href="<?php echo base_url() . 'Prodi/delete_data/' . $listProdi->kode_prodi; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>