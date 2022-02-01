<html>

<head>
    <title>CRUD DATABASE</title>
</head>

<body>
    <h1>Tambah Data Jabatan</h1>

    <form method="POST" action="<?php echo base_url() . 'Jabatan_david/proses_tambah_data_david'; ?>">
        <table>
            <tr>
                <td>Nama Jabatan</td>
                <td><input type="text" name="nama_jabatan" required></td>
            </tr>

            <tr>
                <td>Tunjangan Jabatan</td>
                <td><input type="text" name="tunjangan_jabatan" required></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" Value="SIMPAN"></td>
            </tr>

        </table>
    </form>

    <form method="POST" action="<?php echo base_url() . 'Jabatan_david/batal_inputeditjabatan_data_david'; ?>">
        <tr>
            <td></td>
            <td><input type="submit" Value="BATAL"></td>
        </tr>
    </form>
</body>

</html>