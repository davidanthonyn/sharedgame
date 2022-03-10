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
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/green.css" title="green" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/purple.css" title="purple" media="all" />

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameController.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
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
  <section class="page-header contactus_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Contact Us</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="#">Home</a></li>
          <li>Contact Us</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->
  <!--Pesan berhasil/gagal-->
  <div class="alert alert-success" role="alert" style="text-align:center;">Pesan Anda terkirim. Terima kasih!</div>
  <!--Contact-us-->
  <section class="contact_us section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>Get in touch using the form below</h3>
          <?php //if ($error) { 
          ?><div class="errorWrap"><strong>ERROR</strong>:<?php //echo htmlentities($error); 
                                                          ?> </div><?php //} else if ($msg) { 
                                                                    ?><div class="succWrap"><strong>SUCCESS</strong>:<?php //echo htmlentities($msg); 
                                                                                                                      ?> </div><?php //} 
                                                                                                                                ?>
          <div class="contact_form gray-bg">
            <form class="user" method="POST" action="<?= base_url('contact/kirim'); ?>">
              <div class="form-group">
                <label class="control-label">Nama Lengkap <span>*</span></label>
                <input type="text" name="fullname" class="form-control white_bg" id="fullname" required>
              </div>
              <div class="form-group">
                <label class="control-label">Email <span>*</span></label>
                <input type="email" name="emailaddress" class="form-control white_bg" id="emailaddress" required>
              </div>
              <div class="form-group">
                <label class="control-label">Nomor HP <span>*</span></label>
                <input type="text" name="phonenumber" class="form-control white_bg" id="phonenumber" required>
              </div>
              <div class="form-group">
                <label class="control-label">Kritik/Masukan <span>*</span></label>
                <textarea class="form-control white_bg" name="message" rows="4" id="message" required></textarea>
              </div>
              <div class="form-group">
                <button class="btn" type="submit" name="send" type="submit">Kirim <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <h3>Contact Info</h3>
          <div class="contact_detail">
            <?php

            foreach ($cs as $listCs) { ?>
              <ul>
                <li>
                  <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                  <div class="contact_info_m"><?php echo $listCs->nama_lengkap ?></div>
                </li>
                <li>
                  <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                  <div class="contact_info_m"><a href="tel:<?php echo $listCs->number_cs ?>"><?php echo $listCs->number_cs ?></a></div>
                </li>
                <li>
                  <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                  <div class="contact_info_m"><a href="mailto:<?php echo $listCs->email_cs ?>"><?php echo $listCs->email_cs ?></a></div>
                </li>
              </ul>
            <?php }

            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Contact-us-->

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

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:55 GMT -->

</html>