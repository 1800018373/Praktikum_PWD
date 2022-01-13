<!-- login -->
<div class="login">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-5 ">ACCONT RECOVERY</h3>
                        <?= $this->session->flashdata('pesan'); ?>
                        <p>Enter Your E-mail address below to reset your password</p>

                        <form method="post" action="<?= base_url('Auth/lupa'); ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" class="form-control" name="email">
                                <?php echo form_error('email', '<div class="ml-2 text-danger small">', '</div>'); ?>
                            </div>
                            <div class="form-group my-4">
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>
                            <p>Already have an Account? <a href="<?= base_url('Auth/login'); ?>">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end login -->