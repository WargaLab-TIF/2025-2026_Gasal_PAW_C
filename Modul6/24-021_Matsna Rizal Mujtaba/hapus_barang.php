<?php
include 'koneksi.php';

$id_barang = isset($_GET['barang_id']) ? (int)$_GET['barang_id'] : 0;

if ($id_barang <= 0) {
    die("ID barang tidak valid.");
}

// Cek apakah barang dipakai di transaksi_detail
$sql_cek = "SELECT COUNT(*) AS jumlah FROM transaksi_detail WHERE barang_id = $id_barang";
$result_cek = mysqli_query($koneksi, $sql_cek);
$data_cek   = mysqli_fetch_assoc($result_cek);

if ($data_cek['jumlah'] > 0) {
    echo "❌ Barang tidak bisa dihapus karena sudah dipakai di transaksi.";
} else {
    $sql_hapus = "DELETE FROM barang WHERE barang_id = $id_barang";
    mysqli_query($koneksi, $sql_hapus);
    echo "✅ Barang berhasil dihapus.";
}
?>