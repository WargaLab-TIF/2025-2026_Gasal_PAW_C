<?php
$height = array("Andi" => 160,"Budi" => 165,"Citra" => 170);

echo "<h3>Data Awall :</h3>";
foreach ($height as $nama => $tinggi) {
    echo "$nama : $tinggi cm<br>";
}

$height["Mingyu"] = 187;
$height["Soobin"] = 185;
$height["Olivia"] = 165;
$height["Niki"] = 168;
$height["Yeonjun"] = 182;

echo "<h3>Data Baru:</h3>";
foreach ($height as $nama => $tinggi) {
    echo "$nama : $tinggi cm<br>";
}


$weight = array("Andi" => 60, "Budi" => 65, "Citra" => 58);
echo "<br><h3>Data Berat Badan:</h3>";
foreach ($weight as $nama => $berat) {
    echo "$nama : $berat kg<br>";
}
?>
