<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

$height["Diana"] = "160";
$height["Eka"]   = "172";
$height["Fajar"] = "168";
$height["Gina"]  = "158";
$height["Heri"]  = "180";

$keys = array_keys($height);

$lastKey = end($keys);

echo "Indeks terakhir: " . $lastKey . " dengan tinggi " . $height[$lastKey] . " cm";
?>
