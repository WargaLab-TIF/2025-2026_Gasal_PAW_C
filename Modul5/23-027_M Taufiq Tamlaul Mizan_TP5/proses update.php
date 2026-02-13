<?php
include 'koneksi_database.php';

// Ambil data
$id = $_POST['id'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

$update = $koneksi->prepare("UPDATE supplier SET nama = ?, telp = ?, alamat = ? WHERE id = ?");
$update->bind_param("sssi", $nama, $telp, $alamat, $id); // s=string i=integer

if ($update->execute()) {
    header("Location: tampilan data.php");
    exit();
} else {
    echo "Error: " . $update->error;
}

$update->close();
$koneksi->close();
?>