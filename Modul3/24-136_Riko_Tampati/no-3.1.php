<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . "." . "<br> <br>" ; 


echo "Setelah di tambahkan 5 data baru" . "<br> <br>";
array_push($fruits,"jeruk");
array_push($fruits,"apel");
array_push($fruits,"semangka");
array_push($fruits,"anggur");
array_push($fruits,"mangga");
echo "I like " . $fruits[0] . ", " . $fruits[1] . ", " . $fruits[2] . ", " . $fruits[3]. ", " . $fruits[4] . ", " . $fruits[5]. "," . $fruits[6] . "," . $fruits[7] ;


$indeks = count($fruits) - 1;
    echo "<br>".$fruits[$indeks]." indeks ke $indeks dan indeks terakhir" . "<br><br>";

echo "data setelah di hapus 1";

array_splice($fruits,1,1);


$indeks1 = count($fruits) - 1;
    echo "<br>indeks tertinggi sekarang setelah update $indeks1";

$veggies = array("melon","sabu","duku");
    echo "<br>". $veggies[0].", ".$veggies[1].", ".$veggies[2];

?>
