<?php
//session_start();
//include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title><?php echo $data[0]['nama_produk']; ?> | SharedGame</title>
  <!--Bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" type="text/css">
  <!--Custome Style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css" type="text/css">
  <!--OWL Carousel slider-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/owl.transitions.css" type="text/css">
  <!--slick-slider -->
  <link href="<?php echo base_url(); ?>/assets/css/slick.css" rel="stylesheet">
  <!--bootstrap-slider -->
  <link href="<?php echo base_url(); ?>/assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <!--FontAwesome Font Style -->
  <link href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css" rel="stylesheet">

  <!-- SWITCHER -->
  <link rel="stylesheet" id="switcher-css" type="text/css" href="<?php echo base_url(); ?>/assets/switcher/css/switcher.css" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/switcher/css/orange.css" title="orange" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/switcher/css/blue.css" title="blue" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/switcher/css/pink.css" title="pink" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/switcher/css/green.css" title="green" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/switcher/css/purple.css" title="purple" media="all" />

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>/assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>/assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>/assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>/assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameController.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>

  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!-- /Header -->

  <!--Page Header-->
  <section class="page-header listing_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Game Listing</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="#">Home</a></li>
          <li>Game Listing</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <!--Listing-->
  <section class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">
          <div class="result-sorting-wrapper">
            <div class="sorting-count">

              <div class="box">
                <img src="<?php echo $data[0]['gambar_produk']; ?>" alt="">
                <div class="content">
                  <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <h3><?php echo $data[0]['nama_produk']; ?></h3>
                  <div class="price"> jumlah : <?php echo $data[0]['jumlah_tersedia']; ?> <span> </span> </div>
                  <div class="price"> Rp 300.000 <span> </span> </div>
                  <a> Available </a>
                </div>
              </div>




            </div>
          </div>
  </section>
  <!-- /Listing-->

  <!--Footer -->
  <?php include('includes/footer.php'); ?>
  <!-- /Footer-->

  <!--Back to top-->
  <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
  <!--/Back to top-->




  <!-- Scripts -->
  <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/interface.js"></script>
  <!--Switcher-->
  <script src="<?php echo base_url(); ?>/assets/switcher/js/switcher.js"></script>
  <!--bootstrap-slider-JS-->
  <script src="<?php echo base_url(); ?>/assets/js/bootstrap-slider.min.js"></script>
  <!--Slider-JS-->
  <script src="<?php echo base_url(); ?>/assets/js/slick.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/owl.carousel.min.js"></script>

</body>

</html>