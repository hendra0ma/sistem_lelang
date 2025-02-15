<main class="site-main">

    <!--================ Hero banner start =================-->
    <section class="hero-banner">
        <div class="container">
            <div class="row no-gutters align-items-center pt-60px">
                <div class="col-5 d-none d-sm-block">
                    <div class="hero-banner__img">
                        <img class="img-fluid" src="<?= base_url('public/assets/landing_pages') ?>/img/home/hero-banner.png" alt="">
                    </div>
                </div>
                <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                    <div class="hero-banner__content">
                        <h4>Auction is fun</h4>
                        <h1>Browse Our Premium Product</h1>

                        <a class="button button-hero" href="<?= base_url('LandingPages/Home/ListBarang') ?>">Browse Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->
    <section class="section-margin mt-3">
        <div class="owl-carousel owl-theme hero-carousel">
            <?php foreach ($barang as $data) { ?>
                <div class="hero-carousel__slide">
                    <img src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $data->gambar_barang ?>" alt="" class="img-fluid">
                    <a href="<?= base_url() ?>landingPages/home/show/<?= $data->id_lelang ?>" class="hero-carousel__slideOverlay">
                        <h3> <?= $data->nama_barang ?></h3>

                    </a>
                </div>
            <?php } ?>
        </div>
    </section>
    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Trending <span class="section-intro__style">Product</span></h2>
            </div>
            <div class="row">
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
        </div>
    </section>
    <!-- ================ trending product section end ================= -->


    <!-- ================ Subscribe section start ================= -->
    <section class="subscribe-position">
        <div class="container">
            <div class="subscribe text-center">
                <h3 class="subscribe__title">Get Update From Anywhere</h3>
                <p>Bearing Void gathering light light his eavening unto dont afraid</p>
                <div id="mc_embed_signup">
                    <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">
                        <div class="form-group ml-sm-auto">
                            <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '">
                            <div class="info"></div>
                        </div>
                        <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
                        <div style="position: absolute; left: -5000px;">
                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- ================ Subscribe section end ================= -->



</main>