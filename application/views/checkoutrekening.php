<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo base_url('assets/checkout/checkoutpayment.css'); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameController.png">
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

    <div class="form-container">
        <h2 class="form-title">Payment Details</h2>
        <form action="<?php echo base_url('checkout/pilihbayar'); ?>" method="POST" class="checkout-form">
            <div class="input-line">
                <label for="rekening">Pilih Pembayaran</label>

                <select class="selectpicker" name="rekening" id="rekening" required>
                    <option value="pilih">---</option>
                    <?php
                    if ($rekening != NULL) {
                        foreach ($rekening as $listRekening) { ?>

                            <option value="<?php echo $listRekening->id_rekening_toko ?>">

                                <?php echo $listRekening->bank_rekening_toko ?>

                            </option>

                    <?php }
                    } ?>
                </select>
            </div>
            <input type="submit" value="Lanjutkan"><br>
            <input type="button" onclick="window.location.href='<?php echo base_url('checkout'); ?>';" value="Back">
        </form>
    </div>
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

</html>