<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>
    <h1>INPUT SESSION</h1>

    <form method="POST" action="<?php echo base_url() . 'Dosen/proses_session_data'; ?>">
        <table>
            <tr>
                <td>NIDN</td>
                <td><input type="text" name="nidn"></td>
            </tr>

            <tr>
                <td>Nama Dosen</td>
                <td><input type="text" name="nama_dosen"></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" name="lihat" value="LIHAT SESSION">
                    <input type="submit" name="simpan" value="SIMPAN">
                    <input type="submit" name="hapus" value="HAPUS">
                </td>
            </tr>

        </table>
    </form>
</body>

</html>