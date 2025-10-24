<?php
// Data awal (lanjutan dari 3.3.1)
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170",
    "Nina" => "162",
    "Oscar" => "178",
    "Paul" => "169",
    "Quinn" => "173",
    "Rina" => "167"
);

// Hapus 1 data tertentu (misalnya "Nina")
unset($height["Nina"]);

// Tampilkan hasil setelah dihapus
echo "Daftar tinggi badan setelah Nina dihapus:<br>";
foreach ($height as $name => $cm) {
    echo "$name = $cm cm<br>";
}

// Ambil key terakhir setelah penghapusan
$keys = array_keys($height);
$lastKey = end($keys);

echo "<br>Nilai dengan indeks terakhir setelah penghapusan: " . $height[$lastKey] . " cm (atas nama $lastKey)";
?>
