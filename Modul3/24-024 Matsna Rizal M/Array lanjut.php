<?php
echo "<h3>3.6 Eksplorasi Lanjut terhadap Array</h3>";

// Buat array awal
$fruits = array("Apple", "Banana", "Orange", "Mango", "Grapes");

echo "<b>Data awal array fruits:</b><br>";
print_r($fruits);
echo "<br><br>";

// ===== 3.6.1 =====
// Implementasi fungsi array_push()
echo "<b>3.6.1 Fungsi array_push()</b><br>";
array_push($fruits, "Pineapple", "Watermelon");
echo "Setelah menambah 2 data baru:<br>";
print_r($fruits);
echo "<br><br>";

// ===== 3.6.2 =====
// Implementasi fungsi array_merge()
echo "<b>3.6.2 Fungsi array_merge()</b><br>";
$more_fruits = array("Strawberry", "Papaya");
$merged = array_merge($fruits, $more_fruits);
echo "Hasil penggabungan array fruits dan more_fruits:<br>";
print_r($merged);
echo "<br><br>";

// ===== 3.6.3 =====
// Implementasi fungsi array_values()
echo "<b>3.6.3 Fungsi array_values()</b><br>";
$values = array_values($merged);
echo "Hasil konversi ke array numerik:<br>";
print_r($values);
echo "<br><br>";

// ===== 3.6.4 =====
// Implementasi fungsi array_search()
echo "<b>3.6.4 Fungsi array_search()</b><br>";
$cari = "Mango";
$index = array_search($cari, $merged);
echo "Data '$cari' ditemukan pada indeks ke-$index<br><br>";

// ===== 3.6.5 =====
// Implementasi fungsi array_filter()
echo "<b>3.6.5 Fungsi array_filter()</b><br>";
// Menyaring data buah yang memiliki panjang huruf lebih dari 6
$filtered = array_filter($merged, function($buah) {
    return strlen($buah) > 6;
});
echo "Buah dengan nama lebih dari 6 huruf:<br>";
print_r($filtered);
echo "<br><br>";

// ===== 3.6.6 =====
// Implementasi berbagai fungsi sorting pada array
echo "<b>3.6.6 Fungsi Sorting</b><br>";
$sorted = $merged; // duplikat array agar data asli tidak berubah

// Sorting A-Z (ascending)
sort($sorted);
echo "Sorting A-Z:<br>";
print_r($sorted);
echo "<br><br>";

// Sorting Z-A (descending)
rsort($sorted);
echo "Sorting Z-A:<br>";
print_r($sorted);
echo "<br><br>";

// Mengurutkan berdasarkan key (asort & ksort contoh)
$assoc = array("Apple" => 50, "Mango" => 60, "Banana" => 40);
echo "Array asosiatif sebelum diurutkan:<br>";
print_r($assoc);
echo "<br>";

asort($assoc); // urut berdasarkan nilai
echo "Urut berdasarkan nilai (asort):<br>";
print_r($assoc);
echo "<br>";

ksort($assoc); // urut berdasarkan key
echo "Urut berdasarkan key (ksort):<br>";
print_r($assoc);
?>
