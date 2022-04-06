<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>
    <?= $title; ?>
  </title>
  <!--Bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/style.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/owl.transitions.css" type="text/css">
  <link href="<?php echo base_url() . "assets/"; ?>css/slick.css" rel="stylesheet">
  <link href="<?php echo base_url() . "assets/"; ?>css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="<?php echo base_url() . "assets/"; ?>css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" id="switcher-css" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/switcher.css" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/orange.css" title="orange" media="all" data-default-color="true" />
  <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>switcher/css/red.css" title="red" media="all" />
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
</head>

<body>

  <!-- Banners -->
  <section id="banner" class="banner-section">
    <div class="container">

      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content">
            <h1>
              <?= $bannerbig; ?>
            </h1>
            <p>
              <?= $bannersmall; ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Banners -->

  <!-- Resent Cat-->
  <section class="section-padding gray-bg">
    <div class="container">
      <div class="section-header text-center">
        <h2><?= $boldfonttitle; ?> <span><?= $unboldfonttitle; ?></span></h2>
        <p>
          <?= $smallsentence; ?>
        </p>
      </div>
      <div class="row">

        <!-- Nav tabs -->
        <div class="recent-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">New Game Product</a></li>
          </ul>
        </div>
        <!-- Recently Listed New Cars --><br>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="resentnewcar">

            <?php for ($i = 0; $i < 3; $i++) : ?>

              <div class="col-list-3">
                <div class="recent-car-list">
                  <div class="car-info-box"> <a href="<?php echo base_url() . 'product/detail' ?>/<?php echo $produk[$i]['id_produk']; ?>"><img src="<?php echo $produk[$i]['gambar_produk']; ?>" class="img-responsive" alt="image"></a>
                    <ul>
                      <li><i class="fa fa-car" aria-hidden="true"></i><?php //echo htmlentities($result->FuelType); 
                                                                      ?></li>
                      <li><i class="fa fa-calendar" aria-hidden="true"></i><?php //echo htmlentities($result->ModelYear); 
                                                                            ?> Model</li>
                      <li><i class="fa fa-user" aria-hidden="true"></i><?php //echo htmlentities($result->SeatingCapacity); 
                                                                        ?> seats</li>
                    </ul>
                  </div>
                  <div class="car-title-m">
                    <h6><a href="<?php echo base_url() . 'product/detail' ?>/<?php echo $produk[$i]['id_produk']; ?>"><?php echo $produk[$i]['nama_produk']; ?></a></h6>
                    <span class="price">$<?php //harga //echo htmlentities($result->PricePerDay); 
                                          ?> /Day</span>


                  </div>
                  <div class="inventory_info_m">
                    <p><?= $produk[$i]['warna_produk']; ?></p>
                  </div>
                </div>
              </div>
            <?php endfor; ?>

          </div>
        </div>
      </div>
  </section>
  <!-- /Resent Cat -->



  <!-- Fun Facts-->
  <!---
<section class="fun-facts-section">
  <div class="container div_zindex">
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-calendar" aria-hidden="true"></i>40+</h2>
            <p>Years In Business</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>1200+</h2>
            <p>New Cars For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>1000+</h2>
            <p>Used Cars For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>600+</h2>
            <p>Satisfied Customers</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  --->
  <!-- Dark Overlay-->
  <!---
  <div class="dark-overlay"></div>
</section>
--->
  <!-- /Fun Facts-->

  <!--Testimonial -->
  <section class="section-padding testimonial-section parallex-bg">
    <div class="container div_zindex">
      <div class="section-header white-text text-center">
        <h2>Our Satisfied <span>Customers</span></h2>
      </div>
      <div class="row">
        <div id="testimonial-slider">
          <?php
          /*
          $tid = 1;
          $sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid";
          $query = $dbh->prepare($sql);
          $query->bindParam(':tid', $tid, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) { */ ?>


          <div class="testimonial-m">
            <div class="testimonial-img"> <img src="<?php echo base_url() . "assets/"; ?>assets/images/cat-profile.png" alt="" /> </div>
            <div class="testimonial-content">
              <div class="testimonial-heading">
                <h5><?php /* echo htmlentities($result->FullName); */ ?></h5>
                <p><?php /* echo htmlentities($result->Testimonial); */ ?></p>
              </div>
            </div>
          </div>
          <?php /* }
          } */ ?>



        </div>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Testimonial-->

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
  <script src="<?php echo base_url() . "sweetalert/"; ?>sweetalert2.all.min.js"></script>
  <script src="<?php echo base_url() . "assets/"; ?>js/my-script.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->

</html>