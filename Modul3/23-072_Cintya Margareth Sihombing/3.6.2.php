<?php
echo "<h3>3.6.2 Implementasi Fungsi array_merge()</h3>";

// Dua array yang akan digabungkan
$kendaraan1 = array("Mobil", "Motor", "Bus");
$kendaraan2 = array("Truk", "Sepeda", "Kapal");

// Menggabungkan dua array menggunakan array_merge()
$gabung = array_merge($kendaraan1, $kendaraan2);

echo "Hasil penggabungan dua array kendaraan:<br>";

foreach ($gabung as $item) {
  echo "- $item<br>";
}
?>
