<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">

    <title><?= $judul ?></title>
</head>

<body>

    <div class="container">

        <div class="row mt-5">
            <div class="col-md-5 offset-md-3">
                <?= $this->session->flashdata('message') ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <form action="<?= base_url('home/login') ?>" method="post">

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Masukan Email Anda">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Anda">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Login</button><br><br>
                            <a href="<?= base_url() ?>" class="btn btn-primary float-right">Batal</a>
                    </div>
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