<?php
include "data.php";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan.xls");

$dari = $_GET['dari'] ?? "";
$sampai = $_GET['sampai'] ?? "";

$filter = [];

foreach ($data as $row) {
    if (($dari == "" || $row["tanggal"] >= $dari) &&
        ($sampai == "" || $row["tanggal"] <= $sampai)) {
        $filter[] = $row;
    }
}

echo "<table border='1'>
<tr>
<th>Tanggal</th>
<th>Pelanggan</th>
<th>Pendapatan</th>
</tr>";

foreach ($filter as $r) {
    echo "<tr>
    <td>{$r['tanggal']}</td>
    <td>{$r['pelanggan']}</td>
    <td>{$r['pendapatan']}</td>
    </tr>";
}

echo "</table>";
?>