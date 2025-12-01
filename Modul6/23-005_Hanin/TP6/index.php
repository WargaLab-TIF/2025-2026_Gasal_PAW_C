<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Transaksi</h2>
    <a href="tambah_transaksi.php">+ Tambah Transaksi Baru</a> | 
    <a href="list_barang.php">Lihat Barang</a>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'koneksi.php';

            $stmt = $pdo->query("SELECT * FROM transaksi ORDER BY id_transaksi DESC");
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id_transaksi']) . "</td>";
                echo "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
                echo "<td>Rp " . number_format($row['total'], 0, ',', '.') . "</td>";
                echo "<td><a href='detail_transaksi.php?id=" . $row['id_transaksi'] . "'>Detail</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>