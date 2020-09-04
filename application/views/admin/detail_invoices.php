<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
        Detail Pesanan <strong> No. Invoices: <?= $invoices['id'] ?></strong>
    </div>

    <table class="table table-bordered table-striped table-hover table-responsive">
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
                <td>Rp.<?= number_format($pes['harga'], 0, ',', '.') ?></td>
                <td>Rp.<?= number_format($subtotal, 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
        <form action="<?= base_url('admin/kirim_barang') ?>" method="post">
            <!-- Tabel Invoice -->
            <input type="hidden" name="id" value="<?= $invoices['id'] ?>">
            <input type="hidden" name="kd_konsumen" value="<?= $invoices['kd_konsumen'] ?>">
            <input type="hidden" name="nama" value="<?= $invoices['nama'] ?>">
            <input type="hidden" name="alamat" value="<?= $invoices['alamat'] ?>">
            <input type="hidden" name="provinsi" value="<?= $invoices['provinsi'] ?>">
            <input type="hidden" name="kota" value="<?= $invoices['kota'] ?>">
            <input type="hidden" name="tgl_pesan" value="<?= $invoices['tgl_pesan'] ?>">
            <input type="hidden" name="batas_byr" value="<?= $invoices['batas_byr'] ?>">
            <!-- End of Invoice -->
    </table>

    <?php if ($invoices['kd_status'] == 1) {  ?>
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ?')">Konfirmasi</button> <br> <br>
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            Pesanan sedang menunggu konfirmasi untuk dikirim
        </div>
        </form>
    <?php } else if ($invoices['kd_status'] == 2) { ?>
        <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
            Pesanan sedang dikirim
        </div>
    <?php } else if ($invoices['kd_status'] == 3) { ?>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            Pesanan telah sampai
        </div>
    <?php } ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->