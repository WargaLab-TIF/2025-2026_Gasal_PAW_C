<?php
$koneksi = new mysqli("localhost", "root", "", "db_paw6");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
} else {
    echo "Koneksi database BERHASIL!";
}
?>