<?php 
$fruits = array("Avocado", "Blueberry", "Cherry"); 
$arrlength = count($fruits); 
echo "Data awal dalam array fruits: <br>"; 
for ($x = 0; $x < $arrlength; $x++) { 
echo $fruits[$x]; 
echo "<br>"; 
} 
echo "<hr>"; 
// 3.2.1 Tambahkan 5 data baru dalam array $fruits menggunakan 
perulangan FOR 
$newfruits = array("Jackfruit", "Mango", "Mangosteen", "Orange", 
"Watermelon"); 
for ($i = 0; $i < count($newfruits); $i++) { 
$fruits[] = $newfruits[$i]; 
} 
$arrlength = count($fruits); 
echo "Panjang array saat ini adalah :" . $arrlength . "<br>"; 
echo "Data dalam array fruits saat ini :<br>"; 
for ($x = 0; $x < $arrlength; $x++) { 
echo $fruits[$x]; 
echo "<br>"; 
} 
echo "<hr>"; 
// 3.2.2 Buat array baru dengan nama $veggies yang memiliki 3 
buah data 
$veggies = array("Spinach", "Carrot", "Cucumber"); 
$arrveglength = count($veggies); 
echo "Data dalam array veggies: <br>"; 
for ($y = 0; $y < $arrveglength; $y++) { 
echo $veggies[$y]; 
echo "<br>"; 
} 
?>
