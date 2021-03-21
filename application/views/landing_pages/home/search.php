<?php foreach ($barang as $data) { ?>
    <?php
    $lelang = $this->db->where('id_barang', $data->id_barang)->get('tb_lelang')->result();
    foreach ($lelang as $datas) { ?>
        <div class="col-md-6 col-lg-4">
            <a href="<?= base_url() ?>landingPages/home/show/<?= $datas->id_lelang ?>" class="text-light">
                <div class="card text-center card-product">
                    <div class="card-header">
                        <h4>
                            <?= $data->nama_barang ?>
                        </h4>
                        <img class="img-fluid" src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $data->gambar_barang ?>" alt="">
                    </div>
                    <div class="card-body">

                        <p class="text-light">Rp .
                            <span class="formatHarga">
                                <?= $data->harga_akhir ?>
                            </span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
<?php } ?>