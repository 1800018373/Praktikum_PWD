<html>
<style>
    .error {
        color: #FF0000;

    }
</style>

<head>
    <title>Tambah data mahasiswa</title>
</head>
<?php
$nimErr = $namaErr = $genderErr = $tgl_lahirErr = $no_hpErr = "";
$inputNim = $inputNama = $inputGender = $inputAlamat = $inputTlg_lahir = $inputNo_hp = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = true;
    if (empty($_POST["nim"])) {
        $nimErr = "Nim harus diisi";
        $input = false;
    } else {
        $inputNim = test_input($_POST["nim"]);
    }
    if (empty($_POST["nama"])) {
        $namaErr = "nama harus diisi";
        $input = false;
    } else {
        $inputNama = test_input($_POST["nama"]);
    }
    if (empty($_POST["gender"])) {
        $genderErr = "Gender harus dipilih";
        $input = false;
    } else {
        $inputGender = test_input($_POST["gender"]);
    }
    if (empty($_POST["alamat"])) {
        $inputalamat = "";
    } else {
        $inputalamat = test_input($_POST["alamat"]);
    }
    if (empty($_POST["tgl_lahir"])) {
        $tgl_lahirErr = "Tanggal Lahir harus diisi";
        $input = false;
    } else {
        $inputTgl_lahir = test_input($_POST["tgl_lahir"]);
    }
    if (empty($_POST["no_hp"])) {
        $no_hpErr = "Nomor Hp harus diisi";
        $input = false;
    } else {
        $inputno_hp = test_input($_POST["no_hp"]);
    }

    if ($input === true) {
        include_once("koneksi.php");
        $result = mysqli_query($con, "INSERT INTO siswa(nim,nama,gender,alamat,tgl_lahir,no_hp) VALUES('$inputNim','$inputNama', '$inputGender','$inputAlamat','$inputTgl_lahir','$inputNo_hp')");
        echo "<script> 
        alert('Data Berhasil Ditambah');
        document.location='index.php';
        </script>";
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<body>
    <a href="index.php">Go to Home</a>
    <br /><br />

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1">
        <table border="1">
            <tr>
                <td>Nim</td>
                <td><input type="text" name="nim"></td>
                <td><span class="error">* <?php echo $nimErr; ?></span></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
                <td><span class="error">* <?php echo $namaErr; ?></span></td>
            </tr>
            <tr>
                <td>Gender (L/P)</td>
                <td><input type="text" name="gender"></td>
                <td><span class="error">* <?php echo $genderErr; ?></span></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
                <td></td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td><input type="date" name="tgl_lahir"></td>
                <td><span class="error">* <?php echo $tgl_lahirErr; ?></span></td>
            </tr>
            <tr>
                <td>No Handphone</td>
                <td><input type="text" name="no_hp"></td>
                <td><span class="error">* <?php echo $no_hpErr; ?></span></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>

</html>