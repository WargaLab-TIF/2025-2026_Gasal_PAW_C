<?php
require 'konek.php';

if(isset($_GET['submit'])) {
    if(isset($_GET['excel'])) {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Report_transaksi.xls");
    }


    $start = $_GET['start_date'];
    $end = $_GET['end_date'];
    $transaksi = $conn->query("SELECT SUM(total) as total, DATE(waktu_transaksi) AS tanggal FROM transaksi WHERE waktu_transaksi BETWEEN '$start' AND '$end' GROUP BY tanggal");
    $pelanggan = $conn->query("SELECT COUNT(DISTINCT pelanggan_id) as pelanggan FROM transaksi WHERE waktu_transaksi BETWEEN '$start' AND '$end'")->fetch_assoc()['pelanggan'];
    $pendapatan = $conn->query("SELECT SUM(total) as total FROM transaksi WHERE waktu_transaksi BETWEEN '$start' AND '$end'")->fetch_assoc()['total'];

    $total = [];
    $tanggal = [];
    foreach($transaksi as $t) {
        $total[] = $t['total'];
        $tanggal[] = $t['tanggal'];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <h2>Rekap Laporan Transaksi</h2>
    <a href="report_transaksi.php" class="no-print">Kembali</a>
    <?php if(!isset($_GET['submit'])) { ?>
    <form action="report_transaksi.php" method="GET">
        <label for="start_date">Mulai Tanggal:</label>
        <input type="date" id="start_date" name="start_date" value="<?= htmlspecialchars($startDate) ?>" required>
        <label for="end_date">Sampai Tanggal:</label>
        <input type="date" id="end_date" name="end_date" value="<?= htmlspecialchars($endDate) ?>" required>
        <button type="submit" name="submit">Tampilkan</button>
    </form>
    <?php } else { ?>
        <div class="row mt-5">
            <canvas id="ipTargetChart" width="300" height="150"></canvas>
        </div> 
        <table border="1">
            <tr>
                <th>No</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
            <?php $i = 1; foreach($transaksi as $res): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $res['total'] ?></td>
                    <td><?= $res['tanggal'] ?></td>
                </tr>
            <?php endforeach;?>
        </table>
        <table border="1">
            <tr>
                <th>Jumlah Pelanggan</th>
                <th>Jumlah Pendapatan</th>
            </tr>
            <tr>
                <td><?= $pelanggan ?></td>
                <td><?= $pendapatan ?></td>
            </tr>
        </table>
        <button onclick="window.print()" class="no-print">Cetak PDF</button>
        <button onclick="window.location.href='report_transaksi.php?start_date=<?= $start; ?>&end_date=<?= $end; ?>&submit=&excel='" class="no-print">Cetak Excel</button>
        <script>
            const labels = <?=json_encode($tanggal)?>;
            const values = <?=json_encode($total)?>;

            const ctx = document.getElementById("ipTargetChart").getContext("2d");

            const myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Laporan Penjualan",
                        data: values,
                        backgroundColor: "blue",
                        borderColor: "red",
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: false, 
                    maintainAspectRatio: false, 
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    <?php } ?>
</body>
</html>
