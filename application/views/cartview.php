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
    <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?php echo base_url() . "assets/"; ?>assets/switcher/css/purple.css" title="purple" media="all" />

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() . "assets/"; ?>images/favicon-icon/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameController.png">
    <!-- Google-Font-->
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/cart/"; ?>cart.css">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
      /*function valid() {
        if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
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

      /*
      #cart-container table {
        border-collapse: collapse;
        width: 100%;
        table-layout: fixed;
      }

      #cart-container table thead {
        font-weight: 700;
      }

      #cart-container table thead td {
        background: #fd8c66;
        color: #fff;
        border: none;
        padding: 6px;
      }*/
    </style>
  </head>

  <body>
    <!--Page Header-->
    <section class="page-header profile_page">
      <div class="container">
        <div class="page-header_wrap">
          <div class="page-heading">
            <h1>Shopping Cart</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Cart</li>
          </ul>
        </div>
      </div>
      <!-- Dark Overlay-->
      <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <!--
    <section class="user_profile inner_pages">
      
      <div class="container">
        <div class="user_profile_info gray-bg padding_4x4_40">
          <div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image">
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="col-md-6 col-sm-8">
          <div class="profile_wrap">
            <section id="cart-container" class="container my-5">
              <table width="100%">
                <thead>
                  <tr>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Days</td>
                    <td>Start</td>
                    <td>End</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><img src="./assets/img/product/Screenshot_(6).png" alt=""></td>
                    <td>
                      <h5>Kucing</h5>
                    </td>
                    <td>
                      <h5>3</h5>
                    </td>
                    <td>
                      <h5>01/01/2000</h5>
                    </td>
                    <td>
                      <h5>31/12/2000</h5>
                    </td>
                    <td>
                      <h5>200000</h5>
                    </td>
                    <td><input class="w-25 pl-1" value="1" type="number"></td>
                    <td>
                      <h5>200000</h5>
                    </td>
                    <td><a href="#"><i class="fa fa-trash"></i></a></td>
                  </tr>
                </tbody>
              </table>
            </section>
          </div>
        </div>
      </div>
    </div>
    </section>
    -->

    <!--Pesan berhasil/gagal-->
    <?php
    if ($this->session->flashdata('message')) {
      echo $this->session->flashdata('message');
      $this->session->unset_userdata('message');
    }
    ?>
    <?php
    if ($this->session->flashdata('message_error')) {
    ?><?php echo $this->session->flashdata('message_error');
      $this->session->unset_userdata('message_error');
      ?><?php }
        ?>

    <section class="user_profile inner_pages">
      <div class="container">

        <h4>Produk yang akan disewakan</h4>

        <div class="cart">


          <div class="products">

            <?php foreach ($productcart as $cart) { ?>
              <div class="product">

                <img src="<?= base_url() . "assets/img/product/" ?><?= $cart->gambar_produk ?>">

                <div class="product-info">

                  <h3 class="product-name"><?= $cart->nama_produk ?></h3>


                  <h4 class="product-price">Rp. <?php echo number_format($cart->tarif_harga, 0, ',', '.'); ?></h4>


                  <h4 class="product-offer">Lama Sewa <select id="sewa" name="sewa" onchange="change_time()">
                      <option value="volvo">1 Hari</option>
                      <option value="saab">3 Hari</option>
                      <option value="opel">7 Hari</option>
                    </select></h4>


                  <p class="product-quantity">Qnt: <input type="number" id="myNumber" value="1" min="1" max="<?php //echo $data[0]['jumlah_tersedia']; 
                                                                                                              ?>" required />


                  <p class="product-remove">

                    <i class="fa fa-trash" aria-hidden="true"></i>

                    <a class="remove" href="<?php echo base_url() . 'cart/delete_cart/' . $cart->id_detail_cart; ?>">Remove</a>

                  </p>

                </div>

              </div>
            <?php }

            ?>

          </div>

          <div class="cart-total">
            <?php
            foreach ($totalprice as $total) { ?>
              <p>

                <span>Total Price</span>

                <span> Rp <?php echo number_format($total, 0, ',', '.'); ?></span>
              </p>

              <p>

                <span>Number of Items</span>
                <span><?= $numrowcart;
                      ?></span>
              </p>

              <p>

                <span>You Save</span>

                <span>Rp 1,000</span>

              </p>
            <?php
            }
            ?>
            <a href="#">Proceed to Checkout</a>

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

    <script>
      function change_time() {
        var select = document.getElementById('time');
        var value = select.options[select.selectedIndex].value;

        if (value == "1") {
          document.getElementById('price').value = <?php echo $tarifsewa[0]['tarif_harga']; ?>;
          document.getElementById('div_content').style.display = 'block';
        } else
        if (value == "2") {
          document.getElementById('price').value = <?php echo $tarifsewa[1]['tarif_harga']; ?>;
          document.getElementById('div_content').style.display = 'block';
        } else
        if (value == "3") {
          document.getElementById('price').value = <?php echo $tarifsewa[2]['tarif_harga']; ?>;
          document.getElementById('div_content').style.display = 'block';
        } else {
          document.getElementById('price').value = "";
          document.getElementById('div_content').style.display = 'none';
        }
      }
    </script>

  </body>

  </html>