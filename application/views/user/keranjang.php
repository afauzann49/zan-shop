<div class="container">

    <div class="row mt-5 mb-5">
        <div class="col">
            <table class="table table-striped table-hover">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                </tr>
                <?php $z = 1; ?>
                <?php foreach ($this->cart->contents() as $item) : ?>
                    <tr>
                        <td><?= $z++ ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td align="rigth">Rp. <?= number_format($item['price'], 0, ',', '.') ?></td>
                        <!-- <?php $totharga = $item['harga'] * $item['jumlah'] ?> -->
                        <td align="rigth">Rp. <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4"></td>
                    <td align="rigth">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></td>
                </tr>
            </table>
            <div align="right">
                <a href="<?= base_url('user/hapus_keranjang') ?>" class="btn btn-sm btn-danger">Hapus keranjang</a>
                <a href="<?= base_url('user') ?>" class="btn btn-sm btn-primary">Lanjutkan belanja</a>
                <a href="<?= base_url('user/pembayaran') ?>" class="btn btn-sm btn-success">Beli</a>
            </div>
        </div>
    </div>

</div>