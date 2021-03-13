<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-center">
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

                <div class="row">
                    <section class="col-lg-12 connectedSortable ui-sortable">

                        <div class="card bg-gradient-dark" style="position: relative; left: 0px; top: 0px;">
                            <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                                <h3 class="card-title">
                                    <span class="fas fa-user mr-1"></span>
                                    Edit Profile
                                </h3>
                                <!-- card tools -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-dark btn-sm" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="card card-outline card-primary">
                                            <div class="card-header text-center">
                                                <a href="http://localhost/sistemLelang/dashboard/petugas/home/" class="h3"><b> Edit Profile</b></a>
                                            </div>
                                            <div class="card-body" style="display: block;">
                                                <form action="<?= base_url() ?>auth/petugas/update/user" method="post" enctype='multipart/form-data'>
                                                    <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Full name" name="nama_petugas" value="<?= $petugas->nama_petugas ?>">
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

                                    <div class="col-md-6">
                                        <center>
                                            <?php if ($petugas->gambar == "") : ?>
                                                <img src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/image-default.png" alt="Image petugas" class="img-fluid image" style="height:350px !important;border-radius:10px;">
                                            <?php else : ?>
                                                <img src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $petugas->gambar ?>" alt="Image petugas" class="img-fluid image" style="height:350px !important;border-radius:10px;">
                                            <?php endif; ?>
                                        </center>

                                    </div>
                                </div>
                            </div>
                    </section>


                    <section class="col-lg-5 connectedSortable ui-sortable">
                        <div class="card bg-gradient-danger" style="position: relative; left: 0px; top: 0px;">
                            <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                                <h3 class="card-title">
                                    <i class="fas fa-key mr-1"></i>
                                    Ganti Password
                                </h3>
                                <!-- card tools -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-danger btn-sm" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header text-center">
                                            <a href="http://localhost/sistemLelang/dashboard/petugas/home/" class="h3"><b>Ganti Password</b></a>
                                        </div>
                                        <div class="card-body" style="display: block;">

                                            <form action="<?= base_url() ?>auth/petugas/update/password" method="post">
                                                <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" placeholder="Password anda" name="passlatest">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-lock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="badge text-danger"></span>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" name="password" placeholder="password baru">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-unlock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="badge text-danger"></span>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" name="passconf" placeholder="konfirmasi password">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-unlock-alt"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="badge text-danger"></span>
                                                <div class="row">
                                                    <div class="col-8">

                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-4">
                                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.form-box -->
                                    </div><!-- /.card -->

                                </div>
                            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>