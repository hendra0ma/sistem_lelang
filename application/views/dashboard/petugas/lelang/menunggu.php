<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Lelang Menunggu Konfirmasi</h3>
        </div>
        <div class="card-body">
            <a href="<?= base_url() ?>dashboard/petugas/export/lelang" class="btn btn-primary mb-3">Export Semua Data Ke PDF</a>
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

                            <th scope="col">Harga Awal</th>

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

                                <td class="formatHarga"><?= $data->harga_awal ?></td>

                                <td><?= $data->username ?></td>
                                <td><?= $data->nama_petugas ?></td>
                                <td><?= $data->status ?></td>
                                <td>
                                    <?php if ($data->status == "menunggu") { ?>
                                        <!-- <a href="<?= base_url() ?>dashboard/petugas/lelang/accPenawaran/<?= $data->id_lelang ?>" class="btn btn-sm btn-primary">
                                            Accept
                                        </a> -->
                                        <a href="#formAcc<?= $data->id_lelang ?>" data-toggle="modal" class="btn btn-sm btn-primary">
                                            Accept
                                        </a>
                                    <?php } ?>

                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="formAcc<?= $data->id_lelang ?>" tabindex="-1" aria-labelledby="formAccLabel<?= $data->id_lelang ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="formAccLabel<?= $data->id_lelang ?>">Acc</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url() ?>dashboard/petugas/lelang/accPenawaran/<?= $data->id_lelang ?>" method="post">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="Kelipatan">Minimal Kelipatan</label>
                                                    <input type="number" name="kelipatan" class="form-control" id="Kelipatan" placeholder="Kelipatan">
                                                    <div class="badge text-danger"><?= form_error('kelipatan') ?></div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Accept</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>