<?php
require '../koneksi.php'; // Koneksi ke database
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Tampilkan konfirmasi penghapusan
    echo "<script>
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                window.location.href = 'hapus_pelanggan.php?confirm=yes&id=$id';
            } else {
                window.location.href = 'data_pelanggan.php';
            }
          </script>";
}

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $id = $_GET['id'];
    $query = "DELETE FROM pelanggan WHERE id = '$id'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: data_pelanggan.php");
    } else {
        echo "Gagal menghapus data!";
    }
}
?>
