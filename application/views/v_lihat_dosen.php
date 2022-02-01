<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>
    <h1>Data Dosen SISTECH
        <a href="<?php echo base_url() . 'Home' ?>">(Back to Home)</a>
    </h1>

    <a href="<?php echo base_url() . 'Dosen/tambah_data' ?>">+ Tambah Data</a>

    <table border="1">
        <tr>
            <th>NIDN</th>
            <th>Nama Dosen</th>

            <th>Kode Prodi</th>
            <th>Nama Prodi</th>

            <th>Email Dosen</th>
            <th>Aksi</th>
        </tr>

        <?php
        foreach ($dosen as $listDosen) { ?>
            <tr>
                <td><?php echo $listDosen->nidn ?></td>
                <td><?php echo $listDosen->nama_dosen ?></td>
                <td><?php echo $listDosen->kode_prodi ?></td>
                <td><?php echo $listDosen->nama_prodi ?></td>
                <td><?php echo $listDosen->email_dosen ?></td>
                <td>
                    <a href="<?php echo base_url() . 'Dosen/edit_data/' . $listDosen->nidn; ?>">Edit</a> ||
                    <a href="<?php echo base_url() . 'Dosen/delete_data/' . $listDosen->nidn; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>