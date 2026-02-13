<?php
// array awal 
$fruits=array("Avocado","Bluebarry","Charry");
echo "i like " . $fruits[0] . "," . $fruits[1] . " and " . $fruits[2] . ","."<br>";

// 3.1.1 Tambahkan 5 data baru dalam array $fruits! Tampilkan nilai dengan indeks tertinggi dari array $fruits! Berapa indeks tertinggi dari array $fruits?
$fruits=array("Avocado","Bluebarry","Charry","daragonfruits","grape","tomato","apple","orange");

$indeks_tertinggi=count($fruits)-1;
$total_indeks= $fruits[$indeks_tertinggi];
echo "index tertinggi adalah : " . $indeks_tertinggi . "<br>";
echo "indeks angka tertinggi adalah : " . $total_indeks . "<br>"; 

// 3.1.2 Hapus 1 data tertentu dari array $fruits! Tampilkan nilai dengan indeks tertinggi dari array $fruits! Berapa indeks tertinggi dari array $fruits?

$fruits=array("Avocado","Bluebarry","dragonfruits","Charry","grape","tomato","apple","orange");

unset($fruits[5]);
$indeks_tertinggi=count($fruits)-1;
$total_indeks= $fruits[$indeks_tertinggi];
echo "index tertinggi adalah : " . $indeks_tertinggi . "<br>";
echo "indeks angka tertinggi adalah : " . $total_indeks . "<br>";

// 3.1.3 Buat array baru dengan nama $weight yang memiliki 3 buah data! Tampilkan data ke-2 dari array $weight!
$veggies=array("teh","kopi","susu");
print_r($veggies);
?>