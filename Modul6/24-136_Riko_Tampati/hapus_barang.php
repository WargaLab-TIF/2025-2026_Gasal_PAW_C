<?php
include "koneksi.php";
$id = $_GET['id'];

$cek = mysqli_query($conn, "SELECT * FROM detil_transaksi WHERE barang_id='$id'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Barang tidak bisa dihapus karena masih dipakai di transaksi!'); window.location='barang.php';</script>";
    exit;
}

mysqli_query($conn, "DELETE FROM barang WHERE id='$id'");
echo "<script>alert('Barang berhasil dihapus!'); window.location='barang.php';</script>";
?>
