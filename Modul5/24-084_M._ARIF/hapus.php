<?php
include 'koneksi.php';
$id = $_GET['id'];

$hapus = "DELETE FROM supplier WHERE id='$id'";
if (mysqli_query($conn, $hapus)) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
} else {
    echo "Gagal menghapus data.";
}
?>