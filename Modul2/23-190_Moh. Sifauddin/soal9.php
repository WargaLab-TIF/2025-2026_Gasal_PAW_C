<!DOCTYPE html>
<html>
<head>
    <title>Grade Nilai Mahasiswa</title>
</head>
<body>
    <h2>Masukkan Nilai Mahasiswa</h2>
    
    <!-- Form input nilai -->
    <form method="post">
        Nilai: <input type="number" name="nilai" required>
        <input type="submit" name="submit" value="Submit">
    </form>

<?php
if (isset($_POST['submit'])) {
    $nilai = $_POST['nilai'];
    
    // Percabangan untuk menentukan grade
    if ($nilai >= 85 && $nilai <= 100) {
        $grade = "A";
    } elseif ($nilai >= 70 && $nilai < 85) {
        $grade = "B";
    } elseif ($nilai >= 55 && $nilai < 70) {
        $grade = "C";
    } elseif ($nilai >= 40 && $nilai < 55) {
        $grade = "D";
    } elseif ($nilai >= 0 && $nilai < 40) {
        $grade = "E";
    } else {
        $grade = "Nilai tidak valid!";
    }

    echo "<h3>Nilai Anda: $nilai</h3>";
    echo "<h3>Grade: $grade</h3>";
}
?>
</body>
</html>
