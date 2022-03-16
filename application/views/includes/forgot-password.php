<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-5">

                        </div>
                        <div class="col-lg-15">
                            <div class="p-5">
                                <div class="text-center">
                                    <div class="logo"><img src="<?php echo base_url() . "assets/"; ?>images/sharedgame160.png" alt="image" /></a> </div>
                                    <h4 class="text-dark mb-4">Forgot Password</h4>
                                </div>
                                <?php
                                if ($this->session->flashdata('message')) {
                                    echo $this->session->flashdata('message');
                                    $this->session->unset_userdata('message');
                                }
                                ?>

                                <form class="user" method="POST" action="<?= base_url('auth/forgotpassword'); ?>">
                                    <div class="mb-3"><input class="form-control form-control-user" type="text" id="email" placeholder="Enter Email Address..." name="email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?></div>
                                    <div class="mb-3">
                                    </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Reset Password</button>
                                    <hr>
                                </form>

                                <div class="text-center"><a class="small" href="<?= base_url('auth'); ?>">Back to Login</a></div>
                                <div class="text-center"><a class="small" href="<?= base_url('');
                                                                                ?>">Back to Home</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>