<?php
// Array baru berisi 3 sayuran
$veggies = array("Brokoli", "Sawi", "Terong");

// Hitung panjang array
$arrayLength = count($veggies);

// Tampilkan jumlah data
echo "Jumlah data dalam array \$veggies: $arrayLength<br><br>";

// Tampilkan seluruh data dengan perulangan FOR
echo "Daftar sayuran:<br>";
for ($x = 0; $x < $arrayLength; $x++) {
    echo $veggies[$x] . "<br>";
}
?>
