<div class="container">

    <div class="row mt-5">
        <div class="col">
            <!-- Page Heading -->
            <table class="table table-striped table-hover table-responsive">
                <tr>
                    <th>Nama Pemesan</th>
                    <th>Alamat pengiriman</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Batas Pembayaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($invoice as $invoices) : ?>
                    <tr>
                        <td><?= $invoices['nama'] ?></td>
                        <td><?= $invoices['alamat'] ?></td>
                        <td><?= $invoices['tgl_pesan'] ?></td>
                        <td><?= $invoices['batas_byr'] ?></td>
                        <td><?php
                                if ($invoices['kd_status'] == 1) {
                                    echo "Sedang Proses";
                                } else if ($invoices['kd_status'] == 2) {
                                    echo "Sedang di kirim";
                                } else if ($invoices['kd_status'] == 3) {
                                    echo "Barang telah sampai";
                                }
                                $kd_konsumen = $invoices['kd_konsumen'];
                                ?></td>
                        <td><a href="<?= base_url('user/pesanan/') . $invoices["id"]  ?>" class="btn btn-sm btn-primary">detail</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="<?= base_url('user') ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>

</div>