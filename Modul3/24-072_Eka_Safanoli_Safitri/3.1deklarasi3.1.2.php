<?php
$fruits = array("Avocado", "Blueberry", "Cherry", "Apple", "Banana", "Orange", "Mango", "Pineapple");

unset($fruits[2]);

foreach($fruits as $index => $value){
    echo "Index $index : $value <br>";
}

echo "<br>Indeks tertinggi sekarang: " . max(array_keys($fruits));
?>