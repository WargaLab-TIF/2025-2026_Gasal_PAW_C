<?php 
require "koneksi.php";

$query = "SELECT t.waktu_transaksi, SUM(td.harga) as total_harga 
FROM transaksi as t JOIN transaksi_detail as td 
ON t.id = td.transaksi_id GROUP BY td.transaksi_id";
$execute = mysqli_query($conn, $query);
$result = mysqli_fetch_all($execute, MYSQLI_ASSOC);

$tanggal = [];
$total_harga = [];
$data = [];
foreach($result as $value){
    $tanggal[] = $value['waktu_transaksi'];
    $total_harga[] = $value['total_harga'];
    $data[] = $value;
}

// var_dump($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @media print{
            .no-print{
                display: none;
            }
        }
    </style>
</head>
<body>
    <button onclick="window.location='export_excel.php'">export excel</button>
    <button onclick="window.print()" class="no-print">Cetak</button>
    <canvas id="my_canvas"></canvas>
    <script>
        const ctx = document.getElementById('my_canvas');
        const my_Canvas = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($tanggal) ?>,
                datasets: [{
                label: 'Laporan Penjualan',
                data: <?= json_encode($total_harga) ?>,
                backgroundColor: 'yellow',
                }]
            },
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            }
            });
    </script>
</body>
</html>