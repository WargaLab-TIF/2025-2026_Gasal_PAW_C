<?php
require_once "./koneksi.php";

$sql = "SELECT 
            barang.id,
            barang.kode_barang,
            barang.nama_barang,
            barang.harga,
            barang.stok,
            supplier.nama as nama_supplier
        FROM barang
        JOIN supplier ON barang.supplier_id = supplier.id
        ORDER BY barang.id";
$result = mysqli_query(DB, $sql);
$barang = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Barang - Modul 7 Report</title>
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
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Data Master Barang</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Supplier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang as $i => $b): ?>
                        <tr>
                            <td class="text-center"><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($b['kode_barang']) ?></td>
                            <td><?= htmlspecialchars($b['nama_barang']) ?></td>
                            <td>Rp <?= number_format($b['harga'], 0, ',', '.') ?></td>
                            <td><?= $b['stok'] ?></td>
                            <td><?= htmlspecialchars($b['nama_supplier']) ?></td>
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