<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('public/assets/dashboard') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('public/assets/dashboard') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public/assets/dashboard') ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url("public/assets/dashboard/datatables/css/datatables.css") ?>">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= base_url('public/assets/dashboard') ?>/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <!-- Messages Dropdown Menu -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-align-left"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="<?= base_url() ?>auth/auth/logout" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">

                                <div class="media-body">

                                    <h3 class="dropdown-item-title">

                                        Logout

                                        <span class="float-right text-sm text-light"><i class="fas fa-sign-out-alt"></i></span>
                                    </h3>


                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url() ?>dashboard/masyarakat/home" class="brand-link">
                <img src="<?= base_url('public/assets/dashboard') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Dashboard Pengguna</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php if ($user->gambar == "") : ?>
                            <img src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/image-default.png" class="img-circle elevation-2" alt="User Image">
                        <?php else : ?>
                            <img src="<?= base_url('public/assets/dashboard') ?>/docs/assets/img/upload/<?= $user->gambar ?>" class="img-circle elevation-2" alt="User Image">
                        <?php endif; ?>
                    </div>
                    <div class="info">
                        <a href="<?= base_url() ?>dashboard/masyarakat/home" class="d-block"><?= $user->nama_lengkap ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-header">Menu Utama</li>
                        <li class="nav-item">

                            <?php if ($this->uri->segment(3) == 'home' && $this->uri->segment(4) == '') : ?>
                                <a href="<?= base_url() ?>dashboard/masyarakat/home" class="nav-link active">
                                <?php else : ?>
                                    <a href="<?= base_url() ?>dashboard/masyarakat/home" class="nav-link">
                                    <?php endif; ?>
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Home
                                    </p>
                                    </a>
                        </li>
                        <li class="nav-item">

                            <?php if ($this->uri->segment(3) == 'home' && $this->uri->segment(4) == 'BarangLelang') : ?>
                                <a href="<?= base_url() ?>dashboard/masyarakat/home/BarangLelang" class="nav-link active">
                                <?php else : ?>
                                    <a href="<?= base_url() ?>dashboard/masyarakat/home/BarangLelang" class="nav-link">
                                    <?php endif; ?>
                                    <i class="nav-icon fas fa-shopping-bag"></i>
                                    <p>
                                        Barang Lelang
                                    </p>
                                    </a>
                        </li>
                        <li class="nav-item">
                            <?php if ($this->uri->segment(3) == 'Lelang') : ?>
                                <a href="<?= base_url() ?>dashboard/masyarakat/Lelang/" class="nav-link active">
                                <?php else : ?>
                                    <a href="<?= base_url() ?>dashboard/masyarakat/Lelang/" class="nav-link">
                                    <?php endif ?>
                                    <i class="nav-icon fas fa-shopping-bag"></i>
                                    <p>
                                        Pelelangan
                                        <i class="fas fa-angle-left right"></i>

                                    </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <?php if ($this->uri->segment(3) == 'Lelang' && $this->uri->segment(4) == '') : ?>
                                                <a href="<?= base_url() ?>dashboard/masyarakat/Lelang/" class="nav-link active">
                                                <?php else : ?>
                                                    <a href="<?= base_url() ?>dashboard/masyarakat/Lelang/" class="nav-link">
                                                    <?php endif ?>
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Buat Lelang</p>
                                                    </a>
                                        </li>
                                        <li class="nav-item">
                                            <?php if ($this->uri->segment(4) == 'listLelangUser') : ?>
                                                <a href="<?= base_url() ?>dashboard/masyarakat/Lelang/listLelangUser/" class="nav-link active">
                                                <?php else : ?>
                                                    <a href="<?= base_url() ?>dashboard/masyarakat/Lelang/listLelangUser/" class="nav-link">
                                                    <?php endif ?>
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Lelang Anda</p>
                                                    </a>
                                        </li>
                                        <li class="nav-item">
                                            <?php if ($this->uri->segment(4) == 'listDataMenang') : ?>
                                                <a href="<?= base_url() ?>dashboard/masyarakat/home/listDataMenang/" class="nav-link active">
                                                <?php else : ?>
                                                    <a href="<?= base_url() ?>dashboard/masyarakat/home/listDataMenang/" class="nav-link">
                                                    <?php endif ?>
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Yang Anda Menangkan</p>
                                                    </a>
                                        </li>
                                    </ul>
                        </li>
                        <li class="nav-item">
                            <?php if ($this->uri->segment(2) == 'Masyarakat') : ?>
                                <a href="<?= base_url() ?>auth/Masyarakat/" class="nav-link active">
                                <?php else : ?>
                                    <a href="<?= base_url() ?>auth/Masyarakat/" class="nav-link">
                                    <?php endif ?>
                                    <i class="nav-icon fas fa-user-cog"></i>
                                    <p>
                                        Profile
                                        <i class="fas fa-angle-left right"></i>

                                    </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <?php if ($this->uri->segment(2) == 'Masyarakat' && $this->uri->segment(3) == 'updateProfile') : ?>
                                                <a href="<?= base_url() ?>auth/Masyarakat/updateProfile" class="nav-link active">
                                                <?php else : ?>
                                                    <a href="<?= base_url() ?>auth/Masyarakat/updateProfile" class="nav-link">
                                                    <?php endif ?>
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>edit Profile</p>
                                                    </a>
                                        </li>
                                        <li class="nav-item">
                                            <?php if ($this->uri->segment(3) == 'updatePass') : ?>
                                                <a href="<?= base_url() ?>auth/Masyarakat/updatePass/" class="nav-link active">
                                                <?php else : ?>
                                                    <a href="<?= base_url() ?>auth/Masyarakat/updatePass/" class="nav-link">
                                                    <?php endif ?>
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Ganti Password</p>
                                                    </a>
                                        </li>

                                    </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">