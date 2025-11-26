<?php
include('../koneksi.php'); 
if (!isset($_SESSION['logged_in'])) {
    header('Location: ../login.php');
    exit;
}
// Ambil data barang
$data_barang = mysqli_query($koneksi, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Data Barang</h1>
<a href="../home.php">Kembali</a> | 
<a href="tambah_barang.php">Tambah Barang</a>
<br><br>

<!-- Tampilkan data barang -->
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($data_barang)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_barang'] ?></td>
            <td><?= $row['stok'] ?></td>
            <td><?= $row['harga'] ?></td>
            <td>
                <a href="edit_barang.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="hapus_barang.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>
