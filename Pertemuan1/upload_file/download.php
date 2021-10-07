<?php
$myDir = "C:/xampp/htdocs/Praktikum_PWD/Pertemuan1/upload_file/hasil_upload/";
$dir = opendir($myDir);
echo "Isi folder (klik link untuk download) : <br>";
while ($tmp = readdir($dir)) {
    echo "<a href='$tmp' target='_blank'>$tmp</a><br>";
}
closedir($dir);
