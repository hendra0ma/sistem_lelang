<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <?php if ($this->session->flashdata('message')) { ?>
                    <div class="alert alert-success alert-dismissible mt-3 fade show text-light" role="alert">
                        <?= $this->session->flashdata('message') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php  } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger alert-dismissible mt-3 fade show text-light" role="alert">
                        <ul>
                            <li><?= $this->session->flashdata('error') ?></li>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php  } ?>

                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger alert-dismissible mt-3 fade show text-light" role="alert">
                        <?php echo validation_errors(); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php  } ?>

                <div class="card bg-dark  card-outline card-primary" style="position: relative; left: 0px; top: 0px;">
                    <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <span class="fas fa-user mr-1"></span>
                            Edit Profile
                        </h3>
                        <!-- card tools -->

                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">

                                <div class="card">
                                    <div class="card-header text-center">
                                        <a href="#" class="h3"><b> Edit Profile</b></a>
                                    </div>
                                    <div class="card-body" style="display: block;">
                                        <form action="" method="post" enctype='multipart/form-data'>
                                            <input type="hidden" name="id" value="<?= $user->id_user ?>">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Full name" name="nama_lengkap" value="<?= $user->nama_lengkap ?>">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user-tag    "></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="username" name="username" value="<?= $user->username ?>">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user-tag    "></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control" placeholder="email" name="email" value="<?= $user->email ?>">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user-tag    "></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" placeholder="nomor telephone" name="telp" value="<?= $user->telp ?>">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user-tag    "></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <span class="badge text-danger"></span>
                                            <span class="badge text-danger"></span>
                                            <div class="input-group mb-3">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="gambar">
                                                <label class="custom-file-label" for="inputGroupFile01">Pilih Foto</label>
                                                <div class="input-group-append">
                                                </div>
                                            </div>
                                            <span class="badge text-danger"></span>
                                            <div class="row">
                                                <div class="col-8">

                                                </div>
                                                <!-- /.col -->
                                                <div class="col-4">
                                                    <button type="submit" class="btn btn-primary btn-block">submit</button>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.form-box -->
                                </div><!-- /.card -->

                            </div>

                            <div class="col-md-4">
                                <center>
                                    <?php if ($user->gambar == "") : ?>
                                        <img src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/image-default.png" alt="Image Admin" class="img-fluid image" style="border-radius:10px;">
                                    <?php else : ?>
                                        <img src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $user->gambar ?>" alt="Image Admin" class="img-fluid image" style="border-radius:10px;">
                                    <?php endif; ?>
                                </center>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>