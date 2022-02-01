<html>

<head>
    <meta charset="utf-8">
    <title>CRUD DATABASE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo base_url() ?>/public/css/bootstrap.css"></script>
</head>

<?php include 'templates/header.php' ?>

<body>
    <h1>OUTPUT SESSION</h1>


    <table>
        <tr>
            <td>NIDN</td>
            <td>: <?php echo $this->session->userdata('nidn'); ?></td>
        </tr>

        <tr>
            <td>Nama Dosen</td>
            <td>: <?php echo $this->session->userdata('nama_dosen'); ?></td>
        </tr>

        <a href="<?php echo base_url() . 'Dosen/session_data'; ?>">Back</a>
    </table>
</body>

</html>