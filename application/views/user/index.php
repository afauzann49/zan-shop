<!-- Page Content -->

<div class="row">

    <div class="container mt-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
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
        <div class="row mt-3">

            <?php foreach ($barang as $brg) : ?>
                <div class="col-6 col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card h-100">
                        <a href="<?= base_url('user/detail/') . $brg['kd_brg'] ?>"><img class="card-img-top" src="<?= base_url('assets/img/uploads/') . $brg['gambar'] ?>" height="200" height="200"></a>
                        <div class="card-body">
                            <h4 class="card-title text-dark"><b><strong><?= $brg['nama_brg'] ?></strong></b></h4>
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
                            <!-- <p class="card-text text-dark"><?= $brg['deskripsi'] ?></p> -->
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('user/detail/') . $brg['kd_brg'] ?>" class="btn btn-sm btn-info">Detail</a>
                            <?php if ($brg['stok'] > 0) { ?>
                                <a href="#" data-id="<?= $brg['kd_brg'] ?>" class="btn btn-sm btn-primary text-white ml-1 tampilModalKeranjang" data-toggle="modal" data-target="#keranjang"><i class="fas fa-shopping-cart"></i></a>
                            <?php } else if ($brg['stok'] < 1) { ?>
                                <button type="button" class="btn btn-light">Stok habis</button>
                            <?php } ?>
                            <?php if ($brg['diskon'] > 0) { ?>
                                <a href="#" class="btn btn-sm btn-danger text-white float-right">-<?= $brg['diskon'] ?>%</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Modal Tambah keranjang -->
            <div class="modal fade" id="keranjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Keranjang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('user/tambah_keranjang/') ?>" method="post">
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" name="jumlah" value="1" class="form-control" id="jumlah" placeholder="Jumlah barang">
                                    <input type="hidden" name="kd_brg" id="kd_brg">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of model tambah keranjang -->


        </div>
        <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->