<?php
$height = ["Andi" => 170, "Budi" => 165, "Citra" => 160, "Dewi" => 155, "Eko" => 175];

// Tambahkan 5 data baru
$height["Fani"] = 168;
$height["Gilang"] = 172;
$height["Hana"] = 163;
$height["Irfan"] = 169;
$height["Joko"] = 171;

// Tampilkan semua data
foreach ($height as $nama => $tinggi) {
    echo "$nama : $tinggi cm<br>";
}

// Array weight
$weight = ["Andi" => 65, "Citra" => 55, "Eko" => 70];
echo "<br>Data berat badan:<br>";
foreach ($weight as $nama => $berat) {
    echo "$nama : $berat kg<br>";
}
?>
