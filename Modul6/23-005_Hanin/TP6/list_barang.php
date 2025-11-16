<?php
require 'koneksi.php';

$stmt = $pdo->query("SELECT * FROM barang ORDER BY id_barang");
$barangs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Barang</h2>
    <a href="tambah_barang.php">+ Tambah Barang Baru</a>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barangs as $b): ?>
                <tr>
                    <td><?= htmlspecialchars($b['id_barang']) ?></td>
                    <td><?= htmlspecialchars($b['nama_barang']) ?></td>
                    <td>Rp <?= number_format($b['harga'], 0, ',', '.') ?></td>
                    <td><?= htmlspecialchars($b['stok']) ?></td>
                    <td>
                        <a href="hapus_barang.php?id=<?= $b['id_barang'] ?>" onclick="return confirm('Yakin hapus barang ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br><a href="index.php">Kembali ke Dashboard</a>
</body>
</html>