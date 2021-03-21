<div class="container card mt-3">
    <div class="card-header">
        <h3>
            Barang yang Sedang di Lelang
        </h3>
    </div>
    <div class=" card-body col-xl-12 col-lg-8 col-md-7">
        <!-- Start Filter Bar -->
        <div class="row mt-2 mb-3">
            <div class="col-8 mt-1">
                <input type="text" placeholder="cari barang" name="keyword" id="keyword" class="form-control border-light">
            </div>
            <div class="col-4 mt-1">
                <button class="btn btn-outline-light cari">cari</button>
            </div>
        </div>
        <!-- End Filter Bar -->
        <!-- Start Best Seller -->
        <section class="lattest-product-area pb-40 category-list">

            <div class="row value-ajax">
                <?php foreach ($barang as $data) { ?>
                    <div class="col-md-6 col-lg-4">
                        <a href="<?= base_url() ?>dashboard/masyarakat/home/show/<?= $data->id_lelang ?>" class="text-light">
                            <div class="card text-center card-product">
                                <div class="card-header">
                                    <h4>
                                        <?= $data->nama_barang ?>
                                    </h4>
                                    <img class="img-fluid" src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $data->gambar_barang ?>" alt="">
                                </div>
                                <div class="card-body">

                                    <p class="text-light ">Rp .
                                        <span class="formatHarga">
                                            <?= $data->harga_akhir ?>
                                        </span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </section>
        <!-- End Best Seller -->
    </div>
</div>
</div>
</section>
<!-- ================ category section end ================= -->
</div>