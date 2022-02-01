<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>
    <h1>Tambah Data Prodi SISTECH</h1>

    <form method="POST" action="<?php echo base_url() . 'Prodi/proses_tambah_data'; ?>">
        <table>
            <tr>
                <td>Kode Prodi</td>
                <td><input type="text" name="kode_prodi"></td>
            </tr>

            <tr>
                <td>Nama Prodi</td>
                <td><input type="text" name="nama_prodi"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" Value="SIMPAN"></td>
            </tr>

        </table>
    </form>
</body>

</html>