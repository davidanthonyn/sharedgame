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
                                    <h4 class="text-dark mb-4">Login Page</h4>
                                </div>

                                <?php if ($this->session->flashdata('messagesuccess')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $this->session->flashdata('messagesuccess'); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->session->flashdata('messagefailed')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $this->session->flashdata('messagefailed'); ?>
                                    </div>
                                <?php endif; ?>

                                <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                                    <div class="mb-3"><input class="form-control form-control-user" type="text" id="email" placeholder="Enter Email Address..." name="email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?></div>
                                    <div class="mb-3"><input class="form-control form-control-user" type="password" id="password" placeholder="Enter Password" name="password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?></div>
                                    <div class="mb-3">
                                    </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                                    <hr>
                                </form>
                                <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                <div class="text-center"><a class="small" href="<?= base_url('auth/registration');
                                                                                ?>">Create an Account!</a></div>
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