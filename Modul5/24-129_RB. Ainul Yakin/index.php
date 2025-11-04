<?php
include 'koneksi.php';

/* Ambil semua supplier */
$sql = "SELECT id, nama, telp, alamat FROM supplier ORDER BY id ASC";
$result = $mysqli->query($sql);
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Data Master Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="card">
    <div class="header">
        <h2>Data Master Supplier</h2>
        <a class="btn btn-add" href="tambah.php">Tambah Data</a>
    </div>

    <table class="table" aria-describedby="daftar-supplier">
        <thead>
        <tr>
            <th style="width:6%;">No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th style="width:18%;">Tindakan</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($result && $result->num_rows): ?>
            <?php 
            $no = 1; while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['telp'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['alamat'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td class="actions">
                <a class="edit" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a class="delete" href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
            <td colspan="5" class="no-data">Tidak ada data supplier.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    </div>
</div>
</body>
</html>
