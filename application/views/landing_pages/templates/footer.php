<!--================ Start footer Area  =================-->
<footer class="footer">
    <div class="footer-area">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title large_title">Our Mission</h4>
                        <p>
                            Memudahkan pengguna dalam menjual belikan barang yang ingin di jual , dengan metode lelang
                        </p>

                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Quick Links</h4>
                        <ul class="list">
                            <li><a href="<?= base_url('LandingPages/Home/') ?>">Home</a></li>
                            <li><a href="<?= base_url('LandingPages/Home/ListBarang') ?>">list barang</a></li>

                        </ul>
                    </div>
                </div>

                <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Contact Us</h4>
                        <div class="ml-40">
                            <p class="sm-head">
                                <span class="fa fa-location-arrow"></span>
                                Kantor Pusat
                            </p>
                            <p>Jl terusan bejo no 1 a, kota batu</p>

                            <p class="sm-head">
                                <span class="fa fa-phone"></span>
                                Nomor HP
                            </p>
                            <p>
                                0895 6200 87695
                            </p>

                            <p class="sm-head">
                                <span class="fa fa-envelope"></span>
                                Email
                            </p>
                            <p>
                                hendra0maulidan@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->



<script src="<?= base_url('public/assets/dashboard') ?>/docs/assets/plugins/jquery/jquery.js"></script>
<script src="<?= base_url('public/assets/landing_pages') ?>/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('public/assets/landing_pages') ?>/vendors/skrollr.min.js"></script>
<script src="<?= base_url('public/assets/landing_pages') ?>/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="<?= base_url('public/assets/landing_pages') ?>/vendors/nice-select/jquery.nice-select.min.js"></script>
<script src="<?= base_url('public/assets/landing_pages') ?>/vendors/jquery.ajaxchimp.min.js"></script>
<script src="<?= base_url('public/assets/landing_pages') ?>/vendors/mail-script.js"></script>
<script src="<?= base_url('public/assets/landing_pages') ?>/js/main.js"></script>

<script>
    $(document).ready(function() {

        let button = $('button.btn.btn-outline-dark');
        button.on('click', function() {
            console.log($('#keyword').val());
            $.ajax({
                url: "<?= base_url() ?>landingpages/home/caribarang",
                data: {
                    "keyword": $('#keyword').val(),
                },

                type: "post",
                success: function(data) {
                    $('div.row.value-ajax').html(data);
                    console.log(data);
                }
            });
        });
    });
</script>
</body>

</html>