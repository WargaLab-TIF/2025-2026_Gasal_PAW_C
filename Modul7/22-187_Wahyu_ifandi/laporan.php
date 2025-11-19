<?php
include 'koneksi.php';

$awal = isset($_GET['awal']) ? $_GET['awal'] : date('Y-m-01');
$akhir = isset($_GET['akhir']) ? $_GET['akhir'] : date('Y-m-d');

$sql = mysqli_query($conn, 
    "SELECT * FROM transaksi 
     WHERE tanggal BETWEEN '$awal' AND '$akhir'
     ORDER BY tanggal ASC");

$data = [];
$tanggal = [];
$total = [];

$jumlah_pelanggan = 0;
$jumlah_pendapatan = 0;

while ($row = mysqli_fetch_assoc($sql)) {
    $data[] = $row;
    $tanggal[] = $row['tanggal'];
    $total[] = $row['total'];
    $jumlah_pelanggan++;
    $jumlah_pendapatan += $row['total'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        .box-total {
            width: 300px;
            background: #eaf6ff;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .btn {
            padding: 8px 15px;
            background: orange;
            border: none;
            color: white;
            cursor: pointer;
            margin-right: 5px;
        }
    </style>
</head>

<body>

<h2>Rekap Laporan Penjualan</h2>

<form method="GET">
    <input type="date" name="awal" value="<?= $awal ?>">
    <input type="date" name="akhir" value="<?= $akhir ?>">
    <button class="btn">Tampilkan</button>
</form>

<!-- Tombol Export -->
<br>
<button class="btn" onclick="window.print()">Print</button>
<button class="btn" onclick="exportExcel()">Excel</button>

<!-- Grafik -->
<canvas id="grafik" height="120"></canvas>

<script>
var ctx = document.getElementById('grafik').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($tanggal); ?>,
        datasets: [{
            label: 'Total',
            data: <?= json_encode($total); ?>,
            backgroundColor: 'rgba(100,100,100,0.4)'
        }]
    }
});
</script>

<!-- Rekap Tabel -->
<table>
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>
    <?php 
    $no = 1;
    foreach ($data as $d) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>Rp <?= number_format($d['total']) ?></td>
            <td><?= date('d M Y', strtotime($d['tanggal'])) ?></td>
        </tr>
    <?php } ?>
</table>

<!-- Total Summary -->
<div class="box-total">
    <b>Jumlah Pelanggan:</b> <?= $jumlah_pelanggan ?> Orang <br>
    <b>Jumlah Pendapatan:</b> Rp <?= number_format($jumlah_pendapatan) ?>
</div>

<script>
function exportExcel() {
    var table = document.querySelector("table");
    var wb = XLSX.utils.table_to_book(table, {sheet: "Sheet1"});
    XLSX.writeFile(wb, "Laporan_Penjualan.xlsx");
}
</script>

</body>
</html>
