<?php
include 'koneksi_database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // siapkan data yang ingin di masukkan 
    $query = $koneksi->prepare("INSERT INTO supplier (nama, telp, alamat) VALUES (?, ?, ?)");
    $query->bind_param( "sss",$_POST['nama'], $_POST['telp'], $_POST['alamat']);
    $query->execute() ? header("Location: tampilan data.php") : die("Gagal menyimpan data: " . $query->error);
    
    $query->close();
    $koneksi->close();
}
?>