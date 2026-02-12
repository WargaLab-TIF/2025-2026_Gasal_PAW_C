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
                window.location.href = 'hapus_supplier.php?confirm=yes&id=$id';
            } else {
                window.location.href = 'data_supplier.php';
            }
          </script>";
}

// Memproses penghapusan jika konfirmasi diberikan
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menghapus data berdasarkan id
    $query = "DELETE FROM supplier WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        header("Location: data_supplier.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
