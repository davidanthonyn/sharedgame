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
    <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/owl.transitions.css" type="text/css">
    <!--slick-slider -->
    <link href="<?php echo base_url() . "assets/"; ?>css/slick.css" rel="stylesheet">
    <!--bootstrap-slider -->
    <link href="<?php echo base_url() . "assets/"; ?>css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="<?php echo base_url() . "assets/"; ?>css/font-awesome.min.css" rel="stylesheet">

    <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/red.css" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameController.png">
    <!-- Google-Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <script type="text/javascript">
      /*function valid() {
        if (document.chngpwd.newemail.value != document.chngpwd.confirmpassword.value) {
          alert("New Password and Confirm Password Field do not match  !!");
          document.chngpwd.confirmpassword.focus();
          return false;
        }
        return true;
      }*/
    </script>
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
            <h1>Update Email</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li>Update Email</li>
          </ul>
        </div>
      </div>
      <!-- Dark Overlay-->
      <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->


    <section class="user_profile inner_pages">
      <!---
      <div class="container">
        <div class="user_profile_info gray-bg padding_4x4_40">
          <div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image">
          </div>
        </div>
      </div>
--->
      <div class="row">
        <div class="col-md-3 col-sm-3">
          <?php include('includes/sidebar.php'); ?>
          <div class="col-md-6 col-sm-8">
            <div class="profile_wrap">
              <form action="<?= base_url('user/updateemail'); ?>" method="post">

                <div class="gray-bg field-title">
                  <h6>Update Email</h6>
                </div>
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
                <div class="form-group">

                  <label class="control-label">Current Email</label>
                  <input class="form-control white_bg" id="currentemail" name="currentemail" type="text" value="<?= $user['email'] ?>" disabled>
                  <?= form_error('currentemail', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div cl <div class=" form-group">
                  <label class="control-label">New Email</label>
                  <input class="form-control white_bg" id="newemail" type="text" name="newemail" value="<?= set_value('newemail'); ?>">
                  <?= form_error('newemail', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label class="control-label">Confirm Password</label>
                  <input class="form-control white_bg" id="confirmpassword" type="password" name="confirmpassword">
                  <?= form_error('confirmpassword', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <label class="control-label">Untuk alasan keamanan, anda akan logout apabila akan mengubah email.</label>
                <div class="form-group">
                  <input type="submit" value="Update Email" name="update" id="submit" class="btn btn-block">

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

  </body>

  </html>