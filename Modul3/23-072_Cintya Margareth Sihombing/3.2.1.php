<?php
// Deklarasi array awal
$fruits = array("Avocado", "Blueberry", "Cherry");

// Tambahkan 5 data baru menggunakan perulangan FOR
$buahBaru = array("Kiwi", "Jeruk", "Pepaya", "Nangka", "Strawberry");

for ($i = 0; $i < count($buahBaru); $i++) {
    $fruits[] = $buahBaru[$i];
}

// Hitung panjang array setelah penambahan
$arrayLength = count($fruits);

// Tampilkan jumlah data dalam array
echo "Jumlah data dalam array \$fruits saat ini: $arrayLength<br><br>";

// Tampilkan seluruh isi array menggunakan perulangan FOR
echo "Daftar seluruh buah:<br>";
for ($x = 0; $x < $arrayLength; $x++) {
    echo $fruits[$x] . "<br>";
}
?>
