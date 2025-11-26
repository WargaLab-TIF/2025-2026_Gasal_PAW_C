<?php
include('../koneksi.php'); 
if (!isset($_SESSION['logged_in'])) {
    header('Location: ../login.php');
    exit;
}

// Filter tanggal 
$from_date = $_GET['from_date'] ?? '';
$to_date = $_GET['to_date'] ?? '';

// Query untuk menggabungkan data berdasarkan tanggal
$filter_query = "SELECT DATE(transaksi.waktu_transaksi) AS tanggal, SUM(transaksi.total) AS total
                 FROM transaksi
                 WHERE transaksi.waktu_transaksi BETWEEN '$from_date' AND '$to_date'
                 GROUP BY DATE(transaksi.waktu_transaksi)";

$transaksi_result = mysqli_query($koneksi, $filter_query);

// Total Penerimaan
$total_penerimaan_query = "SELECT SUM(total) AS total_pendapatan, COUNT(DISTINCT pelanggan_id) AS total_pelanggan
                           FROM transaksi
                           WHERE waktu_transaksi BETWEEN '$from_date' AND '$to_date'";
$total_result = mysqli_fetch_assoc(mysqli_query($koneksi, $total_penerimaan_query));

// Proses download Excel
if (isset($_POST['submit'])) {
    header("Content-Type: application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=laporan_penjualan.xls");

    echo "<tr><th colspan='3'>Rekap Penjualan dari Tanggal $from_date sampai $to_date</th></tr>";
    echo "<br>";
    echo "<table border='1'>";
    echo "<tr><th>No</th><th>Total</th><th>Tanggal</th></tr>";

    $no = 1;
    mysqli_data_seek($transaksi_result, 0); 
    while ($row = mysqli_fetch_assoc($transaksi_result)) {
        $tanggal = date("d M Y", strtotime($row['tanggal'])); 
        echo "<tr>";
        echo "<td>" . $no++ . "</td>"; //
        echo "<td>Rp " . number_format($row['total'], 0, ',', '.') . "</td>";
        echo "<td>" . $tanggal . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "<table border='1'>";
    echo "<tr><th colspan='2'>Jumlah Pelanggan</th> <th>Jumlah Pendapatan</th></tr>";
    echo "<tr><td colspan='2'>" . $total_result['total_pelanggan'] . "</td><td>" . number_format($total_result['total_pendapatan'], 0, ',', '.') . "</td></tr>";
    echo "</table>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

<div class="container">
    <h1 class="my-4">Laporan Penjualan</h1>
    
    <?php if (!$from_date || !$to_date): ?>
    <form method="GET" action="report_transaksi.php" class="mb-4">
        <a href="view.php" class="btn btn-secondary">Kembali</a><br>
        <input type="date" name="from_date" value="<?= $from_date ?>" required>
        <input type="date" name="to_date" value="<?= $to_date ?>" required>

        <button type="submit" class="btn btn-primary">Tampilkan</button>
    </form>
    <?php else: ?>
        <h2>Rekap Penjualan dari Tanggal <?= $from_date ?> sampai <?= $to_date ?></h2>
        
        <div class="mb-3 no-print">
            <button onclick="window.print()" class="btn btn-primary">
                <i class="fa fa-print"></i> Cetak PDF
            </button>
            <form method="POST" class="d-inline">
                <button name="submit" type="submit" class="btn btn-success">
                    <i class="fa fa-file-excel"></i> Download Excel
                </button>
            </form>
            <a href="../home.php" class="btn btn-secondary">Kembali</a>
        </div>

        <h3>Grafik Penjualan</h3>
        <canvas id="salesChart" width="400" height="200"></canvas>

        <script>
            var ctx = document.getElementById('salesChart').getContext('2d');
            var salesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php 
                        $dates = [];
                        mysqli_data_seek($transaksi_result, 0);
                        while ($row = mysqli_fetch_assoc($transaksi_result)) { 
                            $dates[] = "'" . $row['tanggal'] . "'"; 
                        } 
                        echo implode(',', $dates);
                    ?>],
                    datasets: [{
                        label: 'Total Penjualan',
                        data: [<?php 
                            mysqli_data_seek($transaksi_result, 0);
                            $totals = [];
                            while ($row = mysqli_fetch_assoc($transaksi_result)) { 
                                $totals[] = $row['total']; 
                            } 
                            echo implode(',', $totals);
                        ?>],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        </script>

        <h3>Rekap Penjualan</h3>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
            <?php 
            mysqli_data_seek($transaksi_result, 0);
            $no = 1;
            while ($row = mysqli_fetch_assoc($transaksi_result)) { 
                $tanggal = date("d M Y", strtotime($row['tanggal']));
            ?>
                <tr>
                    <td><?= $no++ ?></td> 
                    <td><?= number_format($row['total'], 0, ',', '.') ?></td>
                    <td><?= $tanggal ?></td>
                </tr>
            <?php } ?>
        </table>

        <h3>Total Pendapatan dan Pelanggan</h3>
        <table class="table table-bordered">
            <tr>
                <th>Jumlah Pelanggan</th>
                <th>Jumlah Pendapatan</th>
            </tr>
            <tr>
                <td><?= $total_result['total_pelanggan'] ?></td>
                <td><?= number_format($total_result['total_pendapatan'], 0, ',', '.') ?></td>
            </tr>
        </table>
    <?php endif; ?>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
