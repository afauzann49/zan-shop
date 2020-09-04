<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul ?></title>

    <!-- Font Awesome -->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/sbhomepage/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/sbhomepage/') ?>css/shop-homepage.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body>

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar fixed-top mb-5 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button> -->
        <a class="navbar-brand" href="<?= base_url('user') ?>">Zan - Shop</a>

        <!-- Topbar Search -->
        <form action="" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" name="keyword" id="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- <li class="nav-item dropdown mb-4 mr-5">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong>Kategori</strong>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php foreach ($kategori as $kat) : ?>
                    <a class="dropdown-item" href="<?= base_url('home/kategori/') . $kat['kd_kategori'] ?>"><?= $kat['nama_kategori'] ?></a>
                <?php endforeach; ?>
            </div>
        </li> -->

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form action="" method="post" class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="keyword" id="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="keyword">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <li>
                <a class="nav-link" href="<?= base_url('home/login') ?>">
                    <span class="mr-2 d-lg-inline text-gray-600 small">Masuk</span>
                </a>
            </li>
            <div class="topbar-divider d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li>
                <a class="nav-link" href="<?= base_url('home/register') ?>">
                    <span class="mr-2 d-lg-inline text-gray-600 small">Daftar</span>
                </a>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->