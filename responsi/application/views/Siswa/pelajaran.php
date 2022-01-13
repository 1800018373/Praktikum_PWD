<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title  ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newpelajaranModal">Tambah Pelajaran</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pelajaran</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Tahun Ajaran</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($ambil as $pl) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $pl->pelajaran ?></td>
                            <td><?= $pl->semester ?></td>
                            <td><?= $pl->tahun_ajaran ?></td>
                            <td>
                                <?php echo anchor('User/Siswa/hapus_pelajaran/' . $pl->id_nilai, '<div class="badge badge-danger">Delete</div>') ?>
                            </td>
                        </tr>


                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->





<!-- Modal -->
<div class="modal fade" id="newpelajaranModal" tabindex="-1" aria-labelledby="newpelajaranModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newpelajaranModalLabel">Tambah Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('User/Siswa/tambah_pelajaran'); ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <select name="kd_pelajaran" class="form-control">
                            <option>Pilih Pelajaran</option>
                            <?php foreach ($pelajaran as $pl) : ?>
                                <option value=" <?= $pl['kd_pelajaran']; ?>"><?= $pl['pelajaran'] ?></option>
                            <?php endforeach; ?>
                            <input type="hidden" name="nik" value="<?= $pengguna['nik'] ?>">
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="kd_semester" class="form-control">
                            <option>Pilih Semester</option>
                            <?php foreach ($semester as $smt) : ?>
                                <option value="<?= $smt['kd_semester']; ?>">[<?= $smt['semester'] ?>] <?= $smt['tahun_ajaran'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>