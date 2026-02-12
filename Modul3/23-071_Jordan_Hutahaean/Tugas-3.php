<?php
$height = ["Andi" => 170, "Budi" => 165, "Citra" => 160];

// 3.3.1 Tambahkan 5 data baru
$height["Dewi"] = 155;
$height["Eko"] = 175;
$height["Fani"] = 168;
$height["Gilang"] = 172;
$height["Hana"] = 163;

echo "Indeks terakhir: " . array_key_last($height) . "<br>";

// 3.3.2 Hapus 1 data
unset($height["Budi"]);
echo "Indeks terakhir setelah penghapusan: " . array_key_last($height) . "<br>";

// 3.3.3 Array weight
$weight = ["Andi" => 65, "Budi" => 60, "Citra" => 55];
echo "Data ke-2 (Budi): " . $weight["Budi"];
?>
