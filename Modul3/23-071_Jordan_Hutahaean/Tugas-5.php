<?php
$students = [
    ["Alex", "220401", "0812345678"],
    ["Bianca", "220402", "0812345687"],
    ["Candice", "220403", "0812345665"]
];

// Tambahkan 5 data baru
$students[] = ["Dion", "220404", "0812345679"];
$students[] = ["Elisa", "220405", "0812345688"];
$students[] = ["Farah", "220406", "0812345690"];
$students[] = ["Gilang", "220407", "0812345691"];
$students[] = ["Hana", "220408", "0812345692"];

// Tampilkan dalam bentuk tabel
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";
foreach ($students as $s) {
    echo "<tr>";
    echo "<td>{$s[0]}</td><td>{$s[1]}</td><td>{$s[2]}</td>";
    echo "</tr>";
}
echo "</table>";
?>
