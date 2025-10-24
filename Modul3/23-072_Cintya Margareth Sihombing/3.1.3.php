<?php
// Buat array baru berisi nama sayuran
$veggies = array("Bayam", "Kangkung", "Wortel", "Brokoli", "Kacang Panjang");

// Tampilkan seluruh isi array
echo "Daftar sayuran:<br>";
print_r($veggies);
echo "<br><br>";

// Tampilkan satu per satu menggunakan perulangan
echo "Tampilkan satu per satu:<br>";
foreach ($veggies as $index => $sayur) {
    echo "Indeks $index : $sayur<br>";
}
?>
