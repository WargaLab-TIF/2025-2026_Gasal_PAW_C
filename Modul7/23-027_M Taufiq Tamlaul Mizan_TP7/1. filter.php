<?php
// data
$data_penjualan = [
    ['tanggal' => '2023-09-01', 'total' => 39000],
    ['tanggal' => '2023-09-02', 'total' => 52000],
    ['tanggal' => '2023-09-03', 'total' => 13000],
    ['tanggal' => '2023-09-04', 'total' => 13000],
    ['tanggal' => '2023-09-05', 'total' => 26000],
    ['tanggal' => '2023-09-06', 'total' => 13000],
    ['tanggal' => '2023-09-09', 'total' => 13000],
];

// default filter
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '2023-09-01';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '2023-09-30';

// Filter tanggal
$filtered_data = [];
foreach ($data_penjualan as $row) {
    if ($row['tanggal'] >= $start_date && $row['tanggal'] <= $end_date) {
        $filtered_data[] = $row;
    }
}

$chart_labels = [];
$chart_values = [];
foreach ($filtered_data as $d) {
    $chart_labels[] = $d['tanggal'];
    $chart_values[] = $d['total'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">

<!-- filter -->
<div class="container mt-5">
    <h2 class="mb-4 text-center">Laporan Penjualan</h2>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Filter Laporan</h5>
            <form method="GET" action="" class="row g-3">
                <div class="col-md-4">
                    <label for="start_date" class="form-label">Tanggal Awal</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $start_date; ?>">
                </div>
                <div class="col-md-4">
                    <label for="end_date" class="form-label">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $end_date; ?>">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Grafik Pendapatan</h5>
            <canvas id="salesChart" style="max-height: 400px;"></canvas>
        </div>
    </div>

<!-- rekap detail table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Rekap Detail</h5>
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($filtered_data) > 0): ?>
                        <?php $no = 1; $grand_total = 0; ?>
                        <?php foreach ($filtered_data as $row): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>RP. <?php echo number_format($row['total'], 0, ',', '.'); ?></td>
                                <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                            </tr>
                            <?php $grand_total += $row['total']; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data pada rentang tanggal ini.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot class="table-light fw-bold">
                    <tr>
                        <td colspan="2">Jumlah Pelanggan: <?php echo count($filtered_data); ?> Orang</td>
                        <td>Jumlah Pendapatan: RP. <?php echo number_format($grand_total ?? 0, 0, ',', '.'); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>

<!-- charts.js -->
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: <?php echo json_encode($chart_labels); ?>,
            datasets: [{
                label: 'Total Pendapatan',
                data: <?php echo json_encode($chart_values); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
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