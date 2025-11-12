<?php
include "koneksi.php";

$transaksi_id = $_POST['transaksi_id'];
$barang_id = $_POST['barang_id'];
$jumlah = $_POST['jumlah'];

$q = mysqli_query($conn, "SELECT harga FROM barang WHERE id='$barang_id'");
$b = mysqli_fetch_assoc($q);
$harga = $b['harga'];

$subtotal = $harga * $jumlah;

mysqli_query($conn, "INSERT INTO detil_transaksi (transaksi_id, barang_id, jumlah, subtotal)
VALUES ('$transaksi_id', '$barang_id', '$jumlah', '$subtotal')");

mysqli_query($conn, "
    UPDATE transaksi 
    SET total = (
        SELECT SUM(subtotal) FROM detil_transaksi WHERE transaksi_id='$transaksi_id'
    )
    WHERE id='$transaksi_id'
");

echo "<script>alert('Detil transaksi berhasil disimpan!'); window.location='detil_transaksi.php?transaksi_id=$transaksi_id';</script>";
?>
