<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $waktu_transaksi = $_POST['waktu_transaksi'];
    $keterangan = $_POST['keterangan'];
    $pelanggan_id = $_POST['pelanggan_id'];

    // Simpan transaksi master dengan total awal 0
    $query = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id)
              VALUES ('$waktu_transaksi', '$keterangan', 0, '$pelanggan_id')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Transaksi berhasil disimpan.'); window.location.href='master_detail.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
