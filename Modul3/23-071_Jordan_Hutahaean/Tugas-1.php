<?php
// Deklarasi array terindeks
$fruits = array("apel", "jeruk", "pisang", "mangga", "semangka");

// 3.1.1 Tambahkan 5 data baru
array_push($fruits, "pepaya", "anggur", "melon", "nanas", "jambu");
echo "Indeks tertinggi setelah penambahan: " . (count($fruits) - 1) . "<br>";

// 3.1.2 Hapus 1 data tertentu (misal 'pisang')
unset($fruits[2]);
echo "Indeks tertinggi setelah penghapusan: " . (count($fruits) - 1) . "<br>";

// 3.1.3 Buat array baru veggies
$veggies = array("bayam", "wortel", "kubis");
echo "Isi array veggies: ";
print_r($veggies);
?>
