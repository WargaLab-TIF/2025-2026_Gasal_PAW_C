<?php
include 'koneksi.php';


if (isset($_GET['id'])) {
    $id_supplier = $_GET['id'];
    

    $hapus = mysqli_real_escape_string($koneksi, $id_supplier);


    $query = "DELETE FROM supplier WHERE id='$hapus'";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data supplier berhasil dihapus.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($koneksi) . "'); window.location='index.php';</script>";
    }
} else {
    echo "<script>window.location='index.php';</script>";
}

?>