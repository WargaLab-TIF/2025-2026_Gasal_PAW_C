<?php
echo "<h3>3.2 Panjang Array dan Akses Array Terindeks Menggunakan Looping FOR</h3>";

// Membuat array awal
$fruits = array("Apple", "Banana", "Orange");

echo "<b>Data awal array fruits:</b><br>";
for ($i = 0; $i < count($fruits); $i++) {
    echo "Index ke-$i : $fruits[$i]<br>";
}
echo "<br>";

// ===== 3.2.1 =====
// Tambahkan 5 data baru ke array $fruits menggunakan perulangan FOR
$buah_baru = array("Mangga", "jambu mente", "keres", "Strawberry", "semangka");

for ($i = 0; $i < count($buah_baru); $i++) {
    array_push($fruits, $buah_baru[$i]);
}

// Tampilkan hasil setelah penambahan
echo "<b>3.2.1 Setelah menambah 5 data baru:</b><br>";
for ($i = 0; $i < count($fruits); $i++) {
    echo "Index ke-$i : $fruits[$i]<br>";
}

// Hitung panjang array saat ini
echo "<br>Panjang array fruits sekarang: <b>" . count($fruits) . "</b><br><br>";

// ===== 3.2.2 =====
// Buat array baru dengan nama $veggies yang memiliki 3 buah data
$veggies = array("kulup", "bayan", "Broccoli");

// Tampilkan seluruh data dari array veggies menggunakan looping FOR
echo "<b>3.2.2 Data array veggies:</b><br>";
for ($i = 0; $i < count($veggies); $i++) {
    echo "Index ke-$i : $veggies[$i]<br>";
}
?>
