<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_barang'] ?? '';
    $harga = $_POST['harga'] ?? 0;
    $stok = $_POST['stok'] ?? 0;

    $stmt = $pdo->prepare("INSERT INTO barang (nama_barang, harga, stok) VALUES (?, ?, ?)");
    $stmt->execute([$nama, $harga, $stok]);

    header("Location: list_barang.php?msg=Barang%20berhasil%20ditambahkan");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Barang Baru</h2>
    <form method="POST">
        <label>Nama Barang:</label>
        <input type="text" name="nama_barang" required><br><br>

        <label>Harga:</label>
        <input type="number" name="harga" step="0.01" min="0" required><br><br>

        <label>Stok:</label>
        <input type="number" name="stok" min="0" value="0"><br><br>

        <button type="submit">Simpan Barang</button>
    </form>
    <br><a href="list_barang.php">Kembali ke Daftar Barang</a>
</body>
</html>