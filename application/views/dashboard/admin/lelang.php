<div class="container">
    <div class="card">
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
            <a href="<?= base_url() ?>dashboard/admin/export/lelang" class="btn btn-primary mb-3">Export PDF</a>
            <div class="table-responsive">
                <table class="table table_datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal lelang</th>
                            <th scope="col">Harga Awal</th>
                            <th scope="col">Harga Akhir</th>
                            <th scope="col">Username Pelelang</th>
                            <th scope="col">Nama Petugas</th>
                            <th scope="col">status</th>
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
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>