<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <table class="table table-bordered table-striped table-hover table-responsive">
        <tr>
            <th>Id Invoices</th>
            <th>Nama Pemesan</th>
            <th>Alamat pengiriman</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($invoices as $inv) : ?>
            <tr>
                <td><?= $inv['id'] ?></td>
                <td><?= $inv['nama'] ?></td>
                <td><?= $inv['alamat'] ?></td>
                <td><?= $inv['tgl_pesan'] ?></td>
                <td><?= $inv['batas_byr'] ?></td>
                <td><?php
                        if ($inv['kd_status'] == 1) {
                            echo "Pesanan masuk";
                        } else if ($inv['kd_status'] == 2) {
                            echo "Sedang dikirim";
                        } else if ($inv['kd_status'] == 3) {
                            echo "Barang telah sampai";
                        }
                        ?></td>
                <td><a href="<?= base_url('invoices/detail/') . $inv['id'] ?>" class="btn btn-sm btn-primary">detail</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->