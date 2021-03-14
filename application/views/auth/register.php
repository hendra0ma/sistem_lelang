<div class="limiter">
    <div class="container-login100" style="background-image: url('<?= base_url('public/assets/login') ?>/images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="" method="post">
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
                <?php  } ?>


                <span class="login100-form-title p-b-34 p-t-27">
                    Register
                </span>


                <span class="badge badge-light" style="color:white;"><?php echo form_error('nama_lengkap'); ?></span>
                <div class="wrap-input100 validate-input" data-validate="isi nama lengkap">
                    <input class="input100" type="text" name="nama_lengkap" placeholder="Nama Lengkap">

                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <span class="badge badge-light" style="color:white;"><?php echo form_error('email'); ?></span>
                <div class="wrap-input100 validate-input" data-validate="isi email">
                    <input class="input100" type="email" name="email" placeholder="email">
                    <span class="focus-input100" data-placeholder="&#xf2bb;"></span>
                </div>
                <span class="badge badge-light" style="color:white;"><?php echo form_error('telp'); ?></span>
                <div class="wrap-input100 validate-input" data-validate="isi nomor hp">
                    <input class="input100" type="number" name="telp" placeholder="nomor hp">
                    <span class="focus-input100" data-placeholder="&#xf2b9;"></span>
                </div>
                <span class="badge badge-light" style="color:white;"><?php echo form_error('username'); ?></span>
                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <span class="badge badge-light" style="color:white;"><?php echo form_error('password'); ?></span>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                <span class="badge badge-light" style="color:white;"><?php echo form_error('passconf'); ?></span>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="passconf" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>



                <!-- <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div> -->

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn mr-2">
                        register
                    </button>
                    <a href="<?= base_url() ?>auth/auth/login" class="login100-form-btn ml-2">Login</a>
                </div>



            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>