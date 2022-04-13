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
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script rel="javascript" type="text/javascript" src="<?php echo base_url() . "assetsadmin/";
                                                          ?>js/jquery.min.js"></script>
    <!--
    <link rel="stylesheet" type="text/css" href="<?php //echo base_url() . "assets/cart/cart.css";
                                                  ?>" />
                                                  -->


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
    <script>
      /*
      $(document).ready(function() {
        $('#sewa').change(function() {
          var sewa = $(this).val();

          $.ajax({

            type: 'POST',

            url: "<?php echo base_url('admin/getPriceByAjax') ?>",

            dataType: "JSON",

            data: {
              sewa: sewa
            },

            success: function(data)

            {

              $.each(data, function() {

                $('[name="page_name"]').val(data.page_name);

                $('[name="detail"]').val(data.detail);

                CKupdate();
                CKEDITOR.instances['detail'].setData(detail);

              });

            }



          });

        });

      });*/

      //JSONInPrettyFormat;
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

      .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

      /* @import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap'); */

      * {

        /* font-family: 'Comfortaa', cursive; */

        margin: 0;

        padding: 0;

        box-sizing: border-box;

      }

      .container {

        max-width: 1200px;

        margin: 0 auto;

      }

      .container>h1 {

        padding: 20px 0;

      }

      .cart {

        display: flex;

      }

      .products {

        flex: 0.75;

      }

      .product {

        display: flex;

        width: 100%;

        height: 350px;

        overflow: hidden;

        border: 1px solid silver;

        margin-bottom: 20px;

      }

      .product:hover {

        border: none;

        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);

        transform: scale(1.01);

      }

      .product>img {

        width: 300px;

        height: 240px;

        object-fit: cover;

      }

      .product>img:hover {

        transform: scale(1.04);

      }

      .product-info {

        padding: 20px;

        width: 100%;

        position: relative;

      }

      .product-name,
      .price,
      .product-offer {

        margin-bottom: 20px;

      }

      .product-remove {

        position: absolute;

        bottom: 270px;

        right: 20px;

        padding: 10px 25px;

        background-color: green;

        color: white;

        cursor: pointer;

        border-radius: 5px;

      }

      .product-remove:hover {

        background-color: white;

        color: green;

        font-weight: 600;

        border: 1px solid green;

      }

      .product-update {

        position: absolute;

        bottom: 140px;

        right: 270px;

        padding: 10px 25px;

        background-color: white;

        color: white;

        cursor: pointer;

        border-radius: 5px;

      }

      .product-update:hover {

        background-color: white;

        color: orange;

        font-weight: 600;

        border: 1px solid orange;

      }

      .product-quantity>input {

        width: 40px;

        padding: 5px;

        text-align: center;

      }

      .plan-date>input {

        width: 200px;

        padding: 5px;

        text-align: center;

      }

      .plan-date .end {

        position: relative;

        left: 270px;

        bottom: 46px;

        width: 200px;

        padding: 5px;

        text-align: center;

      }

      .fa {

        margin-right: 5px;

      }

      .cart-total {

        flex: 0.25;

        margin-left: 20px;

        padding: 20px;

        height: 240px;

        border: 1px solid silver;

        border-radius: 5px;

      }

      .cart-total p {

        display: flex;

        justify-content: space-between;

        margin-bottom: 30px;

        font-size: 20px;

      }

      .cart-total a {

        display: block;

        text-align: center;

        height: 40px;

        line-height: 40px;

        background-color: tomato;

        color: white;

        text-decoration: none;

      }

      .cart-total a:hover {

        background-color: red;

      }

      @media screen and (max-width: 700px) {

        .remove {

          display: none;

        }

        .product {

          height: 150px;

        }

        .product>img {

          height: 150px;

          width: 200px;

        }

        .product-name,
        .price,
        .product-offer {

          margin-bottom: 10px;

        }

      }

      @media screen and (max-width: 900px) {

        .cart {

          flex-direction: column;

        }

        .cart-total {

          margin-left: 0;

          margin-bottom: 20px;

        }

      }

      @media screen and (max-width: 1220px) {

        .container {

          max-width: 95%;

        }

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
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
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
        <?php if ($keranjangrow != NULL && $totalitem != NULL) { ?>
          <h4>Produk yang akan disewakan</h4>

          <div class="cart">


            <div class="products">

              <?php foreach ($productcart as $cart) { ?>
                <form class="user" method="POST" id="frm<?= $cart->id_produk ?>" action="<?= base_url('checkout'); ?>">

                  <div class="product">
                    <input type="hidden" name="rowid" value="<?= $cart->id_produk ?>">

                    <img src="<?= base_url() . "assets/img/product/" ?><?= $cart->gambar_produk ?>">

                    <div class="product-info">

                      <h3 class="product-name"><?= $cart->nama_produk ?></h3>


                      <p class="product-price price<?= $cart->id_produk ?>">Rp <?php echo number_format($cart->tarif_harga, 0, ',', '.'); ?> x <?php echo $cart->qty_produk
                                                                                                                                                ?> =</p>
                      <h4 class="subtotal subtotal<?= $cart->id_produk ?>"> Rp <?php echo number_format($cart->tarif_harga *  $cart->qty_produk, 0, ',', '.'); ?></h4>

                      <p class="product-quantity qty<?= $cart->id_produk ?>">Qty <input type="number" id="myNumber" name="myNumber" onchange="updateproduct(<?= $cart->id_produk ?>)" value="<?php echo $cart->qty_produk
                                                                                                                                                                                              ?>" min="1" max="<?php echo $cart->jumlah_tersedia
                                                                                                                                                                                                                ?>" required />

                      <p class="product-offer">Jangka Waktu <select id="sewa" name="sewa">
                          <option value="1">1 Hari</option>
                          <option value="3">3 Hari</option>
                          <option value="7">7 Hari</option>
                        </select>
                      </p>
                      <p class="plan-date">Tanggal Sewa <input class="form-control white_bg" value="<?= $cart->start_plan ?>" name="plandate" id="plandate">
                        <input class="end" class="form-control white_bg" value="<?= $cart->finish_plan ?>" name="enddate" id="enddate" disabled>
                      </p>
                      <script type="text/javascript">
                        flatpickr("#plandate", {
                          minDate: "today",
                          altInput: true,
                          altFormat: "j F Y",
                          dateFormat: "Y-m-d",
                          /*disable: ["2022-04-15", {
                            from: "2022-05-03",
                            to: "2022-05-08"
                          }]*/
                        });

                        flatpickr("#enddate", {
                          minDate: "today",
                          altInput: true,
                          altFormat: "j F Y",
                          dateFormat: "Y-m-d",
                          /*disable: ["2022-04-15", {
                            from: "2022-05-03",
                            to: "2022-05-08"
                          }]*/
                        });
                      </script>


                      <p class="product-remove">

                        <i class="fa fa-trash" aria-hidden="true"></i>

                        <a class="remove" href="<?php echo base_url() . 'cart/delete_cart/' . $cart->id_detail_cart; ?>">Remove</a>


                      </p>
                      <p class="product-update">

                        <a class="update" href="<?php echo base_url() . 'cart/delete_cart/' . $cart->id_detail_cart; ?>">Update</a>
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

                  <span class="grandtotal" id="totalharga" name="totalharga"> Rp <?php echo number_format($total, 0, ',', '.'); ?></span>
                </p>

                <p>
                  <span>Number of Items</span>
                  <span><?php echo $totalitem; ?> </span>
                </p>

                <p>
                  <!--
                  <span>You Save</span>

                  <span>Rp 1,000</span> -->

                </p>
              <?php

              }
              ?>
              <a href="#">Proceed to Checkout</a>
              </form>
            </div>

          </div>

      </div>
    <?php } else { ?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <img src="<?= base_url('assets/images/finding.png') ?>" class="card-img center" width="274" height="400">
            <h4 class="center">Oops!</h4>
            <p class="center">Keranjang Belanja Anda Kosong.</p>
            <hr>
            <p class="mb-0">
              <a href="<?php echo base_url() . 'product'; ?>" class="btn btn-primary center">Cari Produk</a>
            </p>
          </div>
        </div>
      </div>
    <?php
        } ?>
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
      /*
      function change_time() {
        var select = document.getElementById('time');
        var value = select.options[select.selectedIndex].value;

        if (value == "1") {
          document.getElementById('price').value = <?php //echo $tarifsewa[0]['tarif_harga']; 
                                                    ?>;
          document.getElementById('div_content').style.display = 'block';
        } else
        if (value == "3") {
          document.getElementById('price').value = <?php //echo $tarifsewa[1]['tarif_harga']; 
                                                    ?>;
          document.getElementById('div_content').style.display = 'block';
        } else
        if (value == "7") {
          document.getElementById('price').value = <?php //echo $tarifsewa[2]['tarif_harga']; 
                                                    ?>;
          document.getElementById('div_content').style.display = 'block';
        } else {
          document.getElementById('price').value = "";
          document.getElementById('div_content').style.display = 'none';
        }
      }

      function change_quantity() {

      }

      function change_date() {

      }*/
    </script>
    <script>
      function updateproduct(rowid) {
        var qty = $('.qty' + rowid).val();
        var price = $('.price' + rowid).text();
        var subtotal = $('.subtotal' + rowid).text();
        console.log(qty);
        console.log(price);
        console.log(subtotal);

        $.ajax({
          type: "POST",
          url: "<?php echo base_url('cart/edit_quantity'); ?>",
          data: "rowid=" + rowid + "&qty=" + qty,
          success: function(response) {
            $('.subtotal' + rowid).text(response);
            $('.subtotal').each(function() {
              total += parseInt($(this).text());
              $('.grandtotal').text(total);
            });
          }
        });
      }
    </script>

  </body>

  </html>