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


                                <?php //$this->session->flashdata('message'); 
                                ?>


                                <form class="user">
                                    <div class="mb-3"><input class="form-control form-control-user" type="text" id="email" placeholder="Enter Email Address..." name="email"></div>
                                    <div class="mb-3"><input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password"></div>
                                    <div class="mb-3">
                                    </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                                    <hr>
                                </form>
                                <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                <div class="text-center"><a class="small" href="<?= base_url('auth/registration');
                                                                                ?>">Create an Account!</a></div>
                                <div class="text-center"><a class="small" href="<?= base_url('home');
                                                                                ?>">Back to Home</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>