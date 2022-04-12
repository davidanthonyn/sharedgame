<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo base_url('assets/checkout/checkout.css'); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>
        <?= $title; ?>
    </title>
</head>

<body>


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

    <div class="form-container">
        <h2 class="form-title">Payment Details</h2>
        <form action="" class="checkout-form">
            <div class="input-line">
                <label for="rekening">Pilih Rekening</label>

                <select class="selectpicker" name="rekening" required>

                    <?php foreach ($rekening as $listRekening) { ?>

                        <option value="<?php echo $listRekening->id_rekening_toko ?>">

                            <?php echo $listRekening->bank_rekening_toko ?>

                        </option>

                    <?php } ?>
                </select>
            </div>
            <input type="button" value="Lanjutkan">
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