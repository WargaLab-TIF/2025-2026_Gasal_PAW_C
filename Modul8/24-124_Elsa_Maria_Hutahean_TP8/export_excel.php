<?php
include "koneksi.php";

$dari   = isset($_GET['dari']) ? $_GET['dari'] : date("Y-m-01");
$sampai = isset($_GET['sampai']) ? $_GET['sampai'] : date("Y-m-d");

// Nama file download
$filename = "laporan_penjualan_{$dari}_sd_{$sampai}.csv";

// Header supaya browser auto-download
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=\"$filename\"");

$output = fopen("php://output", "w");

// Header kolom
fputcsv($output, ["ID Transaksi", "Tanggal", "Keterangan", "Total Harga"]);

// Query data
$q = mysqli_query($conn,
    "SELECT t.id, t.waktu_transaksi, t.keterangan,
            SUM(td.harga) AS total
     FROM transaksi t
     JOIN transaksi_detail td ON t.id = td.transaksi_id
     WHERE DATE(t.waktu_transaksi) BETWEEN '$dari' AND '$sampai'
     GROUP BY t.id
     ORDER BY t.id DESC"
);

// Isi data
while($r = mysqli_fetch_assoc($q)){
    fputcsv($output, [
        $r['id'],
        $r['waktu_transaksi'],
        $r['keterangan'],
        $r['total']
    ]);
}

fclose($output);
exit();
?>
