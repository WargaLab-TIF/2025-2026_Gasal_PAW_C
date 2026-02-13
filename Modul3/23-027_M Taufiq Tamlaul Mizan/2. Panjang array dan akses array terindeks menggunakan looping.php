<?php
// skrip awal
$fruits=array("Avocado","Bluebarry","Cherry");
$arrlength=count($fruits);

for($x=0; $x< $arrlength; $x++){
    echo $fruits[$x];
    echo "<br>";
}

// 3. 2. 1. Tambahkan 5 data baru dalam array $fruits menggunakan perulangan FOR! Berapa panjang (jumlah data) array $fruits saat ini? Apakah Anda perlu melakukan perubahan pada skrip penggunaan struktur perulangan FOR (skrip baris 5 – 8) untuk menampilkan seluruh data dalam array $fruits dengan adanya penambahan 5 data baru? Mengapa demikian? Jelaskan!

$fruits = array(
    "Avocado",
    "Blueberry",
    "Cherry",
    "Dragonfruit",
    "Elderberry",
    "Fig",
    "Grape",
    "Honeydew"
);

echo "<b>Data buah saat ini:</b><br>";
$panjang_array = count($fruits);

for ($x = 0; $x < $panjang_array; $x++) {
    echo $fruits[$x] . "<br>";
}
// echo "jumlah array setelah di tambahkan 5 data baru : ". count($fruits) . "<br>";

/*  3. 2. 2. Buat array baru dengan nama $veggies yang memiliki 3 buah data! Tampilkan seluruh data dari array $veggies dengan menggunakan struktur perulangan FOR! Apakah Anda membuat skrip baru untuk menampilkan seluruh array $veggies ataukah Anda cukup sedikit memodifikasi skrip yang sudah ada? Mengapa demikian? Jelaskan! */

$veggies = array(
    "teh",
    "kopi",
    "susu",
);

echo "<b>Data buah saat ini:</b><br>";
$panjang_array = count($veggies);

for ($z = 0; $z < $panjang_array; $z++) {
    echo $veggies[$z] . "<br>";
}
?>