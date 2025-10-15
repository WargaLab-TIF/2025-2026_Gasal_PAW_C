<?php

$fruits = ["Apple", "Banana", "Mango"];
echo "Array awal: ";
print_r($fruits);
echo "<br>";

array_push($fruits, "Orange", "Grape");
echo "Array setelah array_push(): ";
print_r($fruits);
echo "<br><br><hr>";


$veggies = ["Carrot", "Broccoli", "Spinach"];
$merged = array_merge($fruits, $veggies);

echo "Hasil penggabungan array fruits dan veggies:<br>";
print_r($merged);
echo "<br><br><hr>";


$student = [
    "Name" => "Riko Tampati",
    "NIM" => "24136",
    "Prodi" => "Teknik Informatika"
];
echo "Array asosiatif:<br>";
print_r($student);
echo "<br>";

$values = array_values($student);
echo "Hasil array_values() (mengambil hanya nilai):<br>";
print_r($values);
echo "<br><br><hr>";



$numbers = [10, 20, 30, 40, 50];
$search = array_search(30, $numbers);

echo "Isi array numbers: ";
print_r($numbers);
echo "<br>";
echo "Nilai 30 ditemukan pada indeks ke-$search";
echo "<br><br><hr>";



$umur_awal = [17, 20, 22, 15, 30, 25];
echo "Array usia awal: ";
print_r($umur_awal);
echo "<br>";

$adult = array_filter($umur_awal, function($umur) {
    return $umur >= 18;
});
echo "Hasil array_filter() (usia >= 18): ";
print_r($adult);
echo "<br><br><hr>";


$numbers2 = [40, 10, 30, 50, 20];

echo "Array awal: ";
print_r($numbers2);
echo "<br>";

sort($numbers2);
echo "Hasil sort() (menaik): ";
print_r($numbers2);
echo "<br>";

rsort($numbers2);
echo "Hasil rsort() (menurun): ";
print_r($numbers2);
echo "<br><br>";

$asosiatif = ["b" => 30, "a" => 10, "c" => 20];

asort($asosiatif);
echo "Hasil asort() (menaik berdasarkan nilai): ";
print_r($asosiatif);
echo "<br>";

ksort($asosiatif);
echo "Hasil ksort() (menaik berdasarkan key): ";
print_r($asosiatif);
echo "<br>";

arsort($asosiatif);
echo "Hasil arsort() (menurun berdasarkan nilai): ";
print_r($asosiatif);
echo "<br>";

krsort($asosiatif);
echo "Hasil krsort() (menurun berdasarkan key): ";
print_r($asosiatif);
echo "<br>";
?>
