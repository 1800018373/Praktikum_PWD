<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title  ?></h1>


    <div class="row">
        <div class="col-lg">
            <table class="table table-hover">
                <thead>
                    <?php $i = 1; ?>
                    <?php foreach ($data_nilai as $ssw) : ?>
                <tbody>
                    <tr>
                        <th scope="col" style="width: 150px;">NIK</th>
                        <th scope="col" style="width: 30px;">:</th>
                        <th scope="col"><?= $ssw->nik ?></th>
                    </tr>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">:</th>
                        <th scope="col"><?= $ssw->nama ?></th>
                    </tr>
                    <tr>
                        <th scope="col">Pelajaran</th>
                        <th scope="col">:</th>
                        <th scope="col"><?= $ssw->pelajaran ?></th>
                    </tr>
                    <tr>
                        <th scope="col">Semester</th>
                        <th scope="col">:</th>
                        <th scope="col"><?= $ssw->semester ?></th>
                    </tr>
                    <tr>
                        <th scope="col">Tahun Ajaran</th>
                        <th scope="col">:</th>
                        <th scope="col"><?= $ssw->tahun_ajaran ?></th>
                    </tr>
                    <tr>
                        <th scope="col">Nilai</th>
                        <th scope="col">:</th>
                        <form action="<?= base_url('Guru/Dashboard/update_nilai'); ?>" method="post">
                            <th scope="col">
                                <input type="hidden" class="form-control" placeholder="Masukan Nama Role" name="id_nilai" value="<?= $ssw->id_nilai ?>">
                                <input type="text" class="form-control" placeholder="Masukan Nilai" name="nilai" value="<?= $ssw->nilai ?>" style="width: 100px;">
                            </th>

                    </tr>
                    </thead>

                    <?php $i++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>



        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->