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

// filter
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '2023-09-01';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '2023-09-30';

$filtered_data = [];
foreach ($data_penjualan as $row) {
    if ($row['tanggal'] >= $start_date && $row['tanggal'] <= $end_date) {
        $filtered_data[] = $row;
    }
}

// Siapkan data Chart
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

    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            .card {
                border: none !important; 
                box-shadow: none !important;
            }
        }
    </style>
</head>
<body class="bg-light">

<!-- filter -->
<div class="container mt-5">
    
    <div class="text-center mb-4">
        <h3>Rekap Laporan Penjualan</h3>
        <p>Periode: <?php echo $start_date; ?> sampai <?php echo $end_date; ?></p>
    </div>

    <div class="card mb-4 shadow-sm no-print">
        <div class="card-body">
            <form method="GET" action="" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">Mulai Tanggal</label>
                    <input type="date" class="form-control" name="start_date" value="<?php echo $start_date; ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Sampai Tanggal</label>
                    <input type="date" class="form-control" name="end_date" value="<?php echo $end_date; ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
                
                <div class="col-md-4 text-end">
                    <button onclick="window.print()" class="btn btn-warning text-white me-2">
                         Cetak (Print)
                    </button>
                    
                    <a href="4. export_excel.php?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" target="_blank" class="btn btn-success">
                         Excel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <canvas id="salesChart" style="max-height: 300px;"></canvas>
        </div>
    </div>

    <!-- table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1; 
                    $grand_total = 0;
                    if (count($filtered_data) > 0):
                        foreach ($filtered_data as $row): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>RP. <?php echo number_format($row['total'], 0, ',', '.'); ?></td>
                                <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                            </tr>
                            <?php $grand_total += $row['total']; ?>
                        <?php endforeach; 
                    else: ?>
                        <tr><td colspan="3" class="text-center">Data Kosong</td></tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr class="fw-bold">
                        <td colspan="2">Jumlah Pelanggan: <?php echo count($filtered_data); ?> Orang</td>
                        <td>Jumlah Pendapatan: RP. <?php echo number_format($grand_total, 0, ',', '.'); ?></td>
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
                label: 'Total',
                data: <?php echo json_encode($chart_values); ?>,
                backgroundColor: 'rgba(200, 200, 200, 0.5)',
                borderColor: 'rgba(200, 200, 200, 1)',
                borderWidth: 1
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });
</script>


</body>
</html>