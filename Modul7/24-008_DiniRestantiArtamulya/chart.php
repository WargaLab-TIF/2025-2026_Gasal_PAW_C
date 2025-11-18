<?php
require "koneksi.php";

$dari   = $_GET['dari'];
$sampai = $_GET['sampai'];

$query = " SELECT t.waktu_transaksi, SUM(td.harga) AS total_harga 
    FROM transaksi t 
    JOIN transaksi_detail td ON t.id = td.transaksi_id
    WHERE t.waktu_transaksi BETWEEN '$dari' AND '$sampai'
    GROUP BY td.transaksi_id
";
$execute = mysqli_query($conn, $query);
$result  = mysqli_fetch_all($execute, MYSQLI_ASSOC);

$tanggal = [];
$total_harga = [];

foreach($result as $value){
    $tanggal[]     = $value['waktu_transaksi'];
    $total_harga[] = $value['total_harga'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Grafik</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @media print { .no-print { display: none; } }
    </style>
</head>
<body>

<button onclick="window.location='export_excel.php?dari=<?= $dari ?>
&sampai=<?= $sampai ?>'">Export Excel</button>
<button onclick="window.print()" class="no-print">Cetak</button>

<h3>Grafik Pendapatan</h3>
<canvas id="grafik"></canvas>

<script>
    const ctx = document.getElementById('grafik');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($tanggal) ?>,
            datasets: [{
                label: 'Total Harga',
                data: <?= json_encode($total_harga) ?>,
                backgroundColor: 'orange'
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
<h3>Total</h3>
<?php include "total.php"; ?>

<h3>Rekap Tabel</h3>
<?php include "rekap.php"; ?>

</body>
</html>
