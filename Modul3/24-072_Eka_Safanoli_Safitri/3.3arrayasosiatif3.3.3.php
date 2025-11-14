<?php
$weight = array("Andy"=>60, "Barry"=>55, "Charlie"=>70);

$keys = array_keys($weight);

$secondKey = $keys[1];

echo "Data ke-2: " . $secondKey . " dengan berat " . $weight[$secondKey] . " kg";
?>