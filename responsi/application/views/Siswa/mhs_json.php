<?php
include "koneksi.php";
// menampilkan seluruh data dari tabel siswa
$sql = "select * from siswa order by nik";
$tampil = mysqli_query($con, $sql);

// dilakukan lah selection, apakah terdapat data nya atau tidak.
if (mysqli_num_rows($tampil) > 0) {
    //proses menampilkan data
    $no = 1;
    $response = array();
    $response["data"] = array();
    while ($r = mysqli_fetch_array($tampil)) {
        $h['nik'] = $r['nik'];
        $h['nama'] = $r['nama'];
        $h['gender'] = $r['gender'];
        $h['email'] = $r['email'];
        array_push($response["data"], $h);
    }
    echo json_encode($response);
} else {
    // jika tidak terdapat data maka akan diberi message berupa "tidak ada data"
    $response["message"] = "tidak ada data";
    echo json_encode($response);
}
