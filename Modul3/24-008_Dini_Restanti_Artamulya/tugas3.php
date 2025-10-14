<?php
$height = array("Andi" => 160,"Budi" => 165,"Citra" => 170);
echo "<h3>Data awal: </h3>";
print_r($height);

$height["Mingyu"] = 187;
$height["Soobin"] = 185;
$height["Olivia"] = 165;
$height["Niki"] = 168;
$height["Yeonjun"] = 182;
echo "<h3>Data baru: </h3>";
print_r($height);

$keys = array_keys($height);
$lastKey = end($keys);
echo "<br><br>Nilai Indeks Terakhir: ".$lastKey." [".$height[$lastKey]."] ";

unset($height["Jaehwan"]);
echo "<h3>Setelah Menghapus:</h3>";
print_r($height);
$keys = array_keys($height);
$lastKey = end($keys);
echo "<br><br>Nilai Indeks Terakhir: ".$lastKey." [".$height[$lastKey]."] ";


$weight = array("suga" => 60, "nana" => 65, "koya" => 58);
$values = array_values($weight);
$keys = array_keys($weight);
echo "<br><br>Data ke-2 dari array weight: " . $keys[1] ." ". $values[1];
?>
