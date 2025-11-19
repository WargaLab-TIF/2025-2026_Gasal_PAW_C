<?php
// Ambil parameter tanggal dari URL
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-01');
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d');

// Nama File download
$filename = "Laporan_Penjualan_$start_date-$end_date.xls";

//agar dibaca exel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");

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

// Filter Data
$filtered_data = [];
foreach ($data_penjualan as $row) {
    if ($row['tanggal'] >= $start_date && $row['tanggal'] <= $end_date) {
        $filtered_data[] = $row;
    }
}
?>

<!-- tampilan exel dan exel nya ketika sudah di download -->
<h3>Rekap Laporan Penjualan</h3>
<p>Periode: <?php echo $start_date; ?> sampai <?php echo $end_date; ?></p>

<table border="1">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>
    </thead>

    <tbody>
        <?php 
        $no = 1; 
        $grand_total = 0;
        foreach ($filtered_data as $row): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td>RP. <?php echo $row['total']; ?></td>
                <td><?php echo date('d-M-y', strtotime($row['tanggal'])); ?></td>
            </tr>
            <?php $grand_total += $row['total']; ?>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2"><strong>Jumlah Pelanggan: <?php echo count($filtered_data); ?> Orang</strong></td>
            <td><strong>Jumlah Pendapatan: RP. <?php echo $grand_total; ?></strong></td>
        </tr>
    </tfoot>
</table>