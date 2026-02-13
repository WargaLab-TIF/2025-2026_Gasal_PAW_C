<?php
include 'koneksi.php';
$result = $koneksi->query("SELECT id, nama_barang, harga FROM barang ORDER BY nama_barang");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
</head>
<body>
    <h2>Daftar Barang</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr><th>ID</th><th>Nama Barang</th><th>Harga</th><th>Aksi</th></tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['nama_barang']); ?></td>
            <td><?php echo $row['harga']; ?></td>
            <td>
                <a href="hapus_barang.php?id=<?php echo $row['id']; ?>" 
                   onclick="return confirm('Anda yakin?');">
                   Hapus
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
<?php $koneksi->close(); ?>