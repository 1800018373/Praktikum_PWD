<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title  ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kelas as $kls) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $kls['kelas'] ?></td>

                            <td>
                                <?php echo anchor('Guru/Dashboard/siswaKelas/' . $kls['kd_kelas'] . '/' . $kls['kelas'], '<div class="badge badge-success">Lihat Siswa</div>') ?>
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