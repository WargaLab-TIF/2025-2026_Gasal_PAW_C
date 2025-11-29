<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}
$id = intval($_GET['id']);
$query = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id = $id");
if ($query) {
    header("Location: transaksi.php");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>