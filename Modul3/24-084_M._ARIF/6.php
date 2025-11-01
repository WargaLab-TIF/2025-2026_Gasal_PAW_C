<?php
// 3.6 Eksplorasi Lanjut terhadap Array di PHP
echo "<pre>";
// Data awal array
$buah1 = array("Apel", "Jeruk", "Mangga");
$buah2 = array("Pisang", "Melon", "Anggur");

echo "<h2>3.6 Eksplorasi Lanjut terhadap Array</h2>";

// 3.6.1 Implementasi fungsi array_push()
echo "<h3>3.6.1 Fungsi array_push()</h3>";
array_push($buah1, "Semangka", "Pepaya");
echo "Setelah array_push: ";
print_r($buah1);
echo "<br><br>";

// 3.6.2 Implementasi fungsi array_merge()
echo "<h3>3.6.2 Fungsi array_merge()</h3>";
$gabung = array_merge($buah1, $buah2);
echo "Hasil penggabungan array: ";
print_r($gabung);
echo "<br><br>";

// 3.6.3 Implementasi fungsi array_values()
echo "<h3>3.6.3 Fungsi array_values()</h3>";
$buah_assoc = array("a"=>"Apel", "b"=>"Jeruk", "c"=>"Mangga");
echo "Array asosiatif awal: ";
print_r($buah_assoc);
echo "<br>";
$hasil_values = array_values($buah_assoc);
echo "Hasil array_values (menghapus key): ";
print_r($hasil_values);
echo "<br><br>";

// 3.6.4 Implementasi fungsi array_search()
echo "<h3>3.6.4 Fungsi array_search()</h3>";
$posisi = array_search("Mangga", $gabung);
echo "Posisi elemen 'Mangga' dalam array gabung: " . $posisi;
echo "<br><br>";

// 3.6.5 Implementasi fungsi array_filter()
echo "<h3>3.6.5 Fungsi array_filter()</h3>";
$angka = array(10, 25, 30, 40, 55, 60, 75, 90);
echo "Array angka awal: ";
print_r($angka);
echo "<br>";

$hasil_filter = array_filter($angka, function($n) {
    return $n > 50;
});
echo "Hasil array_filter (nilai > 50): ";
print_r($hasil_filter);
echo "<br><br>";

// 3.6.6 Implementasi berbagai fungsi sorting
echo "<h3>3.6.6 Berbagai Fungsi Sorting</h3>";
$nama = array("Doni", "Budi", "Citra", "Eka", "Andi");

echo "Array sebelum sorting: ";
print_r($nama);
echo "<br>";

// sort() - mengurutkan dari A-Z
sort($nama);
echo "Setelah sort (A-Z): ";
print_r($nama);
echo "<br>";

// rsort() - mengurutkan dari Z-A
rsort($nama);
echo "Setelah rsort (Z-A): ";
print_r($nama);
echo "<br>";

// asort() - mengurutkan berdasarkan nilai dengan key tetap
$umur = array("Andi"=>21, "Budi"=>19, "Citra"=>22);
asort($umur);
echo "Setelah asort (urut nilai, key tetap): ";
print_r($umur);
echo "<br>";

// ksort() - mengurutkan berdasarkan key (nama)
ksort($umur);
echo "Setelah ksort (urut key): ";
print_r($umur);
echo "<br>";
?>