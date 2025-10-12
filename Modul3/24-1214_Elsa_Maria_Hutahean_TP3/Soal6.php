<?php
// Data awal
$students = [
    ["Alex", "220401", "0812345678"],
    ["Bianca", "220402", "0812345687"],
    ["Candice", "220403", "0812345665"]
];

// 3.6.1 array_push()
array_push($students, ["Daniel", "220404", "0812345699"]);
echo "<h3>3.6.1 array_push()</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

// 3.6.2 array_merge()
$newStudents = [
    ["Ella", "220405", "0812345601"],
    ["Felix", "220406", "0812345612"]
];
$merged = array_merge($students, $newStudents);
echo "<h3>3.6.2 array_merge()</h3>";
echo "<pre>";
print_r($merged);
echo "</pre>";

// 3.6.3 array_values()
$info = ["nama" => "Grace", "nim" => "220407", "hp" => "0812345623"];
echo "<h3>3.6.3 array_values()</h3>";
echo "<pre>";
print_r(array_values($info));
echo "</pre>";

// 3.6.4 array_search()
$names = ["Alex", "Bianca", "Candice", "Daniel"];
$pos = array_search("Bianca", $names);
echo "<h3>3.6.4 array_search()</h3>";
echo "Nama 'Bianca' ada di index ke-<b>$pos</b><br><br>";

// 3.6.5 array_filter()
$numbers = [5, 10, 15, 20, 25, 30];
$filtered = array_filter($numbers, function($n) {
    return $n > 15;
});
echo "<h3>3.6.5 array_filter()</h3>";
echo "Angka yang lebih besar dari 15:<br><pre>";
print_r($filtered);
echo "</pre>";

// 3.6.6 Sorting
$fruits = ["Mango", "Apple", "Orange", "Banana"];
sort($fruits);
echo "<h3>3.6.6 Sorting Ascending (sort)</h3><pre>";
print_r($fruits);
echo "</pre>";

rsort($fruits);
echo "<h3>Sorting Descending (rsort)</h3><pre>";
print_r($fruits);
echo "</pre>";
?>
