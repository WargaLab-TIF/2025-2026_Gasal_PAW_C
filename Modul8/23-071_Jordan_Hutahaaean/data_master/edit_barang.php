<?php
require '../koneksi.php'; // Koneksi ke database
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require '../koneksi.php'; // Koneksi ke database

// Ambil ID barang dari URL
if (!isset($_GET['id'])) {
    echo "ID barang tidak ditemukan!";
    exit;
}

$id_barang = $_GET['id'];

// Ambil data barang berdasarkan ID
$query = "SELECT * FROM barang WHERE id = '$id_barang'";
$result = mysqli_query($koneksi, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Data barang tidak ditemukan!";
    exit;
}

$data_barang = mysqli_fetch_assoc($result);

// Proses update data barang
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $query_update = "UPDATE barang 
                     SET nama_barang = '$nama_barang', 
                         stok = '$stok', 
                         harga = '$harga' 
                     WHERE id = '$id_barang'";

    if (mysqli_query($koneksi, $query_update)) {
        // Jika berhasil, kembali ke halaman data_barang.php
        header('Location: data_barang.php');
        exit;
    } else {
        // Jika gagal, tampilkan error
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
</head>
<body>
<h1>Edit Barang</h1>
<a href="data_barang.php">Kembali</a>
<br><br>

<form method="POST">
    <label>Nama Barang:</label><br>
    <input type="text" name="nama_barang" value="<?= $data_barang['nama_barang'] ?>" required><br>
    <label>Stok:</label><br>
    <input type="number" name="stok" value="<?= $data_barang['stok'] ?>" required><br>
    <label>Harga:</label><br>
    <input type="number" name="harga" value="<?= $data_barang['harga'] ?>" required><br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>
