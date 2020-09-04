<div class="container">

    <div class="row mt-5 mb-2">
        <div class="col">
            <table class="table table-striped table-hover table-responsive">
                <tr>
                    <th>Id barang</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Pesanan</th>
                    <th>Harga Satuan</th>
                    <th>Sub-Total</th>
                </tr>
                <?php $total = 0; ?>
                <?php foreach ($pesanan as $pes) :
                    $subtotal = $pes['harga'] * $pes['jumlah'];
                    $total += $subtotal;
                    ?>
                    <tr>
                        <td><?= $pes['kd_brg'] ?></td>
                        <td><?= $pes['nama_brg'] ?></td>
                        <td><?= $pes['jumlah'] ?></td>
                        <td><?= number_format($pes['harga'], 0, ',', '.') ?></td>
                        <td><?= number_format($subtotal, 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <?php if ($invoices['kd_status'] == 1) {  ?>
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    Pesanan sedang di proses
                </div>
            <?php } else if ($invoices['kd_status'] == 2) { ?>
                <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
                    Pesanan sedang dikirim
                </div>
                <h4>Klik Konfirmasi bila barang telah sampai</h4>
                <form action="<?= base_url('user/terima_barang') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $invoices['id'] ?>">
                    <input type="hidden" name="kd_konsumen" value="<?= $invoices['kd_konsumen'] ?>">
                    <input type="hidden" name="nama" value="<?= $invoices['nama'] ?>">
                    <input type="hidden" name="alamat" value="<?= $invoices['alamat'] ?>">
                    <input type="hidden" name="provinsi" value="<?= $invoices['provinsi'] ?>">
                    <input type="hidden" name="kota" value="<?= $invoices['kota'] ?>">
                    <input type="hidden" name="tgl_pesan" value="<?= $invoices['tgl_pesan'] ?>">
                    <input type="hidden" name="batas_byr" value="<?= $invoices['batas_byr'] ?>">
                    <button type="submit" name="submit" class="btn btn-sm btn-info" onclick="return confirm('Yakin ?')">Konfirmasi</button>
                </form>
            <?php } else if ($invoices['kd_status'] == 3) { ?>
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    Pesanan telah sampai
                </div>
            <?php } ?>
        </div>
    </div>

</div>