<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
    <?php if ($this->session->flashdata('hapus')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data barang <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col">
            <table class="table table-bordered table-responsive">
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Kode Kategori</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Di buat pada : </th>
                    <th colspan="3">Aksi</th>
                </tr>
                <?php $z = 1; ?>
                <?php foreach ($barang as $brg) : ?>
                    <tr>
                        <td><?= $z++ ?></td>
                        <td><?= $brg['kd_brg'] ?></td>
                        <td><?= $brg['kd_kategori'] ?></td>
                        <td><?= $brg['nama_brg'] ?></td>
                        <td><?= $brg['harga'] ?></td>
                        <td><?= $brg['stok'] ?></td>
                        <td><?= $brg['deskripsi'] ?></td>
                        <td><img src="<?= base_url('assets/img/uploads/') . $brg['gambar'] ?>" height="80" width="80"></td>
                        <td><?= date('d F Y', $brg['date_created']) ?></td>
                        <td><a href="<?= base_url('admin/ubah_barang/') . $brg['kd_brg'] ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>ubah</a></td>
                        <td><a href="<?= base_url('admin/hapus_barang/') . $brg['kd_brg'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ?')"><i class="fas fa-trash"></i>hapus</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->