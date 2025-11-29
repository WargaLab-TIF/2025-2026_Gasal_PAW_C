<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

echo "<h3>daftar buah awal: </h3>" ;
print_r ($fruits);

$fruits[] = "semangka";
$fruits[] = "pisang";
$fruits[] = "melon";
$fruits[] = "apel";
$fruits[] = "kiwi";

echo "<h3>daftar buah setelah di tambahkan: </h3>";
print_r($fruits);

$indeks_tertinggi = count($fruits) - 1;
echo " <br><br>Nilai pada indeks tertinggi: " . $fruits[$indeks_tertinggi] ." [".$indeks_tertinggi."] "."<br>";

echo "<h3>Sebelum Dihapus: </h3>";
print_r($fruits);
unset($fruits[2]); 
echo "<h3>Setelah Menghapus:</h3>";
print_r($fruits);
$indeks_tertinggi = count($fruits) - 1;
echo " <br><br>Nilai pada indeks tertinggi: " . $fruits[$indeks_tertinggi] ." [".$indeks_tertinggi."] "."<br>";

$veggies = array("wortel", "tomat", "cabe");
echo "<h3>Array Sayur: </h3>";
print_r($veggies);
?>
