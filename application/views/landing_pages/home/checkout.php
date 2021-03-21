<div class="product_image_area">
    <div class="container card">
        <div class="card-header">
            <h3>
                Tawar Harga Barang ini
            </h3>
        </div>
        <div class="row card-body">
            <div class="col-lg-6">
                <?php if ($this->session->flashdata('message')) { ?>
                    <div class="alert alert-success alert-dismissible mt-3 fade show text-dark" role="alert">
                        <?= $this->session->flashdata('message') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php  } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger alert-dismissible mt-3 fade show text-dark" role="alert">
                        <ul>
                            <li><?= $this->session->flashdata('error') ?></li>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php  } ?>
                <img class="img-fluid" src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $barang->gambar_barang ?>" alt="">
            </div>
            <div class="col-lg-4 offset-lg-1">

                <div class="s_product_text">
                    <h3><?= $barang->nama_barang ?></h3>

                    <h2 class="formatHarga"><?= $barang->harga_awal ?></h2>
                    <span class="text-danger">
                        kelipatan
                        <span class="formatHarga">
                            <?= $barang->kelipatan ?>
                        </span>
                    </span>
                    <p><?= $barang->deskripsi_barang ?></p>

                    <form action="<?= base_url() ?>dashboard/masyarakat/lelang/penawaran" method="post" class="form-group">
                        <table class="table text-light">
                            <?php
                            $penawar = $this->db->where('id_user', $barang->user_bid)->get('tb_masyarakat')->result();
                            foreach ($penawar as $user) {
                            ?>
                                <tr>
                                    <th>Penawar </th>

                                    <th>
                                        <?= $user->username ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Harga Penawar </th>

                                    <th class="formatHarga">
                                        <?= $barang->harga_akhir ?>
                                    </th>
                                </tr>
                            <?php } ?>
                        </table>
                        <input type="hidden" name="id" value="<?= $barang->id_lelang ?>">
                        <input type="numeric" name="harga_penawaran" required class="form-control" placeholder="harga penawaran anda">
                        <input type="submit" value="Bid Barang" class="btn btn-primary mt-2">
                    </form>

                    <div class="card_area d-flex align-items-center">
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>