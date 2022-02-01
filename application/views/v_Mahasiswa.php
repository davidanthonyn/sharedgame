<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>

    <h1>Data Mahasiswa SISTECH
        <a href="<?php echo base_url() . 'Home' ?>">(Back to Home)</a>
    </h1>

    <a href="<?php echo base_url() . 'Mahasiswa/tambah_data' ?>">+ Tambah Data</a>
    </h1>
    <table border="1">
        <tr>
            <th>NPM</th>
            <th>Nama Mahasiswa</th>
            <th>Email Mahasiswa</th>
            <th>Kode Prodi</th>
            <th>Aksi</th>
        </tr>

        <?php
        foreach ($mahasiswa as $listMahasiswa) { ?>
            <tr>
                <td><?php echo $listMahasiswa->npm ?></td>
                <td><?php echo $listMahasiswa->nama_mahasiswa ?></td>
                <td><?php echo $listMahasiswa->email_mahasiswa ?></td>
                <td><?php echo $listMahasiswa->kode_prodi ?></td>
                <td>
                    <a href="<?php echo base_url() . 'Mahasiswa/edit_data/' . $listMahasiswa->npm; ?>">Edit</a> ||
                    <a href="<?php echo base_url() . 'Mahasiswa/delete_data/' . $listMahasiswa->npm; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>