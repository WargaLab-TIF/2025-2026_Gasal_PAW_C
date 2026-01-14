<?php
// Konfigurasi Database
$host = "localhost"; // Biasanya 'localhost' untuk lingkungan pengembangan lokal
$user = "root";      // Ganti jika username database Anda berbeda
$pass = "";          // Ganti jika password database Anda berbeda
$db = "modul_trakhir"; // Nama database sesuai permintaan Anda

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    // Jika koneksi gagal, hentikan program dan tampilkan pesan error
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}

// Jika koneksi berhasil, Anda bisa melanjutkan kode tanpa pesan
// echo "Koneksi ke database berhasil!"; 
// Anda dapat menghapus baris di atas setelah pengujian.

?>