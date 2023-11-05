<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <?php include 'view/header.php'?>
    <?php
    include "script/koneksi.php";

    $query = "SELECT * FROM pendaftaran";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<table>";
        echo "<tr><th>ID Pelamar</th><th>Pendidikan</th><th>Pengalaman</th><th>Skil</th><th>Action</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_pelamar'] . "</td>";
            echo "<td>" . $row['pendidikan'] . "</td>";
            echo "<td>" . $row['pengalaman'] . "</td>";
            echo "<td>" . $row['skil'] . "</td>";
            // Tambahkan tombol "Update" dengan tautan ke halaman update.php dengan parameter id_pelamar
            echo "<td><a href='script/update.php?id=" . $row['id_pelamar'] . "'>Update</a>|<a href='script/delete.php?id=" . $row['id_pelamar'] . "'>delete</a></td>";
            
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Terjadi kesalahan saat mengambil data";
    }
    ?>
</body>
<?php include 'view/footer.php';?>

</html>
