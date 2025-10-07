<!DOCTYPE html>
<html>
<head>
    <title>Program Grade Nilai Mahasiswa</title>
</head>
<body>
    <h2>Program Grade Nilai Mahasiswa</h2>
    <form method="get">
        Masukkan Nilai Anda: 
        <input type="number" name="nilai" required>
        <input type="submit" value="Lihat Grade ">
    </form>

    <?php
    if (isset($_GET['nilai'])) {
        $nilai = $_GET['nilai'];

        if ($nilai >= 85) {
            $grade = "A";
        } elseif ($nilai >= 75) {
            $grade = "B";
        } elseif ($nilai >= 65) {
            $grade = "C";
        } elseif ($nilai >= 50) {
            $grade = "D";
        } else {
            $grade = "E";
        }

        echo "<h3>Hasil:</h3>";
        echo "Nilai Anda: $nilai <br>";
        echo "Grade: <b>$grade</b>";
    }
    ?>
</body>
</html>
