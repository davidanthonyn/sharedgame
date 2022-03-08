<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="<?php echo base_url() . '' ?>"><img src="assets/images/sharedgame160.png" alt="image" /></a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets">
              <?php

              $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

              if ($this->session->userdata('email')) {
              ?>
                <br><br><br>
                <p>Selamat datang, <?= $data['user']['nama_lengkap']; ?></p>
              <?php
              } else {
              ?>
                <div class="login_btn"> <a href="<?php echo base_url() . 'auth' ?>" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav id="navigation_bar" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="header_wrap">
          <div class="user_login">
            <ul>
              <?php if ($this->session->userdata('email')) { ?>
                <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <?= $data['user']['nama_lengkap']; ?>

                  </a>
                  <ul class="dropdown-menu">
                    <?php
                    //Khusus admin, ada pilihan admin page
                    if ($data['user']['id_role'] == 1) {
                    ?>
                      <li><a href="<?php echo base_url() . 'admin' ?>">Admin Page</a></li>
                    <?php
                    }
                    ?>

                    <li><a href="profile.php">Profile Settings</a></li>
                    <li><a href="update-password.php">Update Password</a></li>
                    <li><a href="my-booking.php">My Booking</a></li>
                    <li><a href="post-testimonial.php">Post a Testimonial</a></li>
                    <li><a href="my-testimonials.php">My Testimonial</a></li>
                    <li><a href="<?php echo base_url() . 'auth/logout' ?>">Sign Out</a></li>
                  <?php } ?>
                  </ul>
                </li>
            </ul>
          </div>
          <div class="header_search">
            <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
            <form action="#" method="get" id="header-search-form">
              <input type="text" placeholder="Search..." class="form-control">
              <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
        <div class="collapse navbar-collapse" id="navigation">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url() . '' ?>">Home</a> </li>

            <li><a href="<?php echo base_url() . 'Product' ?>">Product</a>

            <li><a href="<?php echo base_url() . 'Faq' ?>">FAQ</a></li>

            <li><a href="<?php echo base_url() . 'Contact' ?>">Contact Us</a></li>


            <!---
          <li><a href="page.php?type=aboutus">About Us</a></li>
          <li><a href="car-listing.php">Game Listing</a>
          <li><a href="page.php?type=faqs">FAQs</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>
--->
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navigation end -->

</header>