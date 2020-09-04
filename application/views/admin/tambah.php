<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <form action="<?= base_url('admin/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="alert alert-secondary" role="alert">
            <?= $kode ?>
        </div>
        <input type="hidden" name="kd_brg" value="<?= $kode ?>">
        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="kd_kategori">Kode kategori</label>
                    <input type="text" class="form-control" name="kd_kategori" id="kd_kategori" placeholder="Masukkan kode kategori barang">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="nama_brg">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_brg" id="nama_brg" placeholder="Masukkan nama barang">
                    <small class="form-text text-danger"><?= form_error('nama_brg') ?></small>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukkan harga barang">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" name="stok" id="stok" placeholder="Masukkan stok barang">
                </div>
            </div>

        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="40" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" name="gambar" id="gambar">
        </div>

        <button type="submit" class="btn btn-primary">Tambah barang</button>

    </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->