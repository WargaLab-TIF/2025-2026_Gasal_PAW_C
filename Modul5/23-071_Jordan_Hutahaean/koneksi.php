<?php
$conn = mysqli_connect("localhost", "root", "", "db_mahasiswa");

// Kalau koneksi gagal
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
