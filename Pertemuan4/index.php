<?php
include_once("koneksi.php");
$result = mysqli_query($con, "SELECT * FROM komentar ");
?>

<html>

<head>
    <title>Halaman Utama</title>
</head>

<body>
    <a href="validasi.php">Tambah Posting Komentar</a><br /><br />

    <table width='80%' border=1>

        <tr>
            <th style="width: 200px;">Nama</th>
            <th>Email</th>
            <th>Website</th>
            <th style="align-items: flex-start">Komentar</th>
            <th>Gender</th>
            <th>Aksi</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";

            echo "<td>" . $user_data['nama'] . "</td>";
            echo "<td>" . $user_data['email'] . "</td>";
            echo "<td>" . $user_data['website'] . "</td>";
            echo "<td>" . $user_data['komentar'] . "</td>";
            echo "<td>" . $user_data['gender'] . "</td>";
            echo "<td><a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>