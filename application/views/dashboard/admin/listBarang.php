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
            <div class="table-responsive">
                <a href="<?= base_url() ?>dashboard/admin/export/barang" class="btn btn-primary mb-3">Export PDF</a>

                <table class="table table_datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>

                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Harga Awal</th>
                            <th scope="col">Kelipatan</th>
                            <th scope="col">Deskripsi Barang</th>
                            <th>action</th>
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
                                <td class="formatHarga"><?= $data->kelipatan ?></td>
                                <td class="formatHarga"><?= $data->deskripsi_barang ?></td>
                                <td>
                                    <a href="<?= base_url() ?>dashboard/admin/barang/delete/<?= $data->id_barang ?>" class="badge badge-danger" onclick="return confirm('yakin?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>







            </div>
        </div>
    </div>