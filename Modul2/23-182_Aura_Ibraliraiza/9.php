<!DOCTYPE html>
<html>
<head>
    <title>Program Grade Nilai Mahasiswa</title>
</head>
<body>
    <h2>Program Penentuan Grade Nilai Mahasiswa</h2>
    
    <form method="post" action="">
        Masukkan Nilai (0 - 100): 
        <input type="number" name="nilai" min="0" max="100" required>
        <input type="submit" value="Proses">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nilai = $_POST['nilai'];
        $grade = "";

        // Percabangan untuk menentukan grade
        if ($nilai >= 90 && $nilai <= 100) {
            $grade = "A";
        } elseif ($nilai >= 80) {
            $grade = "B";
        } elseif ($nilai >= 70) {
            $grade = "C";
        } elseif ($nilai >= 60) {
            $grade = "D";
        } elseif ($nilai >= 0) {
            $grade = "E";
        } else {
            $grade = "Nilai tidak valid!";
        }

        // Output hasil
        echo "<hr>";
        echo "<h3>Hasil:</h3>";
        echo "Nilai Anda: <b>$nilai</b><br>";
        echo "Grade Anda: <b>$grade</b>";
    }
    ?>
</body>
</html>
