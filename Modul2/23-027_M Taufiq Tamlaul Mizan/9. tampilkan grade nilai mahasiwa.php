<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Nilai Mahasiswa</title>
</head>
<body>

    <h2>Program Grade Nilai Mahasiswa</h2>

    <form method="post" action="">
        Masukkan Nilai Angka: <input type="text" name="nilai">
        <input type="submit" value="Cek Grade">
    </form>

    <?php
    // Mengecek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil nilai dari input dan mengubahnya menjadi integer
        $nilai = (int)$_POST['nilai'];
        $grade = '';

        // Percabangan untuk menentukan grade
        if ($nilai >= 90 && $nilai <= 100) {
            $grade = 'A';
        } elseif ($nilai >= 80 && $nilai < 90) {
            $grade = 'B';
        } elseif ($nilai >= 70 && $nilai < 80) {
            $grade = 'C';
        } elseif ($nilai >= 60 && $nilai < 70) {
            $grade = 'D';
        } elseif ($nilai >= 0 && $nilai < 60) {
            $grade = 'E';
        } else {
            // Kondisi jika nilai yang dimasukkan tidak valid
            $grade = 'Nilai tidak valid!';
        }

        // Menampilkan output
        echo "<h3>Hasil:</h3>";
        echo "Nilai Anda: $nilai <br>";
        echo "Grade Anda: <strong>$grade</strong>";
    }
    ?>

</body>
</html>