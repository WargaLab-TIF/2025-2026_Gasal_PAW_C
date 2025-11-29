<?php
require "koneksi.php";

$start = $_GET['start_date'] ?? '2025-11-01';
$end   = $_GET['end_date'] ?? '2025-11-05';

$query = "
    SELECT DATE(t.waktu_transaksi) AS tanggal,
            SUM(td.harga * td.qty) AS total_harga,
            COUNT(DISTINCT t.id) AS jumlah_transaksi
    FROM transaksi t
    JOIN transaksi_detail td ON t.id = td.transaksi_id
    WHERE t.waktu_transaksi BETWEEN '$start' AND '$end'
    GROUP BY DATE(t.waktu_transaksi)
    ORDER BY tanggal ASC
";

$execute = mysqli_query($conn, $query);
$result  = mysqli_fetch_all($execute, MYSQLI_ASSOC);

$tanggal         = [];
$total_harga     = [];
$grandTotal      = 0;
$jumlahPelanggan = 0;

foreach ($result as $value) {
    $tanggal[]     = $value['tanggal'];
    $total_harga[] = $value['total_harga'];
    $grandTotal   += $value['total_harga'];
    $jumlahPelanggan += $value['jumlah_transaksi'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @media print {
            .no-print { display: none; }
        }
        table { border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #999; padding: 6px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Laporan Penjualan</h2>
    <form method="GET" class="no-print">
        Dari: <input type="date" name="start_date" value="<?= $start ?>">
        Sampai: <input type="date" name="end_date" value="<?= $end ?>">
        <button type="submit">Tampilkan</button>
    </form>

    <button onclick="window.location='ekspor_excel.php?start=<?= $start ?>&end=<?= $end ?>'" class="no-print">Export Excel</button>
    <button onclick="window.print()" class="no-print">Cetak</button>

    <!-- Grafik -->
    <canvas id="my_canvas"></canvas>
    <script>
        const ctx = document.getElementById('my_canvas');
        new Chart(ctx, {
            type: 'bar', // bisa diganti 'line'
            data: {
                labels: <?= json_encode($tanggal) ?>,
                datasets: [{
                    label: 'Total Penjualan',
                    data: <?= json_encode($total_harga) ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)'
                }]
            },
            options: {
                scales: { y: { beginAtZero: true } }
            }
        });
    </script>

    <!-- Rekap Tabel -->
    <h3>Rekap Penjualan</h3>
    <table>
        <tr><th>No</th><th>Tanggal</th><th>Total</th></tr>
        <?php $no=1; foreach ($result as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
            <td>Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Total -->
    <p><b>Jumlah Transaksi :</b> <?= $jumlahPelanggan ?></p>
    <p><b>Total Pendapatan :</b> Rp <?= number_format($grandTotal, 0, ',', '.') ?></p>
</body>
</html>