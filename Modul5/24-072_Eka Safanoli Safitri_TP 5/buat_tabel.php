<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_praktikum5";

// Koneksi ke database yang baru dibuat
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query membuat tabel
$sql = "CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50),
    nim VARCHAR(20),
    jurusan VARCHAR(50)
)";

// Jalankan query
if (mysqli_query($conn, $sql)) {
    echo "Tabel mahasiswa berhasil dibuat!";
} else {
    echo "Error membuat tabel: " . mysqli_error($conn);
}

mysqli_close($conn);
?>