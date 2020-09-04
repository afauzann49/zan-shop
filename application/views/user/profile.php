<div class="container">

    <div class="row mt-4">
        <div class="col-md-6">
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>


    <div class="row mt-4 mb-5">
        <div class="col">
            <div class="card mb-3 col-lg-8">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['nama'] ?></h5>
                            <p class="card-text"><?= $user['email'] ?></p>
                            <p class="card-text"><small class="text-muted"><?= $user['alamat'] ?></small></p>
                            <a href="<?= base_url('user/edit') ?>" class="btn btn-sm btn-info">Edit profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>