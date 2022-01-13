<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title  ?></h1>


    <div class="div row">
        <div class="div col-lg-6">

            <?= $this->session->flashdata('pesan'); ?>
            <form action="<?= base_url('User/Dashboard/ubahPassword'); ?>" method="POST">
                <form>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Password Saat Ini</label>
                        <input type="password" class="form-control" name="current_password">
                        <?php echo form_error('current_password', '<div class="ml-2 text-danger small">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Password Baru</label>
                        <input type="password" class="form-control" name="new_password1">
                        <?php echo form_error('new_password1', '<div class="ml-2 text-danger small">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Ulangi Password Baru</label>
                        <input type="password" class="form-control" name="new_password2">
                        <?php echo form_error('new_password2', '<div class="ml-2 text-danger small">', '</div>'); ?>
                    </div>
                    <div class="div form-group">
                        <button type="submit" class="btn btn-primary">Ubah Password</button>
                    </div>
                </form>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->