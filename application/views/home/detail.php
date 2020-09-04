<div class="container">

    <div class="row mt-4 mb-2">
        <div class="col-md-7">
            <div class="card">
                <img src="<?= base_url('assets/img/uploads/') . $barang['gambar'] ?>" class="card-img-top" height="500" width="400">
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <!-- <h5 class="card-title"><?= $barang['nama_brg'] ?></h5>
                    <p class="card-text">Harga : Rp. <?= number_format($barang['harga']) ?></p>
                    <p class="card-text">Stok : <?= number_format($barang['stok']) ?></p>
                    <p class="card-text"><?= $barang['deskripsi'] ?></p> -->
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <td><?= $barang['nama_brg'] ?></td>
                        </tr>
                        <tr>
                            <?php if ($barang['diskon'] > 0) {
                                $harga = $barang['harga'] * $barang['diskon'] / 100;
                                $diskon = $barang['harga'] - $harga; ?>
                                <th>Harga</th>
                                <td><s>Rp. <?= number_format($barang['harga'], 0, ',', '.') ?></s>(- <?= $barang['diskon'] ?>% ) <br>
                                    Rp. <?= number_format($diskon, 0, ',', '.') ?>
                                </td>
                            <?php } else if ($barang['diskon'] <= 0) { ?>
                                <th>Harga</th>
                                <td>Rp. <?= number_format($barang['harga'], 0, ',', '.') ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td><?= $barang['stok'] ?></td>
                        </tr>
                        <tr>
                            <th>Ukuran</th>
                            <td><?= $barang['ukuran'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><?= $barang['deskripsi'] ?></td>
                        </tr>
                    </table>
                    
                    <a href="https://api.whatsapp.com/send?phone=6282111055961&text=Halo%20apakah%20barang%20<?= $barang['nama_brg'] ?>%20tersedia" target="_blank"  class="btn btn-sm btn-success text-white ml-1"><i class="fab fa-whatsapp"></i></a>
                    <a href="<?= base_url('user') ?>" class="btn btn-sm btn-info text-white ml-1">Kembali</a>

                </div>
            </div>
        </div>
    </div>

</div>