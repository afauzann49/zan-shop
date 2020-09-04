<div class="container">

    <div class="row mt-5">
        <div class="col-md-8">

            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    ?>
                    Total belanja anda : Rp. <?= number_format($grand_total, 0, ',', '.') ?>
                    <h5 class="text-danger">Harga belum termasuk ongkir</h5>
            </div>
            <h3>Masukan alamat pengiriman</h3>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="<?= base_url('user/proses_pemesanan') ?>" method="post">
                <input type="hidden" name="kd_konsumen" value="<?= $user['kd_konsumen'] ?>">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama anda" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="provinsi">Provinsi</label>
                </div>
                <select name="provinsi" class="custom-select" id="provinsi">
                    <option selected>
                        <- Pilih provinsi ->
                    </option>
                    <?php foreach ($provinsi as $prov) : ?>
                        <option <?php echo $provinsi_selected == $prov['kd_prov'] ? 'selected="selected"' : '' ?> value="<?= $prov['kd_prov'] ?>"><?= $prov['nama_prov']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="kota">Kota</label>
                </div>
                <select name="kota" class="custom-select" id="kota">
                    <option selected>
                        <-----Pilih kota----->
                    </option>
                    <?php foreach ($kota as $kot) : ?>
                        <option <?php echo $kota_selected == $kot['kd_kota'] ? "selected='selected'" : '' ?> class="<?php echo $kot['kd_prov'] ?>" value="<?= $kot['nama_kota'] ?>"><?= $kot['nama_kota'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="no_telp">No Telepon</label>
                <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan No Telepon anda" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <button type="submit" class="btn btn-sm btn-primary">Pesan</button>
        </div>
    </div>
    </form>
<?php } else { ?>
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        Maaf, keranjang belanja anda masih kosong
    </div>
<?php } ?>


</div>

<script src="<?= base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.chained.min.js') ?>"></script>
<script>
    $("#kota").chained("#provinsi");
</script>