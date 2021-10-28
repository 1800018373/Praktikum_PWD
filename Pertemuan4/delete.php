<?php
include_once("koneksi.php");
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM komentar WHERE id='$id'");
header("Location:index.php");
