<?php
include "koneksi.php";
header('Content-Type: text/xml');
//memanggil semua data dari tabel siswa
$query = "SELECT * FROM siswa";
$hasil = mysqli_query($con, $query);
$jumField = mysqli_num_fields($hasil);

echo "<?xml version='1.0'?>";
echo "<data>";

//dilakukan perulangan untuk menampilkan data
while ($data = mysqli_fetch_array($hasil)) {
    echo "<siswa>";
    echo "<nik>", $data['nik'], "</nik>";
    echo "<nama>", $data['nama'], "</nama>";
    echo "<gender>", $data['gender'], "</gender>";
    echo "<alamat>", $data['email'], "</alamat>";
    echo "</siswa>";
}
echo "</data>";
