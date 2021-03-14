<?php foreach ($barang as $data) { ?>
    <?php
    $lelang = $this->db->where('id_barang', $data->id_barang)->get('tb_lelang')->result();
    foreach ($lelang as $datas) { ?>
        <div class="col-md-6 col-lg-4">
            <div class="card text-center card-product">
                <div class="card-product__img">
                    <img class="card-img" style="height: 200px !important;" src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $data->gambar_barang ?>" alt="">
                    <ul class="card-product__imgOverlay">
                        <li><a href="<?= base_url() ?>landingPages/home/show/<?= $datas->id_lelang ?>"><i class="ti-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <p></p>
                    <h4 class="card-product__title"><a href="#">
                            <?= $data->nama_barang ?> </a>
                    </h4>


                    <p class="card-product__price"><?= $datas->harga_akhir ?></p>

                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>