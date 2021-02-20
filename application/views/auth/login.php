<div class="limiter">
    <div class="container-login100" style="background-image: url('<?= base_url('public/assets/login') ?>/images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="<?= base_url() ?>/auth/auth/doLogin" method="post">
                <span class="login100-form-logo">
                    <i class="zmdi zmdi-landscape"></i>
                </span>

                <?php
                if ($this->session->flashdata('message')) { ?>
                    <div class="alert alert-warning alert-dismissible mt-3 fade show" role="alert">
                        <?= $this->session->flashdata('message') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php  }

                if (validation_errors()) { ?>
                    <div class="alert alert-warning alert-dismissible mt-3 fade show" role="alert">
                        <?= validation_errors() ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                <span class="login100-form-title p-b-34 p-t-27">
                    Log in
                </span>

                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                <div class="row">
                    <div class="col-md-5 text-light mt-2 mb-2">
                        Login Sebagai
                    </div>
                    <div class="col-md-7">
                        <div class="wrap-input100 validate-input">
                            <select name="sebagai" id="login_sebagai" class="input100" style="border:0px solid">
                                <option value="user" style="color:black">user</option>
                                <option value="petugas" style="color:black">petugas</option>
                                <option value="admin" style="color:black">admin</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div> -->

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                    <a href="<?= base_url() ?>auth/auth/register" class="login100-form-btn ml-3">
                        register
                    </a>
                </div>


                <!-- <div class="text-center p-t-90">
                        <a class="txt1" href="<?= base_url('public/assets/login') ?>/#">
                            forgot password?
                        </a>
                    </div> -->
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>