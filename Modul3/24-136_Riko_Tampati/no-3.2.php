<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits);

echo "Panjang data awal: $arrlength <br><br>";

for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}

$buahBaru = array("Mangga", "Apel", "Melon", "Semangka", "Jeruk");
for ($i = 0; $i < count($buahBaru); $i++) {
    $fruits[] = $buahBaru[$i];
}

echo "<br>Setelah ditambah 5 data baru:<br>";
$arrlength = count($fruits); 
for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}

echo "<br>Panjang array fruits saat ini: $arrlength <br><br>";

$veggies = array("lemon", "Salak", "anggur");

echo "Data array Veggies:<br>";
for ($i = 0; $i < count($veggies); $i++) {
    echo $veggies[$i] . "<br>";
}
?>
