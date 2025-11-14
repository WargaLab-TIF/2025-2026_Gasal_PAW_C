<?php
$veggies = array("Carrot", "Broccoli", "Spinach");

$arrLength = count($veggies);

for($x = 0; $x < $arrLength; $x++) {
    echo "Index $x : " . $veggies[$x] . "<br>";
}
?>