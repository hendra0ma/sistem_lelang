<div class="container mt-3">
    <div class="col-xl-12 col-lg-8 col-md-7">
        <!-- Start Filter Bar -->
        <div class="row mt-2 mb-3">
            <div class="col-8 mt-1">
                <input type="text" placeholder="cari barang" name="keyword" id="keyword" class="form-control">
            </div>
            <div class="col-4 mt-1">
                <button class="btn btn-outline-dark">cari</button>
            </div>
        </div>
        <!-- End Filter Bar -->
        <!-- Start Best Seller -->
        <section class="lattest-product-area pb-40 category-list">

            <div class="row value-ajax">
                <?php foreach ($barang as $data) { ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card text-center card-product">
                            <div class="card-product__img">
                                <img class="card-img" style="height: 200px !important;" src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $data->gambar_barang ?>" alt="">
                                <ul class="card-product__imgOverlay">
                                    <li><a href="<?= base_url() ?>landingPages/home/show/<?= $data->id_lelang ?>"><i class="ti-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <p></p>
                                <h4 class="card-product__title"><a href="#">
                                        <?= $data->nama_barang ?> </a>
                                </h4>
                                <p class="card-product__price"><?= $data->harga_akhir ?></p>
                            </div>
                        </div>
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