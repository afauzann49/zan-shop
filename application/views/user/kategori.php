<div class="container">

    <div class="row mt-4">
        <?php foreach ($barang as $brg) : ?>
            <div class="col-6 col-lg-3 col-md-6 col-sm-6">
                <div class="card h-100">
                    <a href="<?= base_url('user/detail/') . $brg['kd_brg'] ?>"><img class="card-img-top" src="<?= base_url('assets/img/uploads/') . $brg['gambar'] ?>" height="200" height="200"></a>
                    <div class="card-body">
                        <h4 class="card-title text-dark"><b><strong><?= $brg['nama_brg'] ?></strong></b></h4>
                        <h5 class="text-dark">Rp. <?= number_format($brg['harga']) ?></h5>
                        <p class="card-text text-dark"><?= $brg['deskripsi'] ?></p>
                    </div>
                    <?php $harga = $brg['harga'] ?>
                    <div class="card-footer">
                        <a href="<?= base_url('user/detail/') . $brg['kd_brg'] ?>" class="btn btn-sm btn-primary">Detail</a>
                        <?php $harga = $brg['harga'];
                            $nama = $brg['nama_brg'] ?>
                        <!-- <a href="<?= base_url('user/tambah_keranjang/') . $user['kd_konsumen'] . '/' . $brg['kd_brg']  . '/' . $nama . '/' . $harga ?>" class="btn btn-sm btn-warning text-danger ml-1"><i class="fas fa-shopping-cart"></i></a> -->
                        <a href="<?= base_url('user/tambah_keranjang/') . $brg['kd_brg'] ?>" class="btn btn-sm btn-warning text-danger ml-1"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

</div>