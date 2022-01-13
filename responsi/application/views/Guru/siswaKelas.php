<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-3 text-gray-800"> Daftar Siswa Kelas <?= $title  ?></h1>
    <div class="form-group mb-1">
        <label>Silahkan Pilih Kategori Pelajan dan Semester Siswa</label>
    </div>
    <form action="<?= base_url('Guru/Dashboard/siswa_pelajaran'); ?>" method="post" class="form-inline">

        <div class="form-group mr-sm-3 mb-2">
            <select name="kd_pelajaran" class="form-control mr-sm-3" style="width: 200px;">
                <option>Pilih Pelajaran</option>
                <?php foreach ($pelajaran as $pl) : ?>
                    <option value="<?= $pl['kd_pelajaran']; ?>"><?= $pl['pelajaran'] ?></option>
                <?php endforeach; ?>
            </select>
            <select name="kd_semester" class="form-control " style="width: 200px;">
                <option>Pilih Semester</option>
                <?php foreach ($semester as $pl) : ?>
                    <option value="<?= $pl['kd_semester']; ?>"><?= $pl['semester'] ?> <?= $pl['tahun_ajaran'] ?></option>
                <?php endforeach; ?>
                <input type="hidden" name="kelas" value="<?= $title  ?>">
            </select>

        </div>
        <button type="submit" class="btn btn-primary mb-2">Pilih</button>
        <div class="col mt-2">
            <a href="<?= base_url('Guru/Dashboard/pdf'); ?>" class="btn btn-danger mb-3"> <i class="far fa-file-pdf"></i> PDF</a>
            <a href="<?= base_url('Guru/Dashboard/xml'); ?>" class="btn btn-info mb-3"> <i class="far fa-file-pdf"></i> XML</a>
            <a href="<?= base_url('Guru/Dashboard/json'); ?>" class="btn btn-warning mb-3"> <i class="far fa-file-pdf"></i> JSON</a>
        </div>
    </form>
    <div class="row">
        <div class="col-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Pelajaran</th>
                        <th scope="col">semester</th>
                        <th scope="col">tahun_ajaran</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $ssw) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $ssw->nik ?></td>
                            <td><?= $ssw->nama ?></td>
                            <td><?= $ssw->pelajaran ?></td>
                            <td><?= $ssw->semester ?></td>
                            <td><?= $ssw->tahun_ajaran ?></td>
                            <td><?= $ssw->nilai ?></td>
                            <td>
                                <?php echo anchor('Guru/Dashboard/ubahNilai/' . $ssw->id_nilai, '<div class="badge badge-warning">Ubah Nilai</div>') ?>
                            </td>
                            </td>
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