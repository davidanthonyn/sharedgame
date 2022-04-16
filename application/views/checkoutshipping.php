<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo base_url('assets/checkout/checkout.css'); ?>">
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
    </div><br><br>

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
        <h2 class="form-title">Shipping Details</h2>
        <form method="POST" action="<?php echo base_url('checkout/pilihshipping'); ?>" class="checkout-form">
            <div class="input-line">
                <label for="rekening">Pilih Distribusi</label>

                <select class="form-control selectpicker" name="distribusi" id="distribusi" onchange="change_distribution()" required>

                    <option value="pilih">

                        ---

                    </option>


                    <option value="diambil">

                        Diambil di Toko

                    </option>

                    <option value="dikirim">

                        Dikirim ke Alamat

                    </option>


                </select>

            </div>

            <div id="div_content" style="display: none;">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label>Alamat</label>
                    </div>
                    <br>
                    <textarea type="text" class="form-control textarea" id="address" name="address" readonly="readonly"></textarea>

                </div>
            </div>
            <br>
            <label for="note">Bila Anda memilih untuk dikirim ke alamat, namun ingin mengganti alamat, Anda dapat mengubahnya di halaman <a href="<?php echo base_url('user/edit'); ?>">berikut</a>.
            </label>
            <br>
            <input type="submit" value="Lanjutkan"><br>
            <input type="button" onclick="window.location.href='<?php echo base_url('cart'); ?>';" value="Back">
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

    <!--Distribution Choose -->
    <script>
        function change_distribution() {
            var select = document.getElementById('distribusi');
            var value = select.options[select.selectedIndex].value;
            if (value == "diambil") {
                document.getElementById('address').value = "<?php echo $bookingambil['nama_lengkap']; ?>";
                document.getElementById('div_content').style.display = 'block';
            } else
            if (value == "dikirim") {
                document.getElementById('address').value = "<?php echo $bookingantar['alamat_lengkap']; ?>";
                document.getElementById('div_content').style.display = 'block';
            } else {
                document.getElementById('address').value = "";
                document.getElementById('div_content').style.display = 'none';
            }
        }
    </script>
</body>

</html>