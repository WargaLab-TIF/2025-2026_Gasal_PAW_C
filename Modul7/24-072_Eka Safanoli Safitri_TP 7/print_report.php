<?php
include "data.php";
$dari = $_GET['dari'];
$sampai = $_GET['sampai'];

$filter = [];

foreach ($data as $row) {
    if (($dari == "" || $row["tanggal"] >= $dari) &&
        ($sampai == "" || $row["tanggal"] <= $sampai)) {
        $filter[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<body onload="window.print()">

<h2>Print Laporan</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Tanggal</th>
        <th>Pelanggan</th>
        <th>Pendapatan</th>
    </tr>

    <?php foreach ($filter as $r) { ?>
        <tr>
            <td><?= $r["tanggal"] ?></td>
            <td><?= $r["pelanggan"] ?></td>
            <td><?= number_format($r["pendapatan"]) ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>