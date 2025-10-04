<?php
$nama = "Jordan Hutahaean";
$nilai = 82;

echo "Nama Mahasiswa: $nama <br>";
echo "Nilai: $nilai <br>";

if ($nilai >= 85) {
    echo "Grade: A";
} elseif ($nilai >= 75) {
    echo "Grade: B";
} elseif ($nilai >= 65) {
    echo "Grade: C";
} elseif ($nilai >= 50) {
    echo "Grade: D";
} else {
    echo "Grade: E";
}
?>
