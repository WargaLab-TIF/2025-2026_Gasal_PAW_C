<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

$height["Diana"] = "160";
$height["Eka"]   = "172";
$height["Fajar"] = "168";
$height["Gina"]  = "158";
$height["Heri"]  = "180";

foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value . "<br>";
}
?>