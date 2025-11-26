<?php
require '../koneksi.php'; // Koneksi ke database
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cari ID terbesar di tabel
    $query_id = "SELECT MAX(id) AS max_id FROM barang";
    $result = mysqli_query($koneksi, $query_id);
    $row = mysqli_fetch_assoc($result);
    $next_id = $row['max_id'] + 1; // Hitung ID berikutnya

    // Ambil data dari form
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // Query SQL untuk menambahkan data
    $query = "INSERT INTO barang (id, kode_barang, nama_barang, stok, harga) 
              VALUES ('$next_id', '$kode_barang', '$nama_barang', '$stok', '$harga')";

    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, kembali ke halaman data_barang.php
        header('Location: data_barang.php');
        exit;
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
</head>
<body>
<h1>Tambah Barang</h1>
<a href="data_barang.php">Kembali</a>
<br><br>
<form method="POST">
    <label>Kode Barang:</label><br>
    <input type="text" name="kode_barang" required><br>
    <label>Nama Barang:</label><br>
    <input type="text" name="nama_barang" required><br>
    <label>Stok:</label><br>
    <input type="number" name="stok" required><br>
    <label>Harga:</label><br>
    <input type="number" name="harga" required><br>
    <button type="submit">Tambah</button>
</form>
</body>
</html>
