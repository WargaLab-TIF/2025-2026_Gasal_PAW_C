<?php
require_once "./koneksi.php";

// Filter tanggal (tetap November 2025)
$start = isset($_POST['start']) ? $_POST['start'] : '2025-11-01';
$end = isset($_POST['end']) ? $_POST['end'] : '2025-11-27';

// Ambil data transaksi
$transaksi = array();
$total_pendapatan = 0;
$jumlah_pelanggan = 0;

if ($start && $end) {
    $start = mysqli_real_escape_string(DB, $start);
    $end = mysqli_real_escape_string(DB, $end);

    $sql1 = "SELECT total, waktu_transaksi FROM transaksi 
             WHERE DATE(waktu_transaksi) BETWEEN '$start' AND '$end'
             ORDER BY waktu_transaksi";
    $result1 = mysqli_query(DB, $sql1);
    while ($row = mysqli_fetch_assoc($result1)) {
        $transaksi[] = $row;
        $total_pendapatan += (int)$row['total'];
    }

    $sql2 = "SELECT COUNT(DISTINCT pelanggan_id) as jml FROM transaksi 
             WHERE DATE(waktu_transaksi) BETWEEN '$start' AND '$end'";
    $result2 = mysqli_query(DB, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $jumlah_pelanggan = (int)$row2['jml'];
}

function format_tgl($datetime) {
    $date = date_create($datetime);
    return $date ? date_format($date, 'd M Y') : $datetime;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan - Modul7Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .print-only { display: none; }
        @media print {
            .no-print { display: none; }
            .print-only { display: block; text-align: center; margin-bottom: 20px; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <span class="navbar-brand">Modul7Report</span>
    </div>
</nav>

<div class="container">
    <!-- Filter -->
    <form method="POST" class="no-print mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="date" name="start" class="form-control" value="<?php echo htmlspecialchars($start); ?>" required>
            </div>
            <div class="col-md-4">
                <input type="date" name="end" class="form-control" value="<?php echo htmlspecialchars($end); ?>" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Tampilkan</button>
            </div>
        </div>
    </form>

    <?php if (count($transaksi) > 0): ?>
        <!-- Judul saat print -->
        <div class="print-only">
            <h5>Rekap Laporan Penjualan <?php echo $start; ?> sampai <?php echo $end; ?></h5>
        </div>

        <!-- Grafik -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Grafik</h5>
            </div>
            <div class="card-body">
                <canvas id="chart" height="100"></canvas>
            </div>
        </div>

        <!-- Rekap -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Rekap</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Total</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($transaksi as $t): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>Rp <?php echo number_format((int)$t['total'], 0, ',', '.'); ?></td>
                                <td><?php echo format_tgl($t['waktu_transaksi']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Total -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col">
                        <h6>Jumlah Pelanggan</h6>
                        <p class="h5"><?php echo $jumlah_pelanggan; ?> orang</p>
                    </div>
                    <div class="col">
                        <h6>Jumlah Pendapatan</h6>
                        <p class="h5">Rp <?php echo number_format($total_pendapatan, 0, ',', '.'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Print & Excel -->
        <div class="no-print mb-5">
            <button onclick="window.print()" class="btn btn-outline-secondary me-2">
                Print
            </button>
            <a href="#" id="btn-excel" class="btn btn-success">Excel</a>
        </div>

    <?php else: ?>
        <div class="alert alert-warning text-center">Tidak ada data.</div>
    <?php endif; ?>
</div>

<!-- Grafik -->
<?php if (count($transaksi) > 0): ?>
<script>
    var labels = [];
    var data = [];
    <?php foreach ($transaksi as $t): ?>
        labels.push("<?php echo date('d M', strtotime($t['waktu_transaksi'])); ?>");
        data.push(<?php echo (int)$t['total']; ?>);
    <?php endforeach; ?>

    new Chart(document.getElementById('chart').getContext('2d'), {
        type: 'bar',
        data: { 
            labels: labels,
            datasets: [{
                label: 'Pendapatan',
                data: data, 
                backgroundColor: '#4e73df'
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
<?php endif; ?>

<!-- Excel Export Sederhana & Rapi -->
<script>
document.getElementById('btn-excel').addEventListener('click', function() {
    // Judul laporan
    var judul = "Rekap Laporan Penjualan " + "<?php echo $start; ?>" + " sampai " + "<?php echo $end; ?>";

    // Header tabel
    var content = judul + "\n\n";  // Baris kosong
    content += "No\tTotal\tTanggal\n";  // Header kolom

    // Isi data
    <?php $no = 1; ?>
    <?php foreach ($transaksi as $t): ?>
        content += "<?php echo $no++; ?>\tRp <?php echo number_format((int)$t['total'], 0, ',', '.'); ?>\t<?php echo format_tgl($t['waktu_transaksi']); ?>\n";
    <?php endforeach; ?>

    // Total
    content += "\n";  // Baris kosong
    content += "Jumlah Pelanggan\tJumlah Pendapatan\n";
    content += "<?php echo $jumlah_pelanggan; ?> Orang\tRp <?php echo number_format($total_pendapatan, 0, ',', '.'); ?>\n";

    // Download sebagai .xls
    var blob = new Blob([content], { type: "text/csv;charset=utf-8;" });
    var url = URL.createObjectURL(blob);
    var a = document.createElement("a");
    a.href = url;
    a.download = "laporan_modul7.xls";
    a.click();
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>