<?php
echo "<h3>3.6.5 Implementasi Fungsi array_filter()</h3>";

// Array berisi daftar umur
$umur = [12, 18, 25, 30, 15, 40, 10];

// Gunakan array_filter untuk mengambil umur >= 18
$dewasa = array_filter($umur, function($u) {
  return $u >= 18;
});

// Tampilkan hasil
echo "Daftar umur yang tergolong dewasa (>= 18):<br>";
foreach ($dewasa as $u) {
  echo "- $u<br>";
}
?>
