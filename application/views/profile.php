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


              <?= form_open_multipart('user/edit'); ?>
              <div class="form-group">
                <label class="control-label">Reg Date -</label>
                <?= $user['created_at'];
                ?>
              </div>

              <div class="form-group">
                <label class="control-label">Last Update at -</label>
                <?= $user['updated_at'];
                ?>
              </div>

              <div class="form-group">
                <label class="control-label">Nama Lengkap</label>
                <input class="form-control white_bg" name="fullname" value="<?= $user['nama_lengkap'];
                                                                            ?>" id="fullname" type="text">
                <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label class="control-label">Email</label>
                <input class="form-control white_bg" value="<?= $user['email'];
                                                            ?>" name="email" id="email" type="email" readonly>
              </div>
              <div class="form-group">
                <label class="control-label">Nomor HP (08xxx)</label>
                <input class="form-control white_bg" type="text" name="mobilenumber" id="mobilenumber" value="<?= $user['no_hp'];
                                                                                                              ?>" onkeypress="return onlyNumberKey(event)">
                <?= form_error('mobilenumber', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label class="control-label">Nomor HP Cadangan (08xxx) (berbeda dengan Nomor HP Utama)</label>
                <input class="form-control white_bg" type="text" name="mobilenumbertwo" id="mobilenumbertwo" value="<?= $user['no_hp_dua'];
                                                                                                                    ?>" onkeypress="return onlyNumberKey(event)">
                <?= form_error('mobilenumbertwo', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>

              <div class="form-group">
                <label class="control-label">Date of Birth&nbsp;(dd/mm/yyyy)</label>
                <br>
                <input class="form-control white_bg" name="dob" value="<?php $date = $user['tgl_lahir'];


                                                                        echo date("d/m/Y", strtotime($date));
                                                                        ?>" id="dob">




              </div>
              <script type="text/javascript">
                flatpickr("#dob", {
                  minDate: "1980/01/01",
                  maxDate: "2021/12/31",
                  altInput: true,
                  altFormat: "j F Y",
                  dateFormat: "Y-m-d"
                });
              </script>


              <br>
              <div class="form-group">
                <label class="control-label">Alamat Lengkap</label>
                <textarea class="form-control white_bg" name="address" id="address" rows="4"><?= $user['alamat_lengkap'];
                                                                                              ?></textarea>
                <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <hr>
              <br><br>

              <div class="form-group">
                <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
              </form>
            </div>
          </div>
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
  <script>
    function onlyNumberKey(evt) {

      // Only ASCII character in that range allowed
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
      return true;
    }
  </script>

</body>

</html>