<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-bag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Barang Di Lelang</span>
                        <span class="info-box-number"><?= $jumlah_barang ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">

                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Lelang Anda</span>
                        <span class="info-box-number"><?= $jumlah_lelang_user ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">

                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-trophy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Yang anda menangkan</span>
                        <?php ?>
                        <span class="info-box-number"><?= $pemenang ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
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
                                profile anda
                            </h3>
                            <!-- card tools -->

                            <!-- /.card-tools -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">

                                    <div class="card">
                                        <div class="card-header text-center">
                                            <a href="#" class="h3"><b>Profile Anda</b></a>
                                        </div>
                                        <div class="card-body" style="display: block;">
                                            <div class="row">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama</th>
                                                        <td><?= $user->nama_lengkap ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>email</th>
                                                        <td><?= $user->email ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>username</th>
                                                        <td><?= $user->username ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>no telpon</th>
                                                        <td><?= $user->telp ?></td>
                                                    </tr>
                                                </table>
                                            </div>
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