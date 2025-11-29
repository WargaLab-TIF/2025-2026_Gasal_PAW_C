<?php
$height = array("Andy" => 176, "Barry" => 165, "Charlie" => 170);
echo "Andy is ". $height["Andy"]. " cm tall.";
$height["RB"] = 180;
$height["Ainul"] = 160;
$height["Yakin"] = 175;
$height["Ahmad"] = 168;
$height["Dhiyauddin"] = 162;

foreach($height as $name => $value) {
    echo "<br>";
    echo "Nama: " . $name . ", tall: " . $value . " cm";
}

echo "<br><br>3.4.1. <br>";
echo "Tambahkan 5 data baru ke dalam array height! apakah perlu perubahaan skrip setelah penambahan 5 data<br>";
echo "Tidak perlu, karena pada foreach sudah otomatis menyesuaikan dengan jumlah data yang ada di array height.<br><br>";

$weight = array("RB" => 70, "Ainul" => 60, "Yakin" => 65);
foreach($weight as $name => $value) {
    echo "<br>";
    echo "Nama: " . $name . ", weight: " . $value . " kg";
}

echo "<br><br>3.4.2. <br>";
echo "Buat array baru weight yang berisi 3 buah data! apakah perlu perubahaan skrip setelah pembuatan array weight<br>";
echo "Perlu sedikit modifikasi, pada foreach, disini saya mengubah variabel dari height menjadi weight, untuk selain itu sama saja.<br>";