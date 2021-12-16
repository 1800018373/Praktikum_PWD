<html>

<head>
    <title>Tambah data mahasiswa</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br /><br />

    <form action="tambah.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Nim</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Gender (L/P)</td>
                <td><input type="text" name="gender"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td><input type="date" name="tgl_lahir"></td>
            </tr>
            <tr>
                <td>No Handphone</td>
                <td><input type="text" name="no_hp"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['Submit'])) {
        $inputNim = $_POST['nim'];
        $inputNama = $_POST['nama'];
        $inputGender = $_POST['gender'];
        $inputAlamat = $_POST['alamat'];
        $inputTgl_lahir = $_POST['tgl_lahir'];
        $inputNo_hp = $_POST['no_hp'];
        include_once("koneksi.php");

        $result = mysqli_query($con, "INSERT INTO siswa(nim,nama,gender,alamat,tgl_lahir,no_hp) VALUES('$inputNim','$inputNama', '$inputGender','$inputAlamat','$inputTgl_lahir','$inputNo_hp')");
        echo "Data berhasil disimpan. <a href='index.php'>View Users</a>";
    }
    ?>
</body>

</html>