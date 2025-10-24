<?php
// Deklarasi array awal
$fruits = array("Avocado", "Blueberry", "Cherry", "Manggis", "Kelapa", "Belimbing", "Duku", "Cempedak");

// Hapus 1 data tertentu (misalnya "Duku" di indeks ke-6)
unset($fruits[6]);

// Tampilkan seluruh isi array setelah dihapus
echo "Setelah menghapus 1 data (Duku):<br>";
print_r($fruits);
echo "<br><br>";

// Cari indeks tertinggi dari array saat ini
$indeks_tertinggi = max(array_keys($fruits));

// Tampilkan nilai dengan indeks tertinggi
echo "Nilai dengan indeks tertinggi sekarang: " . $fruits[$indeks_tertinggi] . "<br>";
echo "Indeks tertinggi dari array \$fruits sekarang adalah: $indeks_tertinggi<br>";
?>
