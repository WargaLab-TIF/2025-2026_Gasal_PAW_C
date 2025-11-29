<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

$newFruits = array("Apple", "Banana", "Orange", "Mango", "Pineapple");
for($i = 0; $i < count($newFruits); $i++){
    $fruits[] = $newFruits[$i];
}

$arrLength = count($fruits);

for($x = 0; $x < $arrLength; $x++) {
    echo "Index $x : " . $fruits[$x] . "<br>";
}

echo "<br>Panjang array fruits saat ini: " . $arrLength;
?>