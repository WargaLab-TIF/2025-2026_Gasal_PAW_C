<?php
echo "<h3>3.6.4 Implementasi Fungsi array_search()</h3>";

$kota = array(
    "Jakarta", 
    "Bandung", 
    "Surabaya", 
    "Medan", 
    "Denpasar"
);

// Mencari posisi dari "Medan"
$cari = array_search("Medan", $kota);

echo "Kota 'Medan' ditemukan pada indeks ke-<b>$cari</b><br>";
?>
