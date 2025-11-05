<?php
$fruits = array("Apple", "Banana", "Orange");
$panjang_arry=count($fruits);
for ($i = 0; $i < $panjang_arry; $i++) {
    echo $fruits[$i]."<br>";
}
echo "Jumlah data dalam array: ". $panjang_arry."<br><br>";

$fruits[] = "Semangka";
$fruits[] = "Pisang";
$fruits[] = "Melon";
$fruits[] = "Apel";
$fruits[] = "Kiwi";
$panjang_arry = count($fruits);
$panjang = count($fruits);
for ($i = 0; $i < $panjang; $i++) {
    echo $fruits[$i] . "<br>";
}
echo "Jumlah data dalam array: $panjang<br>";

$veggies = array("Worter", "Tomat", "Cabe");
echo "<br>Data Sayur:<br>";
for ($i = 0; $i < count($veggies); $i++) {
    echo $veggies[$i] . "<br>";
}
?>
