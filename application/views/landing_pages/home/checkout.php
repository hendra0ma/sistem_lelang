<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
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

                <div class="owl-carousel owl-theme s_Product_carousel owl-loaded owl-drag">

                    <!-- <div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div> -->
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-872px, 0px, 0px); transition: all 0s ease 0s; width: 2180px;">
                            <div class="owl-item cloned" style="width: 436px;">
                                <div class="single-prd-item">
                                    <img class="img-fluid" src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $barang->gambar_barang ?>" alt="">
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 436px;">
                                <div class="single-prd-item">
                                    <img class="img-fluid" src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $barang->gambar_barang ?>" alt="">
                                </div>
                            </div>
                            <div class="owl-item active" style="width: 436px;">
                                <div class="single-prd-item">
                                    <img class="img-fluid" src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $barang->gambar_barang ?>" alt="">
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 436px;">
                                <div class="single-prd-item">
                                    <img class="img-fluid" src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $barang->gambar_barang ?>" alt="">
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 436px;">
                                <div class="single-prd-item">
                                    <img class="img-fluid" src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $barang->gambar_barang ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">

                <div class="s_product_text">
                    <h3><?= $barang->nama_barang ?></h3>

                    <h2><?= $barang->harga_akhir ?></h2>

                    <p><?= $barang->deskripsi_barang ?></p>

                    <form action="<?= base_url() ?>dashboard/masyarakat/lelang/penawaran" method="post" class="form-group">
                        <table class="table text-dark">
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