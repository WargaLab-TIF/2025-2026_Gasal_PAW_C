<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$newFruits = array("Durian", "Apel", "Mangga", "Anggur", "Kurma");
for ($i = 0 ; $i < count($newFruits); $i++) {
    $fruits[] = $newFruits[$i];
}

$arrlenght = count($fruits);

for ($x = 0; $x < $arrlenght; $x++) {
    echo $fruits[$x];
    echo "<br>";
}

echo "<br>3.2.1. <br>";
echo "array fruits setelah penambahan 5 data baru yaitu : Durian, Apel, Mangga, Anggur, dan Kurma<br>";
echo "Berapa panjang array fruits? <br>";
echo "Panjang array fruits adalah: " . count($fruits) . "<br>";
echo "Apakah perlu mengubah struktur array fruits? <br>";
echo "Tidak perlu, karena array fruits sudah cukup fleksibel untuk menampung data baru.<br><br>";

echo "3.2.2. <br>";
echo "Buatlah array baru veggies yang berisi 3 buah data! <br>";
$veggies = array("Wortel", "Bayam", "Kangkung");
$arrlength = count($veggies);

for ($x = 0; $x < $arrlength; $x++) {
    echo $veggies[$x];
    echo "<br>";
}

echo "Apakah perlu membuat skrip baru untuk array veggies? <br>";
echo "Perlu sedikit modifikasi, pada for loop, disini saya mengubah variabel dari fruits menjadi veggies, untuk selain itu sama saja.<br>";
?>
