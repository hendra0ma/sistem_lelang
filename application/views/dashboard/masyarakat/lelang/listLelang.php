<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Lelang Yang Anda Buat</h3>
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
                            <th scope="col">Gambar Barang</th>
                            <th scope="col">Tanggal Lelang</th>
                            <th scope="col">Harga Awal</th>
                            <th scope="col">Harga Akhir</th>
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
                                <td>
                                    <a href="#showModal" data-toggle="modal" data-id="<?= $data->id_barang ?>" class="btn btn-sm btn-success lihat-gambar">
                                        Lihat Gambar
                                    </a>
                                </td>
                                <td class="formatTanggal"><?= $data->tgl_lelang ?></td>
                                <td class="formatHarga"><?= $data->harga_awal ?></td>
                                <td class="formatHarga"><?= $data->harga_akhir ?></td>
                                <td><?= $data->status ?></td>
                                <td>
                                    <?php if ($data->status == "ditutup") {
                                    ?>
                                    <?php } else if ($data->status == "dibuka") { ?>
                                        <a href="<?= base_url() ?>dashboard/masyarakat/lelang/cancel/<?= $data->id_lelang ?>/<?= $data->id_barang ?>" class="btn btn-sm btn-danger">
                                            Cancel
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?= base_url() ?>dashboard/masyarakat/lelang/cancel/<?= $data->id_lelang ?>/<?= $data->id_barang ?>" class="btn btn-sm btn-danger">
                                            Cancel
                                        </a>
                                        <a href="<?= base_url() ?>dashboard/masyarakat/lelang/edit/<?= $data->id_lelang ?>" class="btn btn-sm btn-primary">
                                            Edit
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


    <!-- Modal -->
    <div class=" modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <center>
                            <img src="<?= base_url() ?>assets/dashboard/docs/assets/img/image-default.png" alt="Image Admin" class="img-fluid image" style="height:350px !important;border-radius:10px;">
                        </center>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>