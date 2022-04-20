<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title><?= $title ?></title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/awesome-bootstrap-checkbox.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/style.css">
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>

</head>

<body>
    <?php include('includes/header.php'); ?>

    <div class="ts-main-content">
        <?php include('includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Manage Contact Us Queries</h2>

                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">User queries</div>
                            <div class="panel-body">
                                <?php foreach ($CSEdit as $detilCS) : ?>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Lengkap<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="fullnamecs" id="fullnamecs" class="form-control" value="<?php echo $detilCS->nama_lengkap;  ?>" readonly>
                                            <?= form_error('fullnamecs', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <br>
                                        <label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="emailcs" id="emailcs" class="form-control" value="<?php echo $detilCS->email_cs;  ?>" readonly>
                                            <?= form_error('emailcs', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nomor HP<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="phonenumber" id="phonenumber" class="form-control" value="<?php echo $detilCS->number_cs;  ?>" readonly>
                                            <?= form_error('phonenumber', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                    </div>
                                    <br>
                                    <label class="col-sm-2 control-label">Pesan<span style="color:red">*</span></label>
                                    <div class="col-sm-4">
                                        <textarea type="text" name="messagecs" id="messagecs" class="form-control" readonly><?php echo $detilCS->pesan_cs;  ?></textarea>
                                        <?= form_error('messagecs', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Balas Pesan<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <textarea type="text" name="replycs" id="replycs" class="form-control"></textarea>
                                            <?= form_error('replycs', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                    </div>
                                <?php endforeach; ?>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-4">

                                    <button class="btn btn-primary" name="submit" type="submit">Update</button>

                                    <button class="btn btn-primary mb1 black bg-darken-1"><a href="<?php echo base_url() . "admin/managecs"; ?>">Cancel</a></button>
                                </div>
                            </div>
                            <br>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="<?php echo base_url() . "assetsadmin/"; ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url() . "assetsadmin/"; ?>js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url() . "assetsadmin/"; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() . "assetsadmin/"; ?>js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() . "assetsadmin/"; ?>js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() . "assetsadmin/"; ?>js/Chart.min.js"></script>
    <script src="<?php echo base_url() . "assetsadmin/"; ?>js/fileinput.js"></script>
    <script src="<?php echo base_url() . "assetsadmin/"; ?>js/chartData.js"></script>
    <script src="<?php echo base_url() . "assetsadmin/"; ?>js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . "ckeditor/"; ?>ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('replycs');
        //var editor = CKEDITOR.replace('detail');
        //var detail = CKEDITOR.instances.editor.getData();
    </script>
    <!-- Loading Scripts -->
    <script>
        function CKupdate() {
            for (instance in CKEDITOR.instance) {
                CKEDITOR.instances[''].updateElement();
            }
        }
    </script>
</body>

</html>