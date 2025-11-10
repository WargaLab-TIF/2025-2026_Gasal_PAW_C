<?php
$nilai = $_GET['nilai'] ?? "mohon nilai diisi";

if ($nilai !== null) {
    if ($nilai >= 90 && $nilai <= 100) {
        $grade = "A";
        echo "Nilai anda Brilliant <br>";
    } elseif ($nilai >= 80 && $nilai < 90) {
        $grade = "B";
        echo "Bagus sekali<br>";
    } elseif ($nilai >= 70 && $nilai < 80) {
        $grade = "C";
        echo "Tetap Semangatt<br>";
    } elseif ($nilai >= 60 &&  $nilai < 70) {
        $grade = "D";
        echo "Ohh tidak anda harus belajar <br>";
    } elseif ($nilai >= 0 && $nilai < 60) {
        $grade = "E";
        echo "ANJAYYYY ENGINEERING <br>";
    } else {
        $grade = "Nilai tidak valid";
    }

    echo "Nilai Anda: $nilai<br>";
    echo "Grade Anda: $grade";
} else {
    echo "Silakan masukkan nilai melalui URL, contoh: ?nilai=85";
}
?>