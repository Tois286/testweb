<?php
include 'koneksi.php';
$sql = "SELECT MAX(id_matrik) as max_id FROM pendaftaran";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $next_id = $row['max_id'] + 1; // Mengambil ID berikutnya
} else {
    $next_id = 1; // Jika tabel kosong, mulai dari ID 1
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Periksa apakah data dikirimkan melalui metode POST

    // Ambil nilai yang dipilih dari dropdown
    $nilai1 = $_POST['pendidikan'];
    $nilai2 = $_POST['pengalaman'];
    $nilai3 = $_POST['skil'];
    // Hitung grade berdasarkan nilai
    $pendidikan = '';
    if ($nilai1 >= 90) {
        $pendidikan = 's3';
    } elseif ($nilai1 >= 85) {
        $pendidikan = 's2';
    } elseif ($nilai1 >= 75) {
        $pendidikan = 's1';
    } elseif ($nilai1 >= 70) {
        $pendidikan = 'd3';
    } elseif ($nilai1 >= 65) {
        $pendidikan = 'd2';
    } elseif ($nilai1 >= 60) {
        $pendidikan = 'd1';
    } elseif ($nilai1 >= 50) {
        $pendidikan = 'smk/sma/tkj';
    } else {
        echo "tidak di pilih";
    }

    $pengalaman = '';
    if ($nilai2 >= 80) {
        $pengalaman = 'lebih';
    } elseif ($nilai2 >= 70) {
        $pengalaman = '3 s/d 4thn';
    } elseif ($nilai2 >= 60) {
        $pengalaman = '2 s/d 3thn';
    } elseif ($nilai2 >= 50) {
        $pengalaman = '1 s/d 2thn';
    } elseif ($nilai2 >= 40) {
        $pengalaman = '1 thn';
    } else {
        echo "tidak di pilih";
    }

    $skil = '';
    if ($nilai3 >= 50) {
        $skil = 'QA';
    } elseif ($nilai3 >= 70) {
        $skil = 'frontend';
    } elseif ($nilai3 >= 80) {
        $skil = 'backend';
    } elseif ($nilai3 >= 90) {
        $skil = 'fullstack';
    } else {
        echo 'tidak di pilih';
    }
} else {
    // Jika data tidak dikirimkan melalui metode POST, tampilkan pesan kesa';
}

$id = mysqli_query($conn, "INSERT INTO pendaftaran VALUE('','$next_id','$pendidikan','$nilai1','$pengalaman','$nilai2','$skil','$nilai3')");

echo "<script>alert('Data Berhasil ditambah')</script>";
header("location: /saw/index.php");
?>