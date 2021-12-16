<?php
include "koneksi.php";
header('Content-Type: text/xml');
$query = "SELECT * FROM siswa";
$hasil = mysqli_query($con, $query);
$jumField = mysqli_num_fields($hasil);

echo "<?xml version='1.0'?>";
echo "<data>";
while ($data = mysqli_fetch_array($hasil)) {
    echo "<mahasiswa>";
    echo "<nim>", $data['nim'], "</nim>";
    echo "<nama>", $data['nama'], "</nama>";
    echo "<jkel>", $data['gender'], "</jkel>";
    echo "<alamat>", $data['alamat'], "</alamat>";
    echo "<tgllhr>", $data['tgl_lahir'], "</tgllhr>";
    echo "</mahasiswa>";
}
echo "</data>";
