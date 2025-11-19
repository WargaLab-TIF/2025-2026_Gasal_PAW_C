<?php 
//3.6.1 Implementasi fungsi array_push() 
function my_array_push(&$array, ...$values) { 
foreach ($values as $value) { 
$array[] = $value; // Menambahkan elemen ke akhir array 
} 
} 
// Contoh penggunaan 
$array = [1, 2, 3]; 
my_array_push($array, 4, 5); 
echo "Array setelah array_push: " . implode(", ", $array) . "<br>"; 
// Output: 1, 2, 3, 4, 5 
//3.6.2 Implementasi fungsi array_merge() 
function my_array_merge($array1, $array2) { 
return array_merge($array1, $array2); // Menggabungkan dua array 
} 
// Contoh penggunaan 
$array1 = [1, 2, 3]; 
$array2 = [4, 5]; 
$merged = my_array_merge($array1, $array2); 
echo "Array setelah array_merge: " . implode(", ", $merged) . 
"<br>"; // Output: 1, 2, 3, 4, 5 
 
//3.6.3 Implementasi fungsi array_values() 
function my_array_values($array) { 
    return array_values($array); // Mengambil semua nilai dari array 
} 
 
// Contoh penggunaan 
$assocArray = ['a' => 1, 'b' => 2]; 
$values = my_array_values($assocArray); 
echo "Nilai dari array asosiatif: " . implode(", ", $values) . 
"<b>"; // Output: 1, 2 
 
//3.6.4 Implementasi fungsi array_search() 
function my_array_search($needle, $haystack) { 
    return array_search($needle, $haystack); // Mencari nilai dan 
mengembalikan kuncinya 
} 
 
// Contoh penggunaan 
$array = [1, 2, 3]; 
$key = my_array_search(2, $array); 
echo "Kunci dari nilai '2': $key<br>"; // Output: Kunci dari nilai 
'2': 1 
 
//3.6.5 Implementasi fungsi array_filter() 
function my_array_filter($array, $callback) { 
    return array_filter($array, $callback); // Memfilter elemen 
array 
} 
 
// Contoh penggunaan 
$array = [1, 2, 3, 4, 5]; 
$filtered = my_array_filter($array, function($value) { 
    return $value % 2 === 0; // Memfilter angka genap 
}); 
echo "Array angka genap: " . implode(", ", $filtered) . "<br>"; // 
Output: 2, 4 
 
//3.6.6. Implementasi Fungsi Sorting pada Array 
function my_sort(&$array) { 
sort($array); // Mengurutkan array dari kecil ke besar 
} 
// Contoh penggunaan 
$array = [5, 3, 8, 1]; 
my_sort($array); 
echo "Array setelah diurutkan: " . implode(", ", $array) . "<br>"; 
// Output: 1, 3, 5, 8 
?> 
