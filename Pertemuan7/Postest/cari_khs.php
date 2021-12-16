<?php
include 'koneksi.php'; //pengkoneksian ke database melalui file koneksi.php
?>

<h3>Form Pencarian DATA KHS Dengan PHP </h3>

<form action="" method="get">
    <!-- form dikirim kembali ke file ini lagi dikarenakan actionnya kosong -->
    <label>Cari :</label>
    <input type="text" name="cari"> <!-- user menginputkan query dan ditampung ke dalam variabel cari -->
    <input type="submit" value="Cari">
</form>

<?php
if (isset($_GET['cari'])) { //pengkodisian jika variabel cari terdapat valuenya dan user mengklik tombol submit maka query akan ditampilkan kembali
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : " . $cari . "</b>"; // tampilan output berupa query yang dimasukan user
}
?>

<table border="1">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>kode Matakuliah</th>
        <th>Mata Kuliah</th>
        <th>Nilai</th>

    </tr>
    <?php if (isset($_GET['cari'])) { //jika variabel cari terdapat value maka akan dilakukanlah proses dibawah ini
        $cari = $_GET['cari']; //pendeklarasian variabel $cari dan memindahkan isi dari variabel cari kedalam variabel $cari.
        $sql = "select khs.nim, siswa.nama, khs.kodeMK, matakuliah.namaMK, khs.nilai from khs join siswa on khs.nim=siswa.nim join matakuliah on khs.kodeMK=matakuliah.kodeMK where khs.nim like'%" . $cari . "%'"; // mengambil sekaligus menampilkan data dengan klausa where nim = $cari
        $tampil = mysqli_query($con, $sql); // memasukan isi data yang diambil ke dalam variabel $tampil
    } else {
        $sql = "select khs.nim, siswa.nama, khs.kodeMK, matakuliah.namaMK, khs.nilai from khs join siswa on khs.nim=siswa.nim join matakuliah on khs.kodeMK=matakuliah.kodeMK";
        $tampil = mysqli_query($con, $sql); // memasukan isi data yang diambil ke dalam variabel $tampil
    }
    $no = 1;
    while ($r = mysqli_fetch_array($tampil)) { // perulangan untuk menampilkan data
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['nim']; ?></td>
            <td><?php echo $r['nama']; ?></td>
            <td><?php echo $r['kodeMK']; ?></td>
            <td><?php echo $r['namaMK']; ?></td>
            <td><?php echo $r['nilai']; ?></td>
        </tr>
    <?php } ?>
</table>