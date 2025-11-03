<?php
require 'koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM supplier WHERE id=$id");
echo "<script>alert('Data supplier berhasil dihapus!'); window.location='index.php';</script>";
?>
