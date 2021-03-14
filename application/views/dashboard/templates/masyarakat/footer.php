<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0-rc
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('public/assets/dashboard') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('public/assets/dashboard') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('public/assets/dashboard') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('public/assets/dashboard') ?>/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('public/assets/dashboard') ?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url('public/assets/dashboard') ?>/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url('public/assets/dashboard') ?>/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url('public/assets/dashboard') ?>/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('public/assets/dashboard') ?>/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('public/assets/dashboard') ?>/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('public/assets/dashboard') ?>/dist/js/pages/dashboard2.js"></script>
<script src="<?= base_url('public/assets/dashboard/datatables/js/datatables.js') ?>"></script>
</body>


<script>
    $(document).ready(function() {
        $('.table.table_datatable').DataTable();
        setTimeout(function() {
            $('.alert.alert-danger.alert-dismissible.mt-3.fade.show.text-light').fadeOut(500);
        }, 3000);
    });



    $('.btn.btn-sm.btn-success.lihat-gambar').click(function() {
        const id = $(this).data("id");

        $.ajax({
            url: "<?= base_url() ?>dashboard/masyarakat/Lelang/getGambarBarang",
            data: {
                "id": id,
            },
            dataType: "json",
            type: "post",
            success: function(data) {
                const img = data.gambar_barang;
                $('img.img-fluid.image').attr('src', `<?= base_url() ?>./public/assets/dashboard/docs/assets/img/upload/` + img);
            }
        });
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.img-fluid.image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputGroupFile01").change(function() {
        readURL(this);
    });
</script>

</html>