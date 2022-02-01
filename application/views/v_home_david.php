<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CRUD DATABASE</title>
</head>
<body>
    <h1>MENU DATA KARYAWAN PT David
    <h1><a href="<?php echo base_url(). 'Karyawan_david/' ?>">a. Data Karyawan</a> </h1>
    <h1><a href="<?php echo base_url(). 'Jabatan_david/' ?>">b. Data Jabatan</a> </h1>
    <h1><a href="<?php echo base_url(). 'Home_david/logout_session_david' ?>">Logout </a> </h1>

    <table>

            <tr>
                <td>Nama User</td>
                <td>: <?php echo $this->session->userdata('nama_user'); ?></td>
            </tr> 
</table>

</body>
</html>
