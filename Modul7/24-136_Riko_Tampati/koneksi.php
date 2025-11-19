<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "toko";

// Set error reporting untuk koneksi agar mudah di-debug
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Menggunakan gaya Object-Oriented (OO)
    $conn = new mysqli($host, $user, $pass, $db);
    // Set charset
    $conn->set_charset("utf8mb4"); 
} catch (mysqli_sql_exception $e) {
    // Hentikan eksekusi dan tampilkan error
    die("Koneksi database gagal: " . $e->getMessage()); 
}
?>