<?php
$conn = mysqli_connect("localhost", "root", "");

// Buat database jika belum ada
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS db_supplier");
mysqli_select_db($conn, "db_supplier");

// Buat tabel supplier
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS supplier (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    telp VARCHAR(20),
    alamat VARCHAR(100)
)");

// Isi data awal jika tabel kosong
$cek = mysqli_query($conn, "SELECT COUNT(*) AS jml FROM supplier");
$row = mysqli_fetch_assoc($cek);
if ($row['jml'] == 0) {
    mysqli_query($conn, "INSERT INTO supplier (nama, telp, alamat) VALUES
        ('PT. Maju Bersama', '08123456', 'Surabaya'),
        ('PT. Senang Sekali', '081515563', 'Bangkalan'),
        ('PT. Segar Segar', '0845454663', 'Surabaya')");
}
?>
