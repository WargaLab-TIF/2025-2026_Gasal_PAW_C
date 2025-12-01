<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

echo "<b>Data array sebelum ditambah:</b><br>";
for ($x = 0; $x < count($fruits); $x++) {
    echo $fruits[$x] . "<br>";
}

// Jawaban 3.2.1
$new_Fruits = array("Apple","Orange","Banana","Grape","Mango");

for ($x = 0; $x < count($new_Fruits); $x++) {
    $fruits[] = $new_Fruits[$x]; 
}

echo "<br><b>Data array setelah ditambah 5 buah baru:</b><br>";
for ($x = 0; $x < count($fruits); $x++) {
    echo $fruits[$x] . "<br>";
}

echo "<br>Panjang array saat ini adalah: " . count($fruits);
// Panjang array $fruits sekarang: 8 elemen.
// Perubahan pada FOR: Tidak perlu diubah karena count($fruits) menyesuaikan otomatis.
// Untuk $veggies: Cukup modifikasi sedikit skrip yang ada, cukup ganti nama array-nya saja.
// Jawaban 3.2.2
$veggies = array("Potato","Carrot","Spinach");

echo "<br><br><b>Data array veggies:</b><br>";
for ($x = 0; $x < count($veggies); $x++) {
    echo $veggies[$x] . "<br>";
}
// Saya tidak membuat struktur perulangan baru dari nol,
// hanya sedikit memodifikasi skrip yang sudah ada dengan mengganti nama array dari $fruits menjadi $veggies.
// Karena logika FOR-nya sama: menampilkan seluruh elemen dalam array berdasarkan jumlah datanya menggunakan count().

?>
