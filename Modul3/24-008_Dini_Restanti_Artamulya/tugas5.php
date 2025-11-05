<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"));

$students[] = array("Mingyu", "220404", "0812345611");
$students[] = array("Nana", "220405", "0812345622");
$students[] = array("Felix", "220406", "0812345633");
$students[] = array("Lisa", "220407", "0812345644");
$students[] = array("Henry", "220408", "0812345655");

echo "<h3>Data Mahasiswa</h3>";
echo "<table border='1' cellpadding='3'>
<tr>
<th>Nama</th>
<th>NIM</th>
<th>HP</th>
</tr>";

for ($baris = 0; $baris < count($students); $baris++) {
    echo "<tr>";
    for ($kolom = 0; $kolom < count($students[$baris]); $kolom++) {
        echo "<td>" . $students[$baris][$kolom] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
