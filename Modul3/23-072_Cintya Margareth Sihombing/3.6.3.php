<?php
echo "<h3>3.6.3 Implementasi Fungsi array_values()</h3>";

$nilaiSiswa = array(
  "Cintya" => 90,
  "Rafi" => 85,
  "Dinda" => 93,
  "Bagas" => 88
);

// Mengambil semua nilai dari array asosiatif
$values = array_values($nilaiSiswa);

echo "Nilai dari array asosiatif (tanpa key):<br>";

foreach ($values as $v) {
  echo "- $v<br>";
}
?>
