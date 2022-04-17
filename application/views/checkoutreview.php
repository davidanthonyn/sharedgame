<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./checkout.php_files/bootstrap.min.css">

    <style>
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }

        #header {
            z-index: 1;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
        }

        .cart {
            color: white;
        }

        #navbarDropdown {
            color: white;
        }

        #cart-item {
            background-color: white;
            color: #2F86A6;
        }
    </style>
    <link rel="stylesheet" href="<?php echo base_url('assets/checkout/checkoutreview.css'); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameController.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <title>
        <?= $title; ?>
    </title>
</head>

<body>
    <img src="<?php echo base_url() . "assets/"; ?>images/SharedGameController.png" width="75" height="75"> <br><br>

    <div class="progress-checkout-container">
        <div class="progress-step-container">
            <div class="step-check"></div>
            <span class="step-title">Shipping</span>
        </div>
        <div class="progress-step-container">
            <div class="step-check"></div>
            <span class="step-title">Payment</span>
        </div>
        <div class="progress-step-container">
            <div class="step-check"></div>
            <span class="step-title">Review</span>
        </div>
    </div>

    <!--
  <script>
  window.onscroll = function() {myFunction()};

  var header = document.getElementById("header");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
  </script>
-->
    <!--
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./checkout.php_files/bootstrap.min(1).css">
    <link rel="stylesheet" href="./checkout.php_files/all.min.css">
    <link rel="stylesheet" href="./checkout.php_files/cart7.css">
    <link rel="stylesheet" href="./checkout.php_files/checkout.css">
      <script src="./checkout.php_files/bootstrap.bundle.min.js.download"></script>
-->

    <form action="<?php echo base_url('checkout/selesai'); ?>" method="post" enctype="multipart/form-data">
        <div class="grid-container">
            <br>
            <div class="col-lg-12 billing">
                <div class="card">
                    <div class="card-body">
                        <h4>Alamat Distribusi</h4>
                        <hr>
                        <div class="modal fade bd-example-modal-lg" id="addresslist" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" style="border-radius: 1rem;">
                                    <div class="modal-header">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php if ($bookingantar != NULL) { ?>
                            <div class="col-sm-9">
                                <label for="floatingInputValue" class="label">Alamat</label>
                                <div class="form-floating mb-3"><input type="text" name="alamat" pattern="[A-Za-z ]{1,}" class="form-control input-field" value="<?php echo $bookingantar['alamat_lengkap']; ?>" required="" readonly></div>
                            </div><br>
                            <div class="col-sm-9">
                                <label for="floatingInputValue" class="label">No. Telp / HP</label>
                                <div class="form-floating mb-3"><input type="text" name="nohp" pattern="[0-9]{1,}" class="form-control input-field" value="<?php echo $bookingantar['no_hp']; ?> / <?php echo $bookingantar['no_hp_dua']; ?>" required="" readonly></div>
                            </div>
                        <?php } else if ($bookingambil != NULL) { ?>
                            <div class="col-sm-9">
                                <label for="floatingInputValue" class="label">Alamat</label>
                                <div class="form-floating mb-3"><input type="text" name="alamat" pattern="[A-Za-z ]{1,}" class="form-control input-field" value="<?php echo $bookingambil['nama_lengkap']; ?>" required="" readonly></div>
                            </div><br>
                            <div class="col-sm-9">
                                <label for="floatingInputValue" class="label">No. Telp / HP</label>
                                <div class="form-floating mb-3"><input type="text" name="nohp" pattern="[0-9]{1,}" class="form-control input-field" value="<?php echo $bookingambil['number_cs']; ?>" required="" readonly></div>
                            </div>
                        <?php }  ?>
                    </div>
                </div>
            </div>
            <br>

            <div class="col-lg-12 method">
                <div class="card">
                    <div class="card-body">
                        <?php if ($bookingantar != NULL) { ?>
                            <div class="shipping-methods">
                                <div class="section-title">
                                    <h4 class="title">Metode Pengiriman</h4>
                                </div>
                                <div class="input-checkbox">
                                    <input type="radio" name="shippingmethod" id="shipping-1" value="GoSend" checked="">
                                    <label for="shipping-1"><strong>GoSend</strong></label>
                                    <div class="caption">
                                        <p>Barang belanja akan dikirim langsung oleh pengantar GoSend.
                                        </p>
                                        <p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?PHP } ?>
                        <br>
                        <div class="payments-methods">
                            <div class="section-title">
                                <h4 class="title">Metode Pembayaran</h4>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="paymentmethod" id="payments-1" value="Bank Transfer" checked="">
                                <label for="payments-1"><strong>Bank Transfer</strong></label>
                                <div class="caption">
                                    <p>Silahkan lakukan pembayaran ke nomor rekening berikut:</p>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th width="30%">Nomor Rekening</th>
                                                <td><?= $rekening['no_rekening_toko']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Atas Nama</th>
                                                <td>PT. SHARING TIME</td>
                                            </tr>
                                            <tr>
                                                <th>Bank</th>
                                                <td><?= $rekening['bank_rekening_toko']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="">
                                        <h4 class="title label">Upload Bukti Pembayaran</h4>
                                        <small class="text-muted">File yang diperbolehkan hanya file gambar berfomat .png, .jpg, &amp; .jpeg.</small><br>
                                        <input type="file" class="inputfile" name="bukti" required="required" accept="image/png, image/jpg, image/jpeg"><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="col-lg-12 review">
                <div class="card">
                    <div class="card-body">
                        <h4>Review Pesanan</h4><br>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-15">
                                    <div style="display:none" class="alert alert-success alert-dismissible mt-3">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong></strong>
                                    </div>
                                    <div class="table-responsive mt-2">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th class="border-0 bg-light pull-left">Produk</th>
                                                    <th class="border-0 bg-light">Tarif Sewa</th>
                                                    <th class="border-0 bg-light">Waktu Sewa</th>
                                                    <th class="border-0 bg-light">Tanggal Awal</th>
                                                    <th class="border-0 bg-light">Tanggal Akhir</th>
                                                    <th class="border-0 bg-light">Total Harga</th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($productcart as $cart) { ?>
                                                <tbody>
                                                    <tr>
                                                        <td class="border-0">
                                                            <input type="hidden" name="rowid" value="<?= $cart->id_detail_cart ?>">
                                                            <div class="pull-left">
                                                                <img src="<?= base_url() . "assets/img/product/" ?><?= $cart->gambar_produk ?>" width="50" height="50">
                                                                <div class="ml-3 d-inline-block align-middle">
                                                                    <h6 class="mb-0"><?= $cart->nama_produk ?></h6><span class="text-muted font-weight-normal font-italic d-block"><small><?php echo $cart->qty_produk
                                                                                                                                                                                            ?> pcs</small></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="border-0">
                                                            Rp <?php echo number_format($cart->tarif_harga, 0, ',', '.'); ?></td>
                                                        <td class="border-0">
                                                            1 Hari </td>
                                                        <td class="border-0" name="plandate" id="plandate">
                                                            <?= $cart->start_plan ?> </td>
                                                        <td class="border-0" name="enddate" id="enddate">
                                                            <?= $cart->finish_plan ?> </td>
                                                        <td class="border-0">Rp <?php echo number_format($cart->tarif_harga *  $cart->qty_produk, 0, ',', '.'); ?></td>

                                                    </tr>
                                                <?php } ?>
                                                <?php
                                                foreach ($totalprice as $total) { ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="text-muted pull-left"><small>Total Harga</small></td>
                                                        <td class="text-muted pull-right"><small>Rp <?php echo number_format($total, 0, ',', '.'); ?></small></td>
                                                        <hr>
                                                        <input type="hidden" name="grandtotal" value="<?php echo $total; ?>">
                                                    </tr>
                                                    <?php if ($bookingantar != NULL) { ?>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>

                                                            <td class="text-muted pull-left"><small>Biaya Pengiriman</small></td>
                                                            <td class="text-muted pull-right"><small>Rp 10.000</small></td>
                                                            <input type="hidden" name="biayapengiriman" value="10000">

                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="pull-left"><b>Total Belanja</b></td>
                                                        <td class="pull-right"><b>Rp <?php echo number_format($total, 0, ',', '.'); ?></b></td>
                                                        <input type="hidden" name="purchasetotal" value="<?php echo $total; ?>">
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="pull-right">
                                                            <input type="submit" name="submit" class="btn btn-primary px-4" style="width:210px;" value="Beli">
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br><br>
    <input type="button" class="btn btn-primary px-4" style="width:210px;position:center;" onclick="window.location.href='<?php echo base_url('checkout/bayar'); ?>';" value="Back">


    <style type="text/css">
        .logotoko {
            border-radius: 10px;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: .9rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .but-ton {
            background-color: transparent;
            border-radius: 3px;
            border: 0;
            color: white;
            min-width: 8rem;
            max-width: 15rem;
            height: 0px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


</body>

</html>