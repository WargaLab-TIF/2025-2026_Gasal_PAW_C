<?php
// Array awal
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");

// Tambahkan 5 data baru (nama & nilai berbeda)
$height["Nina"] = "162";
$height["Oscar"] = "178";
$height["Paul"] = "169";
$height["Quinn"] = "173";
$height["Rina"] = "167";

// Tampilkan semua data
echo "Daftar tinggi badan:<br>";
foreach ($height as $name => $cm) {
    echo "$name = $cm cm<br>";
}

// Ambil key terakhir dan tampilkan nilainya
$keys = array_keys($height);
$lastKey = end($keys);
echo "<br>Nilai dengan indeks terakhir adalah: " . $height[$lastKey] . " cm (atas nama $lastKey)";
?>
