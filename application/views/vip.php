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
          <h1>Upgrade Account</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li>VIP</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <section class="inner_pages">
      <div class="container">
          <div class="row">
              <div class="col-md-5" style="background-color: #eaeaea; height: 300px;">
                <div style="height: 25px; width: 100%; background-color: grey;"></div>
                <h3 class="text-center">WELCOME BACK!</h3>
                <h3 class="text-center"><?= $_SESSION['nama_lengkap'] ?></h3>
                <u>your Account</u>
                <p>&emsp;<?= $_SESSION['nama_lengkap'] ?></p>
                <p>&emsp;<?= $_SESSION['alamat_lengkap'] ?></p>
                <u>Your Membership : </u>
                <p style="display: inline;"><?= $_SESSION['membership'] ?></p>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-6" style="background-color: #eaeaea;">
                  <p style="background: grey; color: white;">Upgrade Your VIP Member</p>
                  <a href="<?php echo base_url() . 'user/upgrade/1' ?>" style="margin-bottom: 30px;">
                    <h3>1 Month <span Style="display: inline-block; width: 300px;"></span>IDR 0.000</h3>
                  </a>
                  <a href="<?php echo base_url() . 'user/upgrade/6' ?>" style="margin-bottom: 30px;">
                    <h3>6 Month <span Style="display: inline-block; width: 300px;"></span>IDR 0.000</h3>
                  </a>
                  <a href="<?php echo base_url() . 'user/upgrade/12' ?>" style="margin-bottom: 30px;">
                    <h3>12 Month <span Style="display: inline-block; width: 285px;"></span>IDR 0.000</h3>
                  </a>
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
</body>

</html>