<?php
$fruits = ["apel", "jeruk", "pisang", "mangga", "semangka"];

// Tambahkan 5 data baru menggunakan FOR
for ($i = 0; $i < 5; $i++) {
    $fruits[] = "buah_" . ($i + 1);
}

echo "Jumlah data saat ini: " . count($fruits) . "<br>";
for ($i = 0; $i < count($fruits); $i++) {
    echo $fruits[$i] . "<br>";
}

// Array veggies
$veggies = ["bayam", "wortel", "kubis"];
echo "<br>Data veggies:<br>";
for ($i = 0; $i < count($veggies); $i++) {
    echo $veggies[$i] . "<br>";
}
?>
