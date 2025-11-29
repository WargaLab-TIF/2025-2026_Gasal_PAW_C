<?php
require "koneksi.php";

$start = $_GET['start'] ?? '2023-09-01';
$end   = $_GET['end'] ?? '2023-09-27';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_penjualan.xls");

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

echo "No\tTanggal\tTotal\n";
$no=1; $grandTotal=0; $jumlahTransaksi=0;
while ($row = mysqli_fetch_assoc($execute)) {
    echo $no++ . "\t" . $row['tanggal'] . "\t" . $row['total_harga'] . "\n";
    $grandTotal     += $row['total_harga'];
    $jumlahTransaksi += $row['jumlah_transaksi'];
}
echo "\nJumlah Transaksi\t$jumlahTransaksi\n";
echo "Total Pendapatan\tRp $grandTotal\n";
?>