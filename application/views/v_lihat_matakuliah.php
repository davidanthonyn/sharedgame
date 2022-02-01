<!--
Kode MK: 4467
<br>
Nama MK: Pemrograman Web 2
<br>
Nama: David
<br>
Jadwal: Kamis, 9.15 - 11.05 WIB
<br><br> 
--->

<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>
    <h1>Data Matkul SISTECH
        <a href="<?php echo base_url() . 'Home' ?>">(Back to Home)</a>
    </h1>

    <a href="<?php echo base_url() . 'Matakuliah/tambah_data' ?>">+ Tambah Data</a>

    <table border="1">
        <tr>
            <th>Kode Matkul</th>
            <th>Nama Matkul</th>

            <th>SKS</th>
            <th>Sisa Kuota</th>
            <th>Aksi</th>
        </tr>

        <?php
        foreach ($matkul as $listMatkul) { ?>
            <tr>
                <td><?php echo $listMatkul->kode_matkul ?></td>
                <td><?php echo $listMatkul->nama_matkul ?></td>
                <td><?php echo $listMatkul->sks ?></td>
                <td><?php echo $listMatkul->sisa_kuota ?></td>
                <td>
                    <a href="<?php echo base_url() . 'Matakuliah/edit_data/' . $listMatkul->kode_matkul; ?>">Edit</a> ||
                    <a href="<?php echo base_url() . 'Matakuliah/delete_data/' . $listMatkul->kode_matkul; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>