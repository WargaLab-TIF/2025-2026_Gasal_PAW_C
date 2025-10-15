<?php
$students = array(
    array("Alex", "22401", "0812345678"),
    array("Bianca", "22402", "0812345687"),
    array("Candice", "22403", "0812345665"),
);

array_push($students, 
array("RB", "22404", "0812345699"),
        array("Ainul", "22405", "0812345655"),
        array("Yakin", "22406", "0812345644"),
        array("Ahmad", "22407", "0812345633"),
        array("Dhiyauddin", "22408", "0812345622"),
);

echo "<b>3.5.1. </b>";
echo "Tambahkan 5 data baru ke dalam array students! <br>";

for ($row = 0 ; $row < 8; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0 ; $col < 3; $col++) {
        echo "<li>" . $students[$row][$col] . "</li>";
    }
    echo "</ul>";
}

echo "<b>5.5.2.</b> Buat dalam bentuk tabel! <br><br>";

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Nama</th><th>NIM</th><th>No. HP</th></tr>";

foreach ($students as $student) {
    echo "<tr>";
    foreach ($student as $data) {
        echo "<td>" . $data . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>