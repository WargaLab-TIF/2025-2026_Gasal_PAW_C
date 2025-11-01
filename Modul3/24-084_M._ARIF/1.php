<?php
// Deklarasi array awal
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "<pre>";
echo "<h3>Data Awal Array \$fruits:</h3>";
print_r($fruits);
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";

// Tambahkan 5 data baru ke array $fruits
$fruits[] = "Durian";
$fruits[] = "Mango";
$fruits[] = "Banana";
$fruits[] = "Orange";
$fruits[] = "Apple";

echo "<hr><h3>3.1.1 Tambahkan 5 Data Baru:</h3>";
print_r($fruits);

// Hitung indeks tertinggi
$indeks_tertinggi = count($fruits) - 1;
echo "<br><br>Nilai dengan indeks tertinggi: " . $fruits[$indeks_tertinggi];
echo "<br>Indeks tertinggi dari array \$fruits: " . $indeks_tertinggi;

// Hapus 1 data tertentu dari array $fruits
unset($fruits[2]); // Hapus data "Cherry"

// Susun ulang indeks agar berurutan kembali
$fruits = array_values($fruits);

echo "<hr><h3>3.1.2 Setelah Menghapus 1 Data ('Cherry'):</h3>";
print_r($fruits);

// Hitung ulang indeks tertinggi
$indeks_tertinggi_baru = count($fruits) - 1;
echo "<br><br>Nilai dengan indeks tertinggi sekarang: " . $fruits[$indeks_tertinggi_baru];
echo "<br>Indeks tertinggi sekarang: " . $indeks_tertinggi_baru;

// Buat array baru $veggies dan tampilkan datanya
$veggies = array("Carrot", "Spinach", "Broccoli");

echo "<hr><h3>3.1.3 Array Baru \$veggies:</h3>";
print_r($veggies);
?>