<?php
// script awal
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";

    for ($col = 0; $col < 3; $col++) {
        echo "<li>" . $students[$row][$col] . "</li>";
    }

    echo "</ul>";
}

// 3. 5. 1. Tambahkan 5 data baru dalam array $students!

$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
    // 5 data tambahan 
    array("grace", "230502", "0812345678"),
    array("caca", "230503", "08153907216"),
    array("juan", "230504", "081265439"),
    array("alice", "230502", "08125432181"),
    array("george", "230607", "081565213")
);

// 3. 5. 2. Tampilkan data dalam array $students dalam bentuk tabel!

echo "<h1>Data Mahasiswa</h1>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";

// header 
echo "<thead><tr><th>Name</th><th>NIM</th><th>Mobile</th></tr></thead>";

echo "<tbody>";
foreach($students as $row) {
    echo "<tr><td>" . implode("</td><td>", $row) . "</td></tr>";
}

echo "</tbody>";
echo "</table>";
?>
