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
  <title><?= $title; ?></title>
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

  <script src="https://kit.fontawesome.com/77d9ac2836.js" crossorigin="anonymous"></script>

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
  <style>
    .dot {
      height: 25px;
      width: 25px;
      border-radius: 50%;
      display: inline-block;
    }
  </style>
</head>

<body>

  <!--Header-->
  <?php //include('includes/header.php'); 
  ?>


  <!--Page Header-->
  <section class="page-header listing_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Game Listing</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li>Game Listing</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

 <!-- /FilterBrand-->
 
   </div>
   
  <!--Listing-->
  <section class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        <form action="<?php echo base_url() . "product/filter" ?>" id="FormLaporan" method="post"> 
     <select name="id_brand" id="brand" class="form-control">
      <option value="0">Show All</option>
        <?php for ($i=0; $i<count($brand); $i++): ?>
      <option value="<?php echo $brand[$i]['id_brand'] ?>"><?php echo $brand[$i]['nama_brand'] ?></option>
      <?php endfor;?> 
     </select>
     <br>
     <button type="submit" class="btn btn-primary">Show Data</button>
    </form> 
        </div>
        <div class="col-md-9">
          <div class="result-sorting-wrapper">
            <div class="sorting-count">

              <?php for ($i = 0; $i < count($produk); $i++) : ?>
                <div class="box">
                  <img src="<?php echo base_url() . "assets/img/product/" . $produk[$i]['gambar_produk']; ?>" alt="" width="200" height="100">


                  <div class="content">
                    <div class="stars">
                      <i class="fas fa-star" style="color:orange"></i>
                      <i class="fas fa-star" style="color:orange"></i>
                      <i class="fas fa-star" style="color:orange"></i>
                      <i class="fas fa-star" style="color:orange"></i>
                      <i class="fas fa-star" style="color:orange"></i>
                    </div>
                    <h3> <a href="<?php echo base_url() . 'product/detail' ?>/<?php echo $produk[$i]['id_produk']; ?>"> <?php echo $produk[$i]['nama_produk']; ?></a> </h3>
                    <span class="dot" style="background-color:<?php echo $produk[$i]['warna_produk']
                                                              ?>;"></span>
                    <div class="price"><?php echo $produk[$i]['warna_produk']; ?> <span> </span> </div>

                    <a> Available </a>
                  </div>
                </div>
                <br>
                <br>
                
              <?php endfor; ?>
              


              <!--Side-Bar-->
              <!--
              <aside class="col-md-3 col-md-pull-9">
                <div class="sidebar_widget">
                  <div class="widget_heading">
                    <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Game </h5>
              </div>


                
              </aside>
            </div>
          </div>
          -->
  </section>
  <!-- /Listing-->

  <!--Footer-->
  <?php //include_once('includes/footer.php'); 
  ?>

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