<!-- login -->
<div class="login">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-5 ">SIGN UP</h3>
                        <?= $this->session->flashdata('pesan'); ?>
                        <form method="post" action="<?= base_url('Auth/Registrasi'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" value="<?= set_value('nik'); ?>">
                                <?php echo form_error('nik', '<div class="ml-2 text-danger small">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                                <?php echo form_error('nama', '<div class="ml-2 text-danger small">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <select name="kd_kelas" class="form-control">
                                    <option>Select Menu</option>
                                    <?php foreach ($kelas as $kls) : ?>
                                        <option value="<?= $kls['kd_kelas']; ?>"><?= $kls['kelas'] ?></option>
                                    <?php endforeach; ?>
                                    <input type="hidden" name="kelas" value="<?= $title  ?>">
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                                <?php echo form_error('email', '<div class="ml-2 text-danger small">', '</div>'); ?>
                            </div>
                            <p>kata sandi anda adalah 8-20 karakter, terdiri dari huruf dan angka</p>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password1" placeholder="Password">
                                <?php echo form_error('password1', '<div class="ml-2 text-danger small">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password2" placeholder="Confirm Password">

                            </div>
                            <div class="form-group my-4">
                                <button type="submit" class="btn btn-primary form-control">Create an account</button>
                            </div>
                            <div class="row">
                                <div class="col-6 text-left">
                                    <div class="form-group form-check ml-2">
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="<?= base_url('Auth/Login'); ?>">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end login -->


<!--                        <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIS">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                            </div>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                                    <option selected>Pilih Gander</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Telphone">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                            </div>
                            <p>kata sandi anda adalah 8-20 karakter, terdiri dari huruf dan angka</p>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirm Password">
                            </div>
                            <div class="form-group my-4">
                                <button type="submit" class="btn btn-primary form-control">Create an account</button>

                            </div> -->