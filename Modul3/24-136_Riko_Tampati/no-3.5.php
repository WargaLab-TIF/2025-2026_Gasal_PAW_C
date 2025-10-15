<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

for ($baris = 0; $baris < 3; $baris++) {
    echo "<p><b>baris number $baris</b></p>";
    echo "<ul>";
    for ($colom = 0; $colom < 3; $colom++) {
        echo "<li>" . $students[$baris][$colom] . "</li>";
    }
    echo "</ul>";
}

$students[] = array("Riko", "230705", "0812345678");
$students[] = array("Nasrun", "22890", "0812345610");
$students[] = array("Hakim", "220789", "0812345887");
$students[] = array("Fathan", "220091", "0812345321");
$students[] = array("Adit", "220440", "0812345765");


echo "<h3>Data Mahasiswa (Setelah Penambahan)</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>No. HP</th>
      </tr>";

for ($baris = 0; $baris < count($students); $baris++) {
    echo "<tr>";
    echo "<td>" . ($baris + 1) . "</td>";
    echo "<td>" . $students[$baris][0] . "</td>";
    echo "<td>" . $students[$baris][1] . "</td>";
    echo "<td>" . $students[$baris][2] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
