    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg d-none d-lg-flex">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Registration Page</h4>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('auth/registration'); ?>">
                                    <div class="mb-3"><input class="form-control form-control-user" type="text" id="name" placeholder="Nama Lengkap" name="name" value="<?= set_value('name'); ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?></div>
                                    <div class="mb-3"><input class="form-control form-control-user" type="text" id="email" placeholder="Alamat Email" name="email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?></div>
                                    <div class=" row mb-3">
                                        <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="password1" placeholder="Password" name="password1">
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?></div>
                                        <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="password2" placeholder="Repeat Password" name="password2">
                                        </div>
                                    </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Register Account</button>
                                    <hr>
                                </form>
                                <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                <div class="text-center"><a class="small" href="<?= base_url('auth');
                                                                                ?>">Already have an account? Login!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>