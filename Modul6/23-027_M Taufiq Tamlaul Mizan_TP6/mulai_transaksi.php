<?php

include 'koneksi.php'; 

$sql = "INSERT INTO transaksi () VALUES ()";

if ($koneksi->query($sql) === TRUE) {
    
    $id_transaksi_baru = $koneksi->insert_id;
    
    header("Location: form_tambah_detail.php?transaksi_id=" . $id_transaksi_baru);
    exit; 

} else {
    die("Gagal membuat transaksi baru: " . $koneksi->error);
}


?>