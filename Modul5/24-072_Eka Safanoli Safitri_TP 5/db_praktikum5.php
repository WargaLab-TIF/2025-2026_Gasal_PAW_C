<?php
// 1. Koneksi ke MySQL (belum memilih database)
$host = "localhost";
$user = "root";
$pass = "";

// Buat koneksi
$conn = mysqli_connect($host, $user, $pass);

// 2. Cek koneksi
if (!$conn) {
    die("❌ Koneksi gagal: " . mysqli_connect_error());
}

// 3. Perintah SQL membuat database jika belum ada
$sql = "CREATE DATABASE IF NOT EXISTS db_praktikum5";

// 4. Jalankan query
if (mysqli_query($conn, $sql)) {
    echo "✅ Database <b>db_praktikum5</b> berhasil dibuat atau sudah ada.<br>";
} else {
    echo "❌ Error membuat database: " . mysqli_error($conn) . "<br>";
}

// 5. Tutup koneksi
mysqli_close($conn);

echo "✅ Proses selesai!";
?>