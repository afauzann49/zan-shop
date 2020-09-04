<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <form action="" method="post">
        <input type="hidden" name="kd_brg" value="<?= $barang['kd_brg'] ?>">
        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="kd_kategori">Kode kategori</label>
                    <input type="text" class="form-control" name="kd_kategori" id="kd_kategori" placeholder="Masukkan kode kategori barang" value="<?= $barang['kd_kategori'] ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="nama_brg">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_brg" id="nama_brg" placeholder="Masukkan nama barang" value="<?= $barang['nama_brg'] ?>">
                    <small class="form-text text-danger"><?= form_error('nama_brg') ?></small>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukkan harga barang" value="<?= $barang['harga'] ?>">
                    <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" name="stok" id="stok" placeholder="Masukkan stok barang" value="<?= $barang['stok'] ?>">
                    <small class="form-text text-danger"><?= form_error('stok'); ?></small>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="ukuran">Ukuran</label>
                    <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Masukkan ukuran barang" value="<?= $barang['ukuran'] ?>">
                    <small class="form-text text-danger"><?= form_error('ukuran'); ?></small>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="berat">Berat</label>
                    <input type="text" class="form-control" name="berat" id="berat" placeholder="Masukkan berat barang" value="<?= $barang['berat'] ?>">
                    <small class="form-text text-danger"><?= form_error('berat'); ?></small>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="hidden" class="form-control" name="gambar" id="gambar" value="<?= $barang['gambar'] ?>">
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $barang['deskripsi'] ?></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Ubah barang</button>

    </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->