<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul ?> <?= $user['nama'] ?></title>
    <script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>

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

    <!-- wakakakak -->
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar fixed-top mb-3 static-top shadow">

        <a class="navbar-brand" href="<?= base_url('user') ?>">Zan - Shop</a>

        <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <strong>Kategori</strong>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach ($kategori as $kat) : ?>
                        <a class="dropdown-item" href="<?= base_url('user/kategori/') . $kat['kd_kategori'] ?>"><?= $kat['nama_kategori'] ?></a>
                    <?php endforeach; ?>
                </div>
            </li>
        </ul> -->

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

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form action="" method="post" class="form-inline w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="keyword" id="keyword" class="form-control bg-light border-0 small" placeholder="Ketikkan sesuatu..." aria-label="Search" aria-describedby="basi-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <?php $keranjang = $this->cart->total_items() ?>

                <a class="nav-link dropdown-toggle" href="<?= base_url('user/keranjang/') ?>">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge badge-danger badge-counter"><?= $keranjang ?></span>
                </a>
            </li>

            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle text-dark" href="<?= base_url('user/faktur/') . $user['kd_konsumen'] ?>">Pesanan</a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama'] ?></span>
                    <img class="img-profile rounded-circle" width="40" src="<?= base_url('assets/img/profile/') . $user['image'] ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <?php if ($user['role_id'] == 1) : ?>
                        <a class="dropdown-item" href="<?= base_url('admin') ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Admin
                        </a>
                    <?php endif; ?>
                    <a class="dropdown-item" href="<?= base_url('user/profile') ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="<?= base_url('user/keranjang/') . $user['kd_konsumen'] ?>">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Keranjang
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('home/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->