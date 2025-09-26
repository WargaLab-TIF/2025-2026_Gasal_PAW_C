<?php 
$kalimat1 = "Cuaca hari ini sangat jelek dan mendung";
$kalimat2 = "pemandangan dari puncak sangat jelek ";
echo $kalimat1;
echo "<br>";
echo str_replace("jelek","***",$kalimat1) ;
echo "<br>";
echo "<br>";
echo $kalimat2 ;
echo "<br>";
echo str_replace("jelek","***",$kalimat2)
?>