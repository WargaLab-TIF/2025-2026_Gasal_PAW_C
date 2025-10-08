<?php
$nilai = $_GET["nilai"]??"mohon di isi yaa"; 

if(is_numeric($nilai)){
    if ($nilai >= 90 && $nilai <= 100) {
        $grade = "A";
    } elseif ($nilai >= 80 && $nilai < 90) {
        $grade = "B";
    } elseif ($nilai >= 70 && $nilai < 80) {
        $grade = "C";
    } elseif ($nilai >= 60 && $nilai < 70) {
        $grade = "D";
    } else {
        $grade = "E";
    }
}

echo "Nilai kamu: $nilai <br>";
echo "Grade kamu: $grade";
?>
