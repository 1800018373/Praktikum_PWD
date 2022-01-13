<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title  ?></h1>

    <div class="row">
        <div class="col-lg">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Kelas</th>
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
                            <td><?= $ssw->gender ?></td>
                            <td><?= $ssw->kelas ?></td>

                            <td>
                                <a href="" class="badge badge-success"> Lihat</a>
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