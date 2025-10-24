<?php
echo "<h3>3.6.1 Implementasi Fungsi array_push()</h3>";

$hewan = array("Kucing", "Anjing", "Kelinci");

// Menambahkan elemen baru ke dalam array
array_push($hewan, "Burung", "Ikan", "Kuda");

echo "Daftar hewan setelah menggunakan array_push():<br>";

foreach ($hewan as $item) {
  echo "- $item<br>";
}
?>
