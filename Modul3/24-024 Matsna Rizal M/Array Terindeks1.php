<?php
echo "<h3>3.1 Deklarasi dan Akses Array Terindeks</h3>";

// Membuat array terindeks
$fruits = array("Apple", "Banana", "Orange", "Mango", "Grapes");
echo "Data awal array fruits:<br>";
print_r($fruits);
echo "<br><br>";


// 3.1.1 Tambahkan 5 data baru ke dalam array $fruits
array_push($fruits, "anggur", "kecipir", "Strawberry", "Papaya", "Melon");

echo "Setelah menambahkan 5 data baru:<br>";
print_r($fruits);
echo "<br>";

// Menampilkan nilai dengan indeks tertinggi
$indeks_tertinggi = count($fruits) - 1;
echo "Nilai dengan indeks tertinggi: " . $fruits[$indeks_tertinggi] . "<br>";
echo "Indeks tertinggi dari array fruits adalah: $indeks_tertinggi<br><br>";


// 3.1.2 Hapus 1 data tertentu dari array $fruits (misalnya 'Banana')
unset($fruits[1]); // menghapus data indeks 1 
echo "Setelah menghapus 1 data (Banana):<br>";
print_r($fruits);
echo "<br>";

// Menampilkan nilai dengan indeks tertinggi setelah penghapusan
$indeks_tertinggi = max(array_keys($fruits));
echo "Nilai dengan indeks tertinggi sekarang: " . $fruits[$indeks_tertinggi] . "<br>";
echo "Indeks tertinggi setelah penghapusan: $indeks_tertinggi<br><br>";


// 3.1.3 Buat array baru dengan nama $veggies
$veggies = array("Carrot", "Spinach", "Broccoli");

echo "Data array veggies:<br>";
print_r($veggies);
echo "<br><br>";

// Menampilkan semua data veggies satu per satu
echo "Menampilkan seluruh data veggies:<br>";
foreach ($veggies as $sayur) {
    echo "- $sayur <br>";
}
?>
