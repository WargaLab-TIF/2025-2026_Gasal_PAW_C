<?php
echo "1. Fungsi (dasar)<br>";
function writeMsg() {
    echo "Hello world!";
}
writeMsg(); // call the function
?>
    
<br><br>

<?php
echo "2. Fungsi dengan argumen<br>";
function familyName1($fname) {
    echo "$fname Refsnes.<br>";
}
familyName1("Jani");
familyName1("Hege");
familyName1("Stale");
familyName1("Kai Jim");
familyName1("Borge");
?>

<br>

<?php
echo "3. Fungsi dengan beberapa argumen<br>";
function familyName2($fname, $year) {
    echo "$fname Refsnes. Born in $year <br>";
}
familyName2("Hege", "1975");
familyName2("Stale", "1978");
familyName2("Kai Jim", "1983");
?>

<br>

<?php
echo "4. Fungsi dengan nilai default pada argumen<br>";
function setHeight($minheight = 50) {
    echo "The height is : $minheight <br>";
}

setHeight(350);
setHeight();   // akan menggunakan nilai default 50
setHeight(135);
setHeight(80);
?>

<br>

<?php
echo "5. Fungsi dengan nilai kembali (return)<br>";
function sum($x, $y) {
    $z = $x + $y;
    return $z;
}

echo "5 + 10 = " . sum(5, 10) . "<br>";
echo "7 + 13 = " . sum(7, 13) . "<br>";
echo "2 + 4 = " . sum(2, 4);
?>