<?php
// Database connection
include('../koneksi.php'); 
if (!isset($_SESSION['logged_in'])) {
    header('Location: ../login.php');
    exit;
}
$barang_id = $_GET['id'];

// Cek apakah barang sudah digunakan di transaksi_detail
$check_query = "SELECT * FROM transaksi_detail WHERE barang_id = '$barang_id'";
$check_result = mysqli_query($koneksi, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    echo "<script>alert('Barang sudah digunakan di transaksi detail. Tidak dapat dihapus.');</script>";
    echo "<script>window.location.href = '../transaksi.php';</script>";
} else {
    $delete_query = "DELETE FROM barang WHERE id = '$barang_id'";
    mysqli_query($koneksi, $delete_query);
    header('Location: ../transaksi.php');
}
?>
