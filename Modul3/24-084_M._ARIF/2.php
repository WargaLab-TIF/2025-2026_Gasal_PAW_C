<?php
// 3.2 Panjang Array dan Akses Array Terindeks dengan Looping
// Deklarasi array awal
$fruits = array("Avocado", "Blueberry", "Cherry");

// Hitung panjang array awal
$arrlength = count($fruits);

// Tampilkan semua elemen array menggunakan looping FOR
echo "<h3>Data Awal Array \$fruits:</h3>";
for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}

// 3.2.1 Tambahkan 5 data baru ke array $fruits
$fruits[] = "Durian";
$fruits[] = "Mango";
$fruits[] = "Banana";
$fruits[] = "Orange";
$fruits[] = "Apple";

// Hitung ulang panjang array setelah penambahan
$arrlength = count($fruits);

echo "<hr><h3>3.2.1 Setelah Menambahkan 5 Data Baru:</h3>";
echo "Jumlah data dalam array \$fruits saat ini: " . $arrlength . "<br><br>";

// Gunakan looping FOR yang sama untuk menampilkan semua data
for ($x = 0; $x < $arrlength; $x++) {
    echo "Indeks ke-$x: " . $fruits[$x] . "<br>";
}

// 3.2.2 Buat array baru $veggies dan tampilkan datanya
$veggies = array("Carrot", "Spinach", "Broccoli");
$veglength = count($veggies);

echo "<hr><h3>3.2.2 Array Baru \$veggies:</h3>";
echo "Jumlah data dalam array \$veggies: " . $veglength . "<br><br>";

// Gunakan looping FOR juga untuk menampilkan seluruh data
for ($i = 0; $i < $veglength; $i++) {
    echo "Indeks ke-$i: " . $veggies[$i] . "<br>";
}
?>