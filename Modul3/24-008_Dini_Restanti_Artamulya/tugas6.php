<?php
$buah = array("mangga","apel","pisang","melon","");
echo "<h3>Data Awal : </h3>" ;
print_r ($buah);

echo "<h3>1. array_push()</h3>";
array_push($buah, "kiwi", "alpukat");
print_r($buah);


echo "<h3>2. array_merge()</h3>";
$more_fruits = array("pepaya", "anggur");
$merged = array_merge($buah, $more_fruits);
print_r($merged);


echo "<h3>3. array_values()</h3>";
$new_values = array_values($buah);
print_r($new_values);


echo "<h3>4. array_search()</h3>";
$cari = "pisang";
$hasil = array_search($cari, $buah);
if ($hasil !== false) {
    echo "Elemen '$cari' ditemukan pada indeks: $hasil<br>";
} else {
    echo "Elemen '$cari' tidak ditemukan.<br>";
}


echo "<h3>5. array_filter()</h3>";
$filtered = array_filter($buah, function($fruit) {
    return strlen($fruit) > 5;
});
print_r($filtered);


echo "<h3>6. Sorting (Urutkan Array)</h3>";
$angka = array(5, 1, 8, 3, 7);
echo "Array sebelum diurutkan: ";
print_r($angka);

sort($angka); 
echo "<br>Array setelah sort() (naik): ";
echo "<br>";
print_r($angka);

rsort($angka);
echo "<br>Array setelah rsort() (turun): ";
echo "<br>";
print_r($angka);
?>
