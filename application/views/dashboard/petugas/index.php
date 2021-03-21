<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">

                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-bag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Barang</span>
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
                        <span class="info-box-text">Jumlah Lelang</span>

                        <span class="info-box-number"><?= $jumlah_lelang ?></span>
                    </div>
                    <!-- /.info-box-content -->

                </div>
                <!-- /.info-box -->

            </div>
            <!-- /.col -->
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah User</span>
                        <span class="info-box-number"><?= $jumlah_user ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>


        <div class="card mt-3">
            <div class="card-body">
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
                <div class="table-responsive">
                    <table class="table table_datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>

                                <th scope="col">Nama Barang</th>
                                <th scope="col">Tanggal</th>

                                <th scope="col">Harga Awal</th>

                                <th scope="col">Deskripsi Barang</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($barang as $data) : ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $data->nama_barang ?></td>
                                    <td class="formatTanggal"><?= $data->tgl ?></td>
                                    <td class="formatHarga"><?= $data->harga_awal ?></td>

                                    <td><?= $data->deskripsi_barang ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>







                </div>
            </div>

        </div>
    </div>