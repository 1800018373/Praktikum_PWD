<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title  ?></h1>

    <div class="div row">
        <div class="div col-lg-6">
            <?= $this->session->flashdata('pesan') ?>
        </div>
    </div>
    <div class="card mb-3 col-lg-6">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/gambar/profile/') . $user['gambar']; ?>" class="img-thumbnail mt-2 mb-2">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->