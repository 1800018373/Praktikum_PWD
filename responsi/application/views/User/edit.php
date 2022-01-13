<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title  ?></h1>
    <div class="div row">
        <div class="div col-lg-8">

            <?= form_open_multipart('User/Dashboard/edit'); ?>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="<?= $user['nama']; ?>">
                    <?php echo form_error('nama', '<div class="ml-2 text-danger small">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="div col-sm-2">Foto Profile</div>
                <div class="div col-sm-10">
                    <div class="div row">
                        <div class="div col-sm-3">
                            <img src="<?= base_url('assets/gambar/profile/') . $user['gambar']; ?>" class="img-thumbnail"></img>
                        </div>
                        <div class="div col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Upload Gambar</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="div from-group row justify-content-end">
                <div class="div col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            </form>


        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->