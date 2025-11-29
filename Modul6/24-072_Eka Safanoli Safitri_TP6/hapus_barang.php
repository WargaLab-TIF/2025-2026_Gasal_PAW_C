<?php
include 'koneksi.php';
$id = $_GET['id'];

// Cek apakah barang dipakai di transaksi_detail
$cek = $koneksi->query("SELECT * FROM transaksi_detail WHERE barang_id='$id'");
if ($cek->num_rows > 0) {
    echo "<script>alert('Barang sudah digunakan di transaksi, tidak bisa dihapus!');history.back();</script>";
    exit;
}

// Hapus barang
$koneksi->query("DELETE FROM barang WHERE id='$id'");
header("Location: index.php");
?>