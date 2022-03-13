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
                                    <h4 class="text-dark">Reset Password for </h4>
                                    <h5 class="mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
                                </div>
                                <?php
                                if ($this->session->flashdata('message')) {
                                    echo $this->session->flashdata('message');
                                    $this->session->unset_userdata('message');
                                }
                                ?>

                                <form class="user" method="POST" action="<?= base_url('auth/changepassword'); ?>">
                                    <div class="mb-3"><input class="form-control form-control-user" type="password" id="newpassword" placeholder="Enter Password" name="newpassword">
                                        <?= form_error('newpassword', '<small class="text-danger pl-3">', '</small>'); ?></div>
                                    <div class="mb-3">
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="confirmpassword" placeholder="Repeat Password" name="confirmpassword">
                                            <?= form_error('confirmpassword', '<small class="text-danger pl-3">', '</small>'); ?></div>
                                        <div class="mb-3">
                                        </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Change Password</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>