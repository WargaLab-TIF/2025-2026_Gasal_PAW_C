<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");

echo "Data Height Awal:<br><br>";

$keys = array_keys($height); 
for ($i = 0; $i < count($height); $i++) {
    $key = $keys[$i];
    echo "Key = " . $key . ", Value = " . $height[$key] . "<br>";
}

$height["Septi"] = "160";
$height["Riko"] = "175";
$height["El"] = "168";
$height["Biyan"] = "180";
$height["Arfian"] = "162";

echo "<br>Data Height Setelah Penambahan:<br><br>";
$keys = array_keys($height);
for ($i = 0; $i < count($height); $i++) {
    $key = $keys[$i];
    echo "Key = " . $key . ", Value = " . $height[$key] . "<br>";
}

$weight = array("Andy" => "65","Barry" => "58","Charlie" => "63");

echo "<br>Data Weight:<br>";
$keys = array_keys($weight);
for ($i = 0; $i < count($weight); $i++) {
    $key = $keys[$i];
    echo "Key = " . $key . ", Value = " . $weight[$key] . " kg<br>";
}
?>
