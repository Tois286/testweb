<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Style the container for the result */
.container {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Style the headings */
h3 {
    text-align: center;
    color: #007bff;
}

/* Style the result details */
.result-details {
    margin-top: 20px;
}

.result-details h4 {
    color: #333;
}

/* Style the status message */
.status {
    font-weight: bold;
    font-size: 18px;
    color: #007bff;
}

/* Style the buttons */
.button-container {
    text-align: center;
    margin-top: 20px;
}

.button-container a {
    text-decoration: none;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
}

.button-container a:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    
<?php
include 'koneksi.php';

function hitungNilaiTotal($nilai1, $nilai2, $nilai3, $bobot) {
    return ($nilai1 * $bobot['pendidikan']) + ($nilai2 * $bobot['pengalaman']) + ($nilai3 * $bobot['skil']);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id_pelamar = $_GET['id'];

    $sql = "SELECT * FROM pendaftaran WHERE id_pelamar = $id_pelamar";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $nilai1 = $row['nilai1'];
        $nilai2 = $row['nilai2'];
        $nilai3 = $row['nilai3'];

        // Fetch criteria weights (bobot) from the database.
        $sqlBobot = "SELECT kriteria, bobot FROM matrik";
        $resultBobot = $conn->query($sqlBobot);

        if ($resultBobot->num_rows > 0) {
            $bobot = [];
            while ($rowBobot = $resultBobot->fetch_assoc()) {
                $bobot[$rowBobot['kriteria']] = $rowBobot['bobot'];
            }

            // Calculate total score.
            $nilaiTotal = hitungNilaiTotal($nilai1, $nilai2, $nilai3, $bobot);

            echo "<h3>Hasil Perhitungan</h3>";
            echo "id: " . $row['id_pelamar'] . "<br>";
            echo "pendidikan: ".$row['pendidikan']." ".$row['nilai1']."point"."<br>";
            echo "pengalaman: ".$row['pengalaman']." ".$row['nilai2']."point"."<br>";
            echo "skil: ".$row['skil']." ".$row['nilai3']."point"."<br>";
            echo "Nilai Total: " . $nilaiTotal . "<br>";


            $grade = '';
            if ($nilaiTotal >= 80) {
                $grade = 'Diterima';
            } elseif ($nilaiTotal >= 70) {
                $grade = 'Diterima';
            } elseif ($nilaiTotal >= 60) {
                $grade = 'Tidak Diterima';
            } else {
                $grade = 'Tidak Diterima';
            }
            echo "Status: " . $grade;
        } else {
            echo "Tidak ada data bobot kriteria yang ditemukan.";
        }
    } else {
        echo "ID Pelamar tidak ditemukan.";
    }
} else {
    echo "Permintaan tidak valid.";
}
?>

</body>
</html>