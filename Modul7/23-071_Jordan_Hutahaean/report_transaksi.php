<?php
include "koneksi.php";

$from_date = $_GET['from_date'] ?? '';
$to_date   = $_GET['to_date'] ?? '';

// Query utama
$filter_query = "SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total
                 FROM transaksi
                 WHERE waktu_transaksi BETWEEN '$from_date' AND '$to_date'
                 GROUP BY DATE(waktu_transaksi)";

$transaksi = mysqli_query($koneksi, $filter_query);

// Query total keseluruhan
$total_query = "SELECT SUM(total) AS total_pendapatan,
                       COUNT(DISTINCT pelanggan_id) AS total_pelanggan
                FROM transaksi
                WHERE waktu_transaksi BETWEEN '$from_date' AND '$to_date'";

$total = mysqli_fetch_assoc(mysqli_query($koneksi, $total_query));

// Download Excel
if (isset($_POST['download'])) {

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=laporan_penjualan.xls");

    echo "<table border='1'>";
    echo "<tr><th>No</th><th>Total (Rp)</th><th>Tanggal</th></tr>";

    $no = 1;
    mysqli_data_seek($transaksi, 0);

    while ($row = mysqli_fetch_assoc($transaksi)) {
        echo "<tr>
                <td>$no</td>
                <td>Rp ".number_format($row['total'], 0, ',', '.')."</td>
                <td>".$row['tanggal']."</td>
              </tr>";
        $no++;
    }

    echo "</table>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="container">
    <h1>Laporan Penjualan</h1>

    <?php if (!$from_date || !$to_date): ?>

    <!-- FORM FILTER -->
    <form method="GET">
        <a href="view.php" class="btn-secondary">Kembali</a><br><br>

        <label>Dari Tanggal :</label>
        <input type="date" name="from_date" required>

        <label>Sampai Tanggal :</label>
        <input type="date" name="to_date" required>

        <button class="btn-primary">Tampilkan</button>
    </form>

    <?php else: ?>

    <h2>Rekap dari <?= $from_date ?> sampai <?= $to_date ?></h2>

    <div style="margin-bottom:10px;">
        <button onclick="window.print()" class="btn-primary">Print</button>

        <form method="POST" style="display:inline;">
            <button name="download" class="btn-success">Excel</button>
        </form>

        <a href="report_transaksi.php" class="btn-secondary">Reset</a>
    </div>

    <!-- GRAFIK -->
    <h3>Grafik Penjualan</h3>
    <canvas id="chart"></canvas>

    <script>
    var ctx = document.getElementById("chart");
    var chart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [
                <?php 
                mysqli_data_seek($transaksi, 0);
                $lbl = [];
                while ($r = mysqli_fetch_assoc($transaksi)) {
                    $lbl[] = "'".$r['tanggal']."'";
                }
                echo implode(",", $lbl);
                ?>
            ],
            datasets: [{
                label: "Total Penjualan (Rp)",
                data: [
                    <?php 
                    mysqli_data_seek($transaksi, 0);
                    $tot = [];
                    while ($r = mysqli_fetch_assoc($transaksi)) {
                        $tot[] = $r['total'];
                    }
                    echo implode(",", $tot);
                    ?>
                ],
                backgroundColor: "rgba(75, 141, 241, 0.4)",
                borderColor: "#4a7bd4",
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    ticks: {
                        callback: function(value) {
                            return "Rp " + value.toLocaleString("id-ID");
                        }
                    }
                }
            }
        }
    });
    </script>

    <!-- TABEL REKAP -->
    <h3>Rekap Penjualan</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>

        <?php 
        mysqli_data_seek($transaksi, 0);
        $no = 1;

        while ($row = mysqli_fetch_assoc($transaksi)) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                <td><?= $row['tanggal'] ?></td>
            </tr>
        <?php } ?>
    </table>

    <!-- TABEL TOTAL -->
    <h3>Total Keseluruhan</h3>
    <table>
        <tr>
            <th>Jumlah Pelanggan</th>
            <th>Total Pendapatan</th>
        </tr>
        <tr>
            <td><?= $total['total_pelanggan'] ?></td>
            <td>Rp <?= number_format($total['total_pendapatan'], 0, ',', '.') ?></td>
        </tr>
    </table>

    <?php endif; ?>
</div>

</body>
</html>
