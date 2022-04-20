<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title><?= $title; ?></title>
  <!--Bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/bootstrap.min.css" type="text/css">
  <!--Custome Style -->
  <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/style.css" type="text/css">
  <!--OWL Carousel slider-->
  <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>/css/owl.transitions.css" type="text/css">
  <!--slick-slider -->
  <link href="<?php echo base_url() . "assets/"; ?>css/slick.css" rel="stylesheet">
  <!--bootstrap-slider -->
  <link href="<?php echo base_url() . "assets/"; ?>css/bootstrap-slider.min.css" rel="stylesheet">
  <!--FontAwesome Font Style -->
  <link href="<?php echo base_url() . "assets/"; ?>css/font-awesome.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameController.png">

  <!-- SWITCHER -->
  <link rel="stylesheet" id="switcher-css" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/switcher.css" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/red.css" title="red" media="all" data-default-color="true" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/orange.css" title="orange" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/blue.css" title="blue" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/pink.css" title="pink" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/green.css" title="green" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/purple.css" title="purple" media="all" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameController.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
  <!--Page Header-->
  <section class="page-header profile_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Your Profile</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li>Profile</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->
  <!--Pesan berhasil/gagal-->
  <?php
  if ($this->session->flashdata('datausermessage')) {
    echo $this->session->flashdata('datausermessage');
    $this->session->unset_userdata('datausermessage');
  }
  ?>
  <?php
  if ($this->session->flashdata('otherdata')) {
  ?><?php echo $this->session->flashdata('otherdata');
    $this->session->unset_userdata('otherdata');
    ?><?php }
      ?>

  <section class="user_profile inner_pages">
    <div class="container">
      <!--
      <div class="user_profile_info gray-bg padding_4x4_40">
        <div class="upload_user_logo"> <img src="<?php echo base_url() . "assets/"; ?>images/dealer-logo.jpg" alt="image">
        </div>

        <div class="dealer_info">
          <h5><?php //echo htmlentities($result->FullName); 
              ?></h5>
          <p><?php //echo htmlentities($result->Address); 
              ?><br>
            <?php //echo htmlentities($result->City); 
            ?>&nbsp;<?php //echo htmlentities($result->Country); 
                    ?></p>
        </div>
      </div>
  -->

      <div class="row">
        <div class="col-md-3 col-sm-3">
          <?php include('includes/sidebar.php'); ?>
          <div class="col-md-6 col-sm-8">
            <div class="profile_wrap">
              <h5 class="uppercase underline">Your Profile</h5>
              <?php
              if ($this->session->flashdata('message')) {
              ?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo $this->session->flashdata('message');
                                                                  $this->session->unset_userdata('message');
                                                                  ?> </div><?php }
                                                                            ?>
              <?php
              if ($this->session->flashdata('message_error')) {
              ?>
                <div class="errorWrap"><strong>ERROR</strong> : <?php echo $this->session->flashdata('message_error');
                                                                $this->session->unset_userdata('message_error');
                                                                ?> </div><?php }
                                                                          ?>


              <?= form_open_multipart('user/upload_identity'); ?>
              <div class="form-group">
                <label class="control-label">Status KTP -</label>
                <?php if ($identity['foto_selfie_ktp'] != "") { ?>
                  <?= $identity['status_ktp'];
                  ?>
                <?php } else { ?>
                  Belum
                <?php } ?>
              </div>

              <?php if ($identity['status_ktp'] == "ditolak" && ($identity['note_user'] != NULL || $identity['note_user'] != "")) { ?>
                <label class="control-label">Mohon Maaf KTP Anda ditolak, dengan alasan : <?php echo $identity['note_user']; ?></label><br>
              <?php } ?><br>
              <div class="form-group row">
                <label class="control-label">KTP</label><br>
                <div class="col-sm-1">
                  <div class="row">
                    <div class="col-sm-3">
                      <?php if ($identity['foto_ktp'] != NULL) { ?>
                        <img src="<?= base_url('assets/img/ktp/') . $identity['foto_ktp']; ?>" class="card-img" width="200" height="200">
                    </div>
                  <?php } ?>
                  </div class="col-sm-1">
                  <div class="custom-file">
                    <br>
                    <?php if ($identity['status_ktp'] != "diterima") { ?>
                      <input type="file" class="custom-file-input" id="ktp" name="ktp">
                      <label class="custom-file-label" for="ktp"></label>
                    <?php } ?>


                  </div>
                  <br><br>
                  <!--<p>Anda hanya dapat mengupload satu kali, setelah menekan Save Changes.</p>-->

                  <hr>
                  <div class="form-group row">
                    <label class="control-label">Selfie KTP</label>
                    <div class="col-sm-1">
                      <div class="row">
                        <div class="col-sm-3">
                          <?php if ($identity['foto_selfie_ktp'] != NULL) { ?>
                            <img src="<?= base_url('assets/img/ktp/') . $identity['foto_selfie_ktp']; ?>" class="card-img" width="150" height="150">
                        </div>
                      <?php } ?>
                      </div class="col-sm-1">
                      <div class="custom-file">
                        <br>
                        <?php if ($identity['status_ktp'] != "diterima") { ?>
                          <input type="file" class="custom-file-input" id="selfiektp" name="selfiektp">
                          <label class="custom-file-label" for="selfiektp"></label>
                        <?php } ?>
                        <!--
                    <label class="control-label">Anda hanya dapat mengupload satu kali, setelah menekan Save Changes.</label>

                    <label class="control-label">Sedang diverifikasi.</label>

                    <label class="control-label">Dinyatakan valid.</label>

                    <label class="control-label">Non-Customer</label>
                      -->



                      </div>
                    </div>
                  </div>
                  <hr>
                  <br><br>

                  <div class="form-group">
                    <?php if ($identity['status_ktp'] != "diterima") { ?>
                      <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                    <?php } ?>
                  </div>
                  </form>

                </div>
              </div>
              <labelDengan class="control-label">Dengan mensubmit KTP dan Selfie KTP anda, Anda menyatakan setuju dengan Syarat & Ketentuan SharedGame.</label>
            </div>

          </div>

  </section>
  <!--/Profile-setting-->


  <!--Back to top-->
  <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
  <!--/Back to top-->

  <!-- Scripts -->
  <script src="<?php echo base_url() . "assets/"; ?>js/jquery.min.js"></script>
  <script src="<?php echo base_url() . "assets/"; ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() . "assets/"; ?>js/interface.js"></script>
  <!--Switcher-->
  <script src="<?php echo base_url() . "assets/"; ?>switcher/js/switcher.js"></script>
  <!--bootstrap-slider-JS-->
  <script src="<?php echo base_url() . "assets/"; ?>js/bootstrap-slider.min.js"></script>
  <!--Slider-JS-->
  <script src="<?php echo base_url() . "assets/"; ?>js/slick.min.js"></script>
  <script src="<?php echo base_url() . "assets/"; ?>js/owl.carousel.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    /*var date = new Date();
  var year = date.getFullYear();
  var month = String(date.getMonth() + 1).padStart(2, '0');
  var todayDate = String(date.getDate()).padStart(2, '0');
  var datePattern = year + '-' + month + '-' + todayDate;
  document.getElementById("dob").value = datePattern;*/
  </script>

</body>

</html>