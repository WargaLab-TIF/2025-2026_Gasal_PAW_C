<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'] ?? date('Y-m-d');

    $stmt = $pdo->prepare("INSERT INTO transaksi (tanggal, total) VALUES (?, 0)");
    $stmt->execute([$tanggal]);

    header("Location: index.php?msg=Transaksi%20berhasil%20dibuat");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Transaksi Baru</h2>
    <form method="POST">
        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" required><br><br>
        <button type="submit">Simpan Transaksi</button>
    </form>
    <br><a href="index.php">Kembali ke Daftar</a>
</body>
</html>