<!-- Begin Page Content -->
<div class="container-fluid">

        <h5>Halaman Admin</h5>

            <div class="col">
                <div class="card mb-3 col-lg-8">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/img/profile/default.png') ?>" class="card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $admin['nama'] ?></h5>
                                <p class="card-text"><?= $admin['email'] ?></p>
                                <p class="card-text"><small class="text-muted"><?= $admin['alamat'] ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->