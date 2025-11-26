<?php
require_once "./koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$start = $_GET['start_date'];
$end = $_GET['end_date'];
$result = getDataTransaksiByDate($start, $end);

function formatDate($data) {
    $date = explode("-", $data);
    return $date[2] . " " . date("F", mktime(0, 0, 0, $date[1], 10)) . " " . $date[0];
}

// Set header untuk download Excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan_" . $start . "_" . $end . ".xls");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Rekap Laporan Penjualan</h2>
    <p>Periode: <?= formatDate($start) ?> sampai <?= formatDate($end) ?></p>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Keterangan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            foreach ($result as $nomor => $data) :
            $total += $data['total'];
            ?>
                    <tr>
                    <td><?= $nomor + 1 ?></td>
                    <td><?= htmlspecialchars($data['id']) ?></td>
                    <td><?= formatDate($data['waktu_transaksi']) ?></td>
                    <td><?= htmlspecialchars($data['nama_pelanggan']) ?></td>
                    <td><?= htmlspecialchars($data['keterangan']) ?></td>
                    <td>Rp<?= number_format($data['total'], 0, ",", ".") ?></td>
                    </tr>
            <?php endforeach; 
            ?>
        </tbody>
        <tfoot>
            <tr>
            <th colspan="5">TOTAL PENDAPATAN</th>
            <th>Rp<?= number_format($total, 0, ",", ".") ?></th>
            </tr>
            <tr>
            <th colspan="5">JUMLAH TRANSAKSI</th>
            <th><?= count($result) ?> Transaksi</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>