<?php
require_once "./koneksi.php";

$sql = "SELECT 
            t.id,
            t.waktu_transaksi,
            p.nama as nama_pelanggan,
            t.keterangan,
            t.total
        FROM transaksi t
        JOIN pelanggan p ON t.pelanggan_id = p.id
        ORDER BY t.waktu_transaksi ASC";
$result = mysqli_query(DB, $sql);
$transaksi = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Transaksi - Modul 7 Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Modul 7 Report</a>
    </div>
</nav>

<div class="container">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Data Transaksi</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">No</th>
                        <th>ID</th>
                        <th>Pelanggan</th>
                        <th>Keterangan</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaksi as $i => $t): ?>
                        <tr>
                            <td class="text-center"><?= $i + 1 ?></td>
                            <td><?= $t['id'] ?></td>
                            <td><?= htmlspecialchars($t['nama_pelanggan']) ?></td>
                            <td><?= htmlspecialchars($t['keterangan']) ?></td>
                            <td>Rp <?= number_format($t['total'], 0, ',', '.') ?></td>
                            <td><?= date('d M Y H:i', strtotime($t['waktu_transaksi'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>