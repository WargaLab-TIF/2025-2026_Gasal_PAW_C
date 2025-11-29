<?php
$height = array(
    "Andy"=>"176", 
    "Barry"=>"165", 
    "Charlie"=>"170", 
    "Diana"=>"160", 
    "Eka"=>"172", 
    "Fajar"=>"168", 
    "Gina"=>"158", 
    "Heri"=>"180"
);

unset($height["Barry"]);

$keys = array_keys($height);
$lastKey = end($keys);

echo "Setelah hapus Barry -> Indeks terakhir: " . $lastKey . " dengan tinggi " . $height[$lastKey] . " cm";
?>