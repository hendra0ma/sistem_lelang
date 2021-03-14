<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pelelangan Online</title>
    <link rel="icon" href="<?= base_url('public/assets/landing_pages') ?>/img/Fevicon.png" type="image/png">
    <link rel="stylesheet" href="<?= base_url('public/assets/landing_pages') ?>/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('public/assets/landing_pages') ?>/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('public/assets/landing_pages') ?>/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('public/assets/landing_pages') ?>/vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('public/assets/landing_pages') ?>/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('public/assets/landing_pages') ?>/vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="<?= base_url('public/assets/landing_pages') ?>/css/style.css">
</head>

<body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area mb-4">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand logo_h" href="<?= base_url('LandingPages/Home') ?>"><img src="<?= base_url('public/assets/landing_pages') ?>/img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="<?= base_url('LandingPages/Home') ?>">Home</a></li>

                            <li class="nav-item"><a class="nav-link" href="<?= base_url('LandingPages/Home/ListBarang') ?>">List Barang</a></li>
                        </ul>

                        <ul class="nav-shop">
                            <li class="nav-item"><a class="button button-header" href="<?= base_url('auth/auth/register') ?>">Register Now</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->