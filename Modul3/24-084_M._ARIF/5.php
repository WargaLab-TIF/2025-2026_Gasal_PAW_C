<?php
// 3.5 Deklarasi dan Akses Array Multidimensi

// Deklarasi array multidimensi awal
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

// Menampilkan data awal
echo "<h3>Data Awal Array \$students:</h3>";
for ($row = 0; $row < count($students); $row++) {
    echo "<b>Row number $row</b><br>";
    echo "<ul>";
    for ($col = 0; $col < count($students[$row]); $col++) {
        echo "<li>" . $students[$row][$col] . "</li>";
    }
    echo "</ul>";
}

// 3.5.1 Tambahkan 5 data baru dalam array $students
array_push($students,
    array("Daniel", "220404", "0811111111"),
    array("Evelyn", "220405", "0812222222"),
    array("Frank", "220406", "0813333333"),
    array("Grace", "220407", "0814444444"),
    array("Henry", "220408", "0815555555")
);

// Menampilkan data setelah ditambahkan
echo "<hr><h3>Data Setelah Menambahkan 5 Data Baru:</h3>";
for ($row = 0; $row < count($students); $row++) {
    echo "<b>Row number $row</b><br>";
    echo "<ul>";
    for ($col = 0; $col < count($students[$row]); $col++) {
        echo "<li>" . $students[$row][$col] . "</li>";
    }
    echo "</ul>";
}

// 3.5.2 Tampilkan data dalam bentuk tabel HTML
echo "<hr><h3>Data \$students dalam Bentuk Tabel:</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>No</th><th>Nama</th><th>NIM</th><th>Mobile</th></tr>";

for ($i = 0; $i < count($students); $i++) {
    echo "<tr>";
    echo "<td>" . ($i + 1) . "</td>";
    echo "<td>" . $students[$i][0] . "</td>";
    echo "<td>" . $students[$i][1] . "</td>";
    echo "<td>" . $students[$i][2] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>