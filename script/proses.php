<?php 
include 'koneksi.php';

$pdk=$_POST["pendidikan"];
$pgl=$_POST["pengalaman"];
$skil=$_POST["skil"];

$id=mysqli_query($conn,"INSERT INTO pendaftaran VALUE('','$pdk','$pgl','$skil')");

echo "<script>alert('Data Berhasil ditambah')</script>";
header("location: /saw/index.php");
?>