<?php
echo "<h3>3.6.6 Implementasi Berbagai Fungsi Sorting pada Array</h3>";

$sayur = array(
  "Wortel" => 14,
  "Bayam" => 8,
  "Kangkung" => 12,
  "Tomat" => 6,
  "Kol" => 10
);

echo "<b>Data awal:</b><br>";
foreach ($sayur as $nama => $stok) {
  echo "- $nama : $stok ikat<br>";
}

// sort() - Mengurutkan berdasarkan nilai (menaik)
$sortNilai = $sayur;
sort($sortNilai);
echo "<br><b>Hasil sort() (berdasarkan nilai menaik):</b><br>";
foreach ($sortNilai as $item) {
  echo "- $item<br>";
}

// rsort() - Mengurutkan berdasarkan nilai (menurun)
$rsortNilai = $sayur;
rsort($rsortNilai);
echo "<br><b>Hasil rsort() (berdasarkan nilai menurun):</b><br>";
foreach ($rsortNilai as $item) {
  echo "- $item<br>";
}

// asort() - Mengurutkan array asosiatif berdasarkan nilai (menaik)
$asortNilai = $sayur;
asort($asortNilai);
echo "<br><b>Hasil asort() (berdasarkan nilai menaik, mempertahankan key):</b><br>";
foreach ($asortNilai as $nama => $stok) {
  echo "- $nama : $stok ikat<br>";
}

// arsort() - Mengurutkan array asosiatif berdasarkan nilai (menurun)
$arsortNilai = $sayur;
arsort($arsortNilai);
echo "<br><b>Hasil arsort() (berdasarkan nilai menurun, mempertahankan key):</b><br>";
foreach ($arsortNilai as $nama => $stok) {
  echo "- $nama : $stok ikat<br>";
}
?>
