<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangani proses update data saat form disubmit
    $id_pelamar = $_POST['id_pelamar'];
    $pendidikan = $_POST['pendidikan'];
    $pengalaman = $_POST['pengalaman'];
    $skil = $_POST['skil'];

    // Query untuk mengupdate data pengguna
    $query = "UPDATE pendaftaran SET pendidikan='$pendidikan', pengalaman='$pengalaman', skil='$skil' WHERE id_pelamar=$id_pelamar";

    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?id=" . $id_pelamar);
    exit();

    } else {
        echo "Terjadi kesalahan saat memperbarui data: " . mysqli_error($conn);
    }
}

// Ambil ID pengguna dari parameter URL
$id_pelamar = $_GET['id'];

// Query untuk mendapatkan data pengguna berdasarkan ID
$query = "DELETE FROM pendaftaran WHERE id_pelamar=$id_pelamar";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: ../index.php?id=" . $id_pelamar);
} else {
    echo "Terjadi kesalahan saat mengambil data";
}

// Tutup koneksi database
mysqli_close($conn);
?>
