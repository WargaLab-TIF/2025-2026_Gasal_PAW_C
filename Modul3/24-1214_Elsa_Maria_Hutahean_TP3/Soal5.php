<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
    array("Daniel", "220404", "0812345699"),
    array("Ella", "220405", "0812345601"),
    array("Felix", "220406", "0812345612"),
    array("Grace", "220407", "0812345623"),
    array("Henry", "220408", "0812345634")
);

for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>"; 
    for ($col = 0; $col < 3; $col++) { 
        echo "<li>" . $students[$row][$col] . "</li>"; 
    } 
    echo "</ul>"; 
}

echo "<table border='1' cellpadding='8' cellspacing='0' >";
    "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Nomor HP</th>
    </tr>";

for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    echo "<td>" . ($row + 1) . "</td>";
    echo "<td>" . $students[$row][0] . "</td>";
    echo "<td>" . $students[$row][1] . "</td>";
    echo "<td>" . $students[$row][2] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
