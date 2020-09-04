<div class="container">

    <div class="row mt-4">
        <?php foreach ($barang as $brg) : ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <a href="<?= base_url('user/detail/') . $brg['kd_brg'] ?>"><img class="card-img-top" src="<?= base_url('assets/img/uploads/') . $brg['gambar'] ?>" height="200" height="200"></a>
                    <div class="card-body">
                        <h4 class="card-title text-dark"><b><strong><?= $brg['nama_brg'] ?></strong></b></h4>
                        <h5 class="text-dark">Rp. <?= number_format($brg['harga']) ?></h5>
                        <p class="card-text text-dark"><?= $brg['deskripsi'] ?></p>
                    </div>
                    <?php $harga = $brg['harga'] ?>
                    <div class="card-footer">
                        <a href="<?= base_url('home/detail/') . $brg['kd_brg'] ?>" class="btn btn-sm btn-primary">Detail</a>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

</div>