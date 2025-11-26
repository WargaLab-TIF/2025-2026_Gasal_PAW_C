<?php
require_once "./koneksi.php";

$result = mysqli_query(DB, "SELECT * FROM supplier ORDER BY nama");
$suppliers = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Supplier - Modul7Report</title>
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
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Data Master Supplier</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>No. Telpon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suppliers as $i => $s): ?>
                        <tr>
                            <td class="text-center"><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($s['nama']) ?></td>
                            <td><?= htmlspecialchars($s['alamat']) ?></td>
                            <td><?= htmlspecialchars($s['telp']) ?></td>
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