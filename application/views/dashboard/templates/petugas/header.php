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

                <!-- Messages Dropdown Menu -->
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
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('dashboard/petugas/home') ?>" class="brand-link">
                <div class="image">

                </div>
                <span class="brand-text font-weight-light">Dashboard Petugas</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php if ($petugas->gambar == "") : ?>
                            <img src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/image-default.png" class="img-circle elevation-2" alt="User Image">
                        <?php else : ?>
                            <img src="<?= base_url('public/assets/dashboard') ?>/docs/assets/img/upload/<?= $petugas->gambar ?>" class="img-circle elevation-2" alt="User Image">
                        <?php endif; ?>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $petugas->nama_petugas ?></a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <?php if ($this->uri->segment(3) == 'home' && $this->uri->segment(4) == '') : ?>
                                <a href="<?= base_url() ?>dashboard/petugas/home/" class="nav-link active">
                                <?php else : ?>
                                    <a href="<?= base_url() ?>dashboard/petugas/home/" class="nav-link">
                                    <?php endif; ?>
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                    </a>

                        </li>
                        <li class="nav-item">
                            <?php if ($this->uri->segment(4) == 'listBarang') : ?>
                                <a href="<?= base_url() ?>dashboard/petugas/home/listBarang" class="nav-link active">
                                <?php else : ?>
                                    <a href="<?= base_url() ?>dashboard/petugas/home/listBarang" class="nav-link">
                                    <?php endif; ?>
                                    <i class="nav-icon far fa-image"></i>
                                    <p>
                                        Pendataan Barang
                                    </p>
                                    </a>
                        </li>


                        <li class="nav-item">
                            <?php if ($this->uri->segment(3) == 'lelang') : ?>
                                <a href="<?= base_url() ?>dashboard/petugas/lelang/" class="nav-link active">
                                <?php else : ?>
                                    <a href="<?= base_url() ?>dashboard/petugas/lelang/" class="nav-link">
                                    <?php endif; ?>
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Lelang
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <?php if ($this->uri->segment(3) == 'lelang' && $this->uri->segment(4) == '') : ?>
                                                <a href="<?= base_url() ?>dashboard/petugas/lelang" class="nav-link active">
                                                <?php else : ?>
                                                    <a href="<?= base_url() ?>dashboard/petugas/lelang" class="nav-link">
                                                    <?php endif; ?>
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Menunggu</p>
                                                    </a>
                                        </li>
                                        <li class="nav-item">
                                            <?php if ($this->uri->segment(3) == 'lelang' && $this->uri->segment(4) == 'dibuka') : ?>
                                                <a href="<?= base_url() ?>dashboard/petugas/lelang/dibuka" class="nav-link active">
                                                <?php else : ?>
                                                    <a href="<?= base_url() ?>dashboard/petugas/lelang/dibuka" class="nav-link">
                                                    <?php endif; ?>
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Lelang Berjalan</p>
                                                    </a>
                                        </li>
                                        <li class="nav-item">
                                            <?php if ($this->uri->segment(3) == 'lelang' && $this->uri->segment(4) == 'ditutup') : ?>
                                                <a href="<?= base_url() ?>dashboard/petugas/lelang/ditutup" class="nav-link active">
                                                <?php else : ?>
                                                    <a href="<?= base_url() ?>dashboard/petugas/lelang/ditutup" class="nav-link">
                                                    <?php endif; ?>
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Lelang Tutup</p>
                                                    </a>
                                        </li>


                                    </ul>
                        </li>

                        <li class="nav-header">Menu</li>
                        <li class="nav-item">
                            <?php if ($this->uri->segment(3) == 'update') : ?>
                                <a href="<?= base_url() ?>auth/petugas/update" class="nav-link active">
                                <?php else : ?>
                                    <a href="<?= base_url() ?>auth/petugas/update" class="nav-link">
                                    <?php endif ?>
                                    <i class="nav-icon fas fa-user-cog"></i>
                                    <p>
                                        Edit Profil
                                    </p>
                                    </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">