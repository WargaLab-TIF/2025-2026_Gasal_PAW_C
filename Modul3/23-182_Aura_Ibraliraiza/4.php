<?php 
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => 
"170"); 
foreach($height as $x => $x_value) { 
echo "Key=" . $x . ", Value=" . $x_value; 
echo "<br>"; 
} 
echo "<hr>"; 
// 3.4.1 Tambahkan 5 data baru dalam array $height 
$height["Uum"] = "175"; 
$height["Aril"] = "160"; 
$height["Putri"] = "152"; 
$height["Dea"] = "168"; 
$height["Retha"] = "150"; 
foreach($height as $x => $x_value) { 
echo "Key=" . $x . ", Value=" . $x_value; 
echo "<br>"; 
} 
echo "<hr>"; 
// 3.4.2 Buat array baru dengan nama $weight yang memiliki 3 
buah data 
$weight = array( 
"Andy" => "70", 
"Barry" => "65", 
"Charlie" => "68" 
); 
foreach($weight as $x => $x_value) { 
echo "Key=" . $x . ", Value=" . $x_value; 
echo "<br>"; 
} 
?>
