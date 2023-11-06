<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangani proses update data saat form disubmit
    $id_pelamar = $_POST['id_pelamar'];
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
        echo "Pendidikan tidak valid";
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
    } else {
        echo "Pengalaman tidak valid";
    }

    $skil = '';
    if ($nilai3 >= 90) {
        $skil = 'fullstack';
    } elseif ($nilai3 >= 80) {
        $skil = 'backend';
    } elseif ($nilai3 >= 70) {
        $skil = 'frontend';
    } elseif ($nilai3 >= 50) {
        $skil = 'QA';
    } else {
        echo 'Skil tidak valid';
    }

    // Query untuk mengupdate data pengguna
    $query = "UPDATE pendaftaran SET pendidikan='$pendidikan', pengalaman='$pengalaman', skil='$skil' WHERE id_pelamar=$id_pelamar";

    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?id=" . $id_pelamar);
        exit();
    } else {
        echo "Terjadi kesalahan saat memperbarui data: " . mysqli_error($conn);
    }
}

// Ambil ID pelamar dari parameter URL
$id_pelamar = $_GET['id'];

// Query untuk mendapatkan data pelamar berdasarkan ID
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
            <label>Pendidikan</label>
            <select name="pendidikan" id="pendidikan">
                <option value="50" <?php if ($row['pendidikan'] == 'smk/sma/tkj') echo 'selected'; ?>>smk/sma/tkj</option>
                <option value="60" <?php if ($row['pendidikan'] == 'd1') echo 'selected'; ?>>d1</option>
                <option value="65" <?php if ($row['pendidikan'] == 'd2') echo 'selected'; ?>>d2</option>
                <option value="70" <?php if ($row['pendidikan'] == 'd3') echo 'selected'; ?>>d3</option>
                <option value="75" <?php if ($row['pendidikan'] == 's1') echo 'selected'; ?>>s1</option>
                <option value="85" <?php if ($row['pendidikan'] == 's2') echo 'selected'; ?>>s2</option>
                <option value="90" <?php if ($row['pendidikan'] == 's3') echo 'selected'; ?>>s3</option>
            </select><br><br>

            <label>Pengalaman</label>
            <select name="pengalaman" id="pengalaman">
                <option value="50" <?php if ($row['pengalaman'] == '6bulan') echo 'selected'; ?>>6 bulan</option>
                <option value="60" <?php if ($row['pengalaman'] == '1 s/d 2thn') echo 'selected'; ?>>1 s/d 2 tahun</option>
                <option value="70" <?php if ($row['pengalaman'] == '3 s/d 4thn') echo 'selected'; ?>>3 s/d 4 tahun</option>
                <option value="80" <?php if ($row['pengalaman'] == 'lebih') echo 'selected'; ?>>lebih</option>
            </select><br><br>
            
            <label>Skil</label>
            <select name="skil" id="skil">
                <option value="80" <?php if ($row['skil'] == 'backend') echo 'selected'; ?>>backend</option>
                <option value="70" <?php if ($row['skil'] == 'frontend') echo 'selected'; ?>>frontend</option>
                <option value="50" <?php if ($row['skil'] == 'QA') echo 'selected'; ?>>QA</option>
                <option value="90" <?php if ($row['skil'] == 'fullstack') echo 'selected'; ?>>fullstack</option>
            </select><br><br>
            
            <input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar; ?>">
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
