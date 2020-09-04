<!doctype html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">

    <title><?= $judul ?></title>
</head>

<body>

    <div class="container">

        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <?= $this->session->flashdata('message') ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Registrasi</h5>
                        <form action="<?= base_url('home/register') ?>" method="post">
                            <input type="hidden" name="kd_konsumen" value="<?= $kode_kon ?>">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" value="<?= set_value('nama') ?>">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email') ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password1">Password</label>
                                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukkan Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password2">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="provinsi">Provinsi</label>
                                        </div>
                                        <select name="provinsi" class="custom-select" id="provinsi">
                                            <option selected>
                                                <--Pilih provinsi-->
                                            </option>
                                            <?php foreach ($provinsi as $prov) : ?>
                                                <option <?php echo $provinsi_selected == $prov['kd_prov'] ? 'selected="selected"' : '' ?> value="<?= $prov['kd_prov'] ?>"><?= $prov['nama_prov']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="kota">Kota</label>
                                        </div>
                                        <select name="kota" class="custom-select" id="kota">
                                            <option selected>
                                                <-----Pilih kota----->
                                            </option>
                                            <?php foreach ($kota as $kot) : ?>
                                                <option <?php echo $kota_selected == $kot['kd_kota'] ? "selected='selected'" : '' ?> class="<?php echo $kot['kd_prov'] ?>" value="<?= $kot['kd_kota'] ?>"><?= $kot['nama_kota'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="<?= set_value('alamat') ?>">
                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kd_pos">Kode Pos</label>
                                        <input type="text" class="form-control" id="kd_pos" name="kd_pos" placeholder="Masukkan Kode Pos" value="<?= set_value('kd_pos') ?>">
                                        <?= form_error('kd_pos', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telp">Telepon</label>
                                        <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan No Telepon" value="<?= set_value('telp') ?>">
                                        <?= form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-left">Registrasi</button><br><br>
                            <a href="<?= base_url() ?>" class="btn btn-primary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="<?= base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.chained.min.js') ?>"></script>
    <script>
        $("#kota").chained("#provinsi");
    </script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/css/bootstrap.jd') ?>"></script>
</body>

</html>