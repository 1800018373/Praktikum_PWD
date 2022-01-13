<!-- login -->
<div class="login">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-5 ">Ubah Password</h3>
                        <?= $this->session->flashdata('pesan'); ?>
                        <p>Silahkan masukan password baru dari akun <?= $this->session->userdata('reset_email'); ?> </p>
                        <form method="post" action="<?= base_url('Auth/lupa/ubahPassword'); ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password Baru</label>
                                <input type="password" class="form-control" name="password1">
                                <?php echo form_error('password1', '<div class="ml-2 text-danger small">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Konfimasi Password Baru</label>
                                <input type="password" class="form-control" name="password2">
                                <?php echo form_error('password2', '<div class="ml-2 text-danger small">', '</div>'); ?>
                            </div>
                            <div class="form-group my-4">
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end login -->