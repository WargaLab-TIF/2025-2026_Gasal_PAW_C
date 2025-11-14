<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penghitung Grade Nilai</title>
</head>
<body>
    <h2>Input Nilai Mahasiswa</h2>
    <form method="POST" action="">
        <label for="nilai">Masukkan Nilai Angka (0-100):</label><br>
        <input type="number" id="nilai" name="nilai" min="0" max="100" required><br><br>
        <input type="submit" value="Cek Grade">
    </form>
    <hr>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nilai = (int)$_POST['nilai'];
        $grade = ""; 
        if ($nilai >= 90) {
            $grade = "A";
        } elseif ($nilai >= 80) {
            $grade = "B";
        } elseif ($nilai >= 70) {
            $grade = "C";
        } elseif ($nilai >= 60) {
            $grade = "D";
        } else {
            $grade = "E";
        }

        echo "<h3>Hasil Grade Nilai</h3>";
        echo "<p>Nilai Angka yang kamu masukkan adalah: <b>" . $nilai . "</b></p>";
        echo "<p>Grade Nilaimu adalah: <b>" . $grade . "</b></p>";
    }
    ?>
</body>
</html>