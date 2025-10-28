<?php
// Deklarasi array awal
$fruits = array("Avocado", "Blueberry", "Cherry");

// Tambahkan 5 data baru
$fruits[] = "Manggis";
$fruits[] = "Kelapa";
$fruits[] = "Belimbing";
$fruits[] = "Duku";
$fruits[] = "Cempedak";

// Tampilkan semua isi array
echo "Daftar buah:<br>";
print_r($fruits);
echo "<br><br>";

// Tampilkan nilai dengan indeks tertinggi
$indeks_tertinggi = max(array_keys($fruits));
echo "Nilai dengan indeks tertinggi: " . $fruits[$indeks_tertinggi] . "<br>";
echo "Indeks tertinggi dari array \$fruits adalah: $indeks_tertinggi<br>";
?>
