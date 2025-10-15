<?php
$height = array("Andy" => 176, "Barry" => 165, "Charlie" => 170);
echo "Andy is ". $height["Andy"]. " cm tall.";
$height["RB"] = 180;
$height["Ainul"] = 160;
$height["Yakin"] = 175;
$height["Ahmad"] = 168;
$height["Dhiyauddin"] = 162;

echo "<br><br>3.3.1. <br>";
echo "Tambahkan 5 data baru ke dalam array height! dan tampilkan nilai indeks terakhir<br>";
foreach($height as $name => $value) {
    echo "<br>";
    echo "Nama: " . $name . ", tall: " . $value . " cm";
}

echo "<br><br>";
$lastValue = end($height);
echo "Nilai indeks terakhir adalah: " . $lastValue . " cm.";

echo "<br><br>3.3.2. <br>";
echo "Hapus 1 data tertentu dari array height! dan tampilkan nilai indeks terakhir <br>";
unset($height["Dhiyauddin"]);
foreach($height as $name => $value) {
    echo "<br>";
    echo "Nama: " . $name . ", tall: " . $value . " cm";
}
echo "<br><br>";
$lastValue = end($height);
echo "Nilai indeks terakhir adalah: " . $lastValue . " cm.";


echo "<br><br>3.3.3. <br>";
echo "Buat array baru weight yang berisi 3 buah data! dan tampilkan data ke-2 dari array <br>";
$weight = array("RB" => 70, "Ainul" => 60, "Yakin" => 65);
foreach($weight as $name => $value) {
    echo "<br>";
    echo "Nama: " . $name . ", weight: " . $value . " kg";
}
echo "<br><br>";
echo $weight["Ainul"] . " kg<br>";