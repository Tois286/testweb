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
$query = "SELECT * FROM pendaftaran WHERE id_pelamar=$id_pelamar";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_array($result);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Data</title>
    </head>
    
    <body>
        <h1>Update Data</h1>
        <form method="post" action="update.php">
            <input type="hidden" name="id_pelamar" value="<?php echo $row['id_pelamar']; ?>">
            <label for="pendidikan">Pendidikan:</label>
            <input type="text" name="pendidikan" value="<?php echo $row['pendidikan']; ?>"><br>
            <label for="pengalaman">Pengalaman:</label>
            <input type="text" name="pengalaman" value="<?php echo $row['pengalaman']; ?>"><br>
            <label for="skil">Skil:</label>
            <input type="text" name="skil" value="<?php echo $row['skil']; ?>"><br>
            <input type="submit" value="Update">
        </form>
    </body>
    
    </html>
    <?php
} else {
    echo "Terjadi kesalahan saat mengambil data";
}

// Tutup koneksi database
mysqli_close($conn);
?>
