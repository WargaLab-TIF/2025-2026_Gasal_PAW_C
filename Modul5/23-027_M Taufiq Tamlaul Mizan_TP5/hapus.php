<?php
include 'koneksi_database.php';

// Ambil ID dari URL
$id = $_GET['id'];

$hapus = $koneksi->prepare("DELETE FROM supplier WHERE id = ?");
$hapus->bind_param("i", $id); // i = integer

if ($hapus->execute()) {
    header("Location: tampilan data.php");
    exit();
} else {
    echo "Error: " . $hapus->error;
}

$hapus->close();
$koneksi->close();
?>