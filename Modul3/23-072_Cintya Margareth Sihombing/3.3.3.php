<?php
// Buat array baru berisi 3 data berat badan
$weight = array(
    "Dina" => "54",
    "Eko" => "70",
    "Salsa" => "61"
);

// Tampilkan seluruh data
echo "Daftar berat badan:<br>";
foreach ($weight as $name => $kg) {
    echo "$name = $kg kg<br>";
}

// Ambil data ke-2
$keys = array_keys($weight);
$secondKey = $keys[1];

echo "<br>Data ke-2 adalah: $secondKey = " . $weight[$secondKey] . " kg";
?>
