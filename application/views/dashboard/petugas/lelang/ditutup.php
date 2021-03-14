<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Lelang Di Tutup</h3>
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
                            <th scope="col">Harga akhir</th>
                            <th scope="col">Username Pemenang</th>
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

                                <td><?= $data->harga_akhir ?></td>

                                <td>
                                    <?php
                                    $pemenang = $this->db->where('id_user', $data->user_bid)->get('tb_masyarakat')->result();
                                    foreach ($pemenang as $datas) { ?>
                                        <?= $datas->username ?>
                                    <?php } ?></td>
                                <td><?= $data->nama_petugas ?></td>
                                <td><?= $data->status ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>