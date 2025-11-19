<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $barang_id = $_POST['id'];

    // Cek apakah barang sudah digunakan dalam transaksi_detail
    $check_query = "SELECT COUNT(*) AS count FROM transaksi_detail WHERE barang_id = '$barang_id'";
    $check_result = mysqli_query($conn, $check_query);
    $check_data = mysqli_fetch_assoc($check_result);

    if ($check_data['count'] > 0) {
        echo "<script>alert('Barang tidak dapat dihapus karena sudah digunakan dalam transaksi.'); window.location.href='master_detil.php';</script>";
    } else {
        // Hapus barang jika belum digunakan dalam transaksi
        $delete_query = "DELETE FROM barang WHERE id = '$barang_id'";
        if (mysqli_query($conn, $delete_query)) {
            echo "<script>alert('Barang berhasil dihapus.'); window.location.href='master_detil.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
