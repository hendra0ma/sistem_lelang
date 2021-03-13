<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Lelang Sedang Berjalan</h3>
        </div>
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
                            <th scope="col">Tanggal Lelang</th>
                            <th scope="col">Harga Awal</th>
                            <th scope="col">Harga Akhir</th>
                            <th scope="col">Username Pelelang</th>
                            <th scope="col">Nama Petugas</th>
                            <th scope="col">status</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($lelang as $data) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $data->nama_barang ?></td>
                                <td><?= $data->tgl_lelang ?></td>
                                <td><?= $data->harga_awal ?></td>
                                <td><?= $data->harga_akhir ?></td>
                                <td><?= $data->username ?></td>
                                <td><?= $data->nama_petugas ?></td>
                                <td><?= $data->status ?></td>
                                <td>
                                    <?php if ($data->harga_akhir != "") { ?>
                                        <a href="<?= base_url() ?>dashboard/petugas/lelang/tutupPenawaran/<?= $data->id_lelang ?>" class="btn btn-sm btn-danger">
                                            Tutup
                                        </a>
                                    <?php } ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>