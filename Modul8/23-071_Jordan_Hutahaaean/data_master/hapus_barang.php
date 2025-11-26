<?php
require '../koneksi.php'; // Koneksi ke database
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['id'])) {
    $id_barang = $_GET['id'];
    $query = "DELETE FROM barang WHERE id = $id_barang";

    if (mysqli_query($koneksi, $query)) {
        header('Location: data_barang.php');
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    header('Location: data_barang.php');
}
?>
