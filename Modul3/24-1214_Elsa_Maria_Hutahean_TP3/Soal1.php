<?php
$fruits = array("Avocado","Blueberry","Cherry");
echo " I like " . $fruits[0].",". $fruits[1]." And  ". $fruits[2];

// Jawaban 3.1.1

array_push($fruits, "Apple","Orange","Banana","Grape","Manggo");
echo "<br> Data array fruits Setelah ditambah 5 data baru:<br>";
echo "<pre>";
print_r($fruits);
echo "</pre>";


// Jawaban 3.1.2

unset($fruits[4]);
echo "Setelah menghapus 'Orange' :<br>";
echo "<pre>";
print_r($fruits);
echo "</pre>";
$indeks_Tertinggi = max(array_keys($fruits));
echo "Nilai dengan indeks tertinggi sekarang: " . $fruits[$indeks_Tertinggi] . " Indeks :" .  $indeks_Tertinggi . "<br>";

// Jawaban 3.1.3

$veggies = array("Potato","Carrot","Spinach");
echo "<br>Data array yang Baru dibuat :<br>";
echo "<pre>";
print_r($veggies);
echo "</pre>";


?>