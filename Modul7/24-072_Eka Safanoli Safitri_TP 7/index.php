<?php include "data.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <style>
    .btn {
        background-color: #2ecc71;
        color: white;
        padding: 8px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        margin-right: 5px;
    }

    .btn:hover {
        background-color: #27ae60;
    }

    .filter-box {
        padding: 10px;
        background: #ecf9f1;
        border-radius: 6px;
        width: 350px;
        margin-bottom: 10px;
    }
</style>
    <title>Laporan Modul 7</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h2>Laporan Penerimaan</h2>
<form method="GET">
    Dari: <input type="date" name="dari">
    Sampai: <input type="date" name="sampai">
    <button type="submit" class="btn">Cari</button>
</form>
<hr>

<?php
$dari = $_GET['dari'] ?? "";
$sampai = $_GET['sampai'] ?? "";

$filter = [];
foreach ($data as $row) {
    if (($dari == "" || $row["tanggal"] >= $dari) &&
        ($sampai == "" || $row["tanggal"] <= $sampai)) {
        $filter[] = $row;
    }
}

$labels = [];
$pendapatan = [];

$total_pelanggan = 0;
$total_pendapatan = 0;

foreach ($filter as $row) {
    $labels[] = $row["tanggal"];
    $pendapatan[] = $row["pendapatan"];

    $total_pelanggan += $row["pelanggan"];
    $total_pendapatan += $row["pendapatan"];
}
?>

<canvas id="myChart" width="400" height="150"></canvas>

<script>
const labels = <?php echo json_encode($labels); ?>;
const data = <?php echo json_encode($pendapatan); ?>;

new Chart(document.getElementById("myChart"), {
    type: "bar",
    data: {
        labels: labels,
        datasets: [{
            label: "Pendapatan",
            data: data
        }]
    }
});
</script>

<hr>

<h3>Rekap Data</h3>
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

<hr>

<h3>Total</h3>
<p>Total Pelanggan: <b><?= $total_pelanggan ?></b></p>
<p>Total Pendapatan: <b>Rp <?= number_format($total_pendapatan) ?></b></p>

<hr>

<a href="print_report.php?dari=<?= $dari ?>&sampai=<?= $sampai ?>" target="_blank">
    <button class="btn">Print</button>
</a>

<a href="export_excel.php?dari=<?= $dari ?>&sampai=<?= $sampai ?>">
    <button class="btn">Export Excel</button>
</a>
</body>
</html>