<?php
include_once("koneksi.php");


if (isset($_POST['update'])) {
    $inputNim = $_POST['nim'];
    $inputNama = $_POST['nama'];
    $inputGender = $_POST['gender'];
    $inputAlamat = $_POST['alamat'];
    $inputTgl_lahir = $_POST['tgl_lahir'];
    $inputNo_hp = $_POST['no_hp'];

    $result = mysqli_query($con, "UPDATE siswa SET nama='$inputNama',gender='$inputGender',alamat='$inputAlamat',tgl_lahir='$inputTgl_lahir',no_hp='$inputNo_hp' WHERE nim='$inputNim'");

    header("Location: index.php");
}
?>

<?php
$nim = $_GET['nim'];
$result = mysqli_query($con, "SELECT * FROM siswa WHERE nim='$nim'");
while ($user_data = mysqli_fetch_array($result)) {
    $outputNim = $user_data['nim'];
    $outputNama = $user_data['nama'];
    $outputGender = $user_data['gender'];
    $outputAlamat = $user_data['alamat'];
    $outputTgl_lahir = $user_data['tgl_lahir'];
    $outputNo_hp = $user_data['no_hp'];
}
?>
<html>

<head>
    <title>Edit Data Mahasiswa</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br /><br />

    <form name="update_mahasiswa" method="post" action="edit.php">
        <table border="1">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $outputNama ?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="text" name="gender" value="<?php echo $outputGender; ?>"></td>
            </tr>
            <tr>
                <td>alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $outputAlamat; ?>"></td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td><input type="date" name="tgl_lahir" value="<?php echo $outputTgl_lahir; ?>"></td>
            </tr>
            <tr>
                <td>No Handphone</td>
                <td><input type="text" name="no_hp" value="<?php echo $outputNo_hp; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="nim" value="<?php echo $_GET['nim']; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>