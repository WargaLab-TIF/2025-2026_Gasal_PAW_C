<?php
// 3.4.1 Membuat array awal
$height = array("Andy"=>"176","Barry"=>"165","Charlie"=>"170");

echo "<b>Data awal array height:</b><br>";
foreach($height as $x => $x_value){
    echo "Key=" . $x . ", Value=" . $x_value . "<br>";
}

$height["Sultan"] = "251";
$height["Robert"] = "272";
$height["Suparwono"] = "240";
$height["Vikas"] = "251";
$height["Bernard"] = "249";

// Menampilkan seluruh data setelah ditambah
echo "<br><b>Data array setelah ditambah 5 data baru:</b><br>";
foreach($height as $x => $x_value){
    echo "Key=" . $x . ", Value=" . $x_value . "<br>";
}

// 3.4.2 Membuat array baru $weight
$weight = array(55, 63, 70);

// Menampilkan seluruh data dari array $weight menggunakan FOR
echo "<br><b>Data array weight:</b><br>";
for($i = 0; $i < count($weight); $i++){
    echo "Data ke-" . $i . " = " . $weight[$i] . "<br>";
}
?>
