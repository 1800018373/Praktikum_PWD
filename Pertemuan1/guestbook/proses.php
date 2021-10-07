<?php
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$status = $_POST['status'];
$komentar = $_POST['komentar'];

echo "<head><title>MY Guest Book</head></title>";
$fp = fopen("guestbook.txt", "a+");
fputs($fp, "$nama|$alamat|$email|$status|$komentar\dn");
fclose($fp);
echo "Terimakasih Atas Partisipasi anda mengisi buku tamu<br>";
echo "<a href=tampilan.html>Isi Buku Tamu</a><br>";
echo "<a href=lihat.php> Lihat Buku Tamu</a><br>";
