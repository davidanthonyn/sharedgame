<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <h6>Others</h6>
          <ul>


            <li><a href="<?php echo base_url() . 'other/aboutus' ?>">About Us</a></li>
            <li><a href="<?php echo base_url() . "other/faq"; ?>">FAQs</a></li>
            <li><a href="<?php echo base_url() . 'other/privacypolicy' ?>">Privacy Policy</a></li>
            <li><a href="<?php echo base_url() . 'other/termsofservices' ?>">Terms of Service</a></li>
          </ul>
        </div>

        <div class="col-md-3 col-sm-6">
          <h6>Subscribe Newsletter</h6>
          <div class="newsletter-form">
            <form method="post" action="<?= base_url('home/subscribe'); ?>">
              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control newsletter-input" placeholder="Enter Email Address" />

              </div>
              <button type="submit" name="submit" id="submit" class="btn btn-block">Subscribe <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
            <p class="subscribed-text">*We send great deals and latest auto news to our subscribed users very period.</p>
            <?php echo form_error('email', '<h6>', '</h6>');
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-pull-6">
          <p class="copy-right">Copyright &copy; 2022 PT. Sharing Time.</p>
        </div>
      </div>
    </div>
  </div>
</footer>