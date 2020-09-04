<!-- Page Content -->

<div class="row">

    <div class="container mt-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/img/slider4.jpg') ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Haus ?</h5>
                        <p>Ya minum dong</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/img/slider3.jpg') ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Haus ?</h5>
                        <p>Ya minum dong</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/img/slider6.jpg') ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Haus ?</h5>
                        <p>Ya minum dong</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="col mt-3">
            <?php if (empty($barang)) : ?>
                <div class="alert alert-danger text-center" role="alert">Data barang tidak ditemukan</div>
            <?php endif; ?>
        </div>
        <div class="row mt-3">

            <?php foreach ($barang as $brg) : ?>
                <div class="col-6 col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card h-100">
                        <a href="<?= base_url('home/detail/') . $brg['kd_brg'] ?>"><img class="card-img-top" src="<?= base_url('assets/img/uploads/') . $brg['gambar'] ?>" height="200" height="200"></a>
                        <div class="card-body">
                            <h4 class="card-title"><?= $brg['nama_brg'] ?></h4>
                            <?php
                                if ($brg['diskon'] > 0) {
                                    $harga = $brg['harga'] * $brg['diskon'] / 100;
                                    $diskon = $brg['harga'] - $harga; ?>
                                <s class="text-danger">
                                    <h5 class="text-danger">Rp. <?= number_format($brg['harga'], 0, ',', '.') ?></h5>
                                </s>(-<?= $brg['diskon'] ?>%)
                                <h5 class="text-dark">Rp. <?= number_format($diskon, 0, ',', '.') ?></h5>
                            <?php } else if ($brg['diskon'] <= 0) { ?>
                                <h5 class="text-dark">Rp. <?= number_format($brg['harga'], 0, ',', '.') ?></h5>
                            <?php } ?>
                            <p class="card-text"><?= $brg['deskripsi'] ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('home/detail/') . $brg['kd_brg'] ?>" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
        <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->