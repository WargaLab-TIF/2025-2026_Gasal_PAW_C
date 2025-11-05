<?php
$host = "localhost";
$user = "root";
$pass = "";

$conn = mysqli_connect($host, $user, $pass);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE db_register";

if (mysqli_query($conn, $sql)) {
    echo "Database 'db_register' berhasil dibuat";
} else {
    echo "Gagal membuat database: " . mysqli_error($conn);
}

mysqli_select_db($conn, "db_register");
$sql_tabel = "CREATE TABLE register (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    telp VARCHAR(20) NOT NULL,
    alamat VARCHAR(100) NOT NULL
)";

if (mysqli_query($conn, $sql_tabel)) {
    echo "Tabel 'register' berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Gagal membuat tabel: " . mysqli_error($conn);
}

mysqli_close($conn);
?>


