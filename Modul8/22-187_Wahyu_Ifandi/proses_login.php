<?php
session_start();
// Ganti dengan konfigurasi koneksi database Anda
$conn = new mysqli('localhost', 'root', '', 'modul_trakhir');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password']; // Password yang dimasukkan user

    // Query untuk mencari user
    $sql = "SELECT password, level, nama_user FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        // Cek password. Di sini kita asumsikan password di DB belum di-hash 
        // (ganti dengan password_verify() jika sudah di-hash!)
        if ($password == $row['password']) { 
            // LOGIN BERHASIL
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $username;
            $_SESSION['nama_user'] = $row['nama_user'];
            $_SESSION['level'] = $row['level'];
            
            // Redirect ke halaman utama
            header("Location: dashboard.php");
            exit;
        } else {
            // Password salah
            $error = "Username atau Password salah.";
            header("Location: login.php?error=" . urlencode($error));
            exit;
        }
    } else {
        // Username tidak ditemukan
        $error = "Username atau Password salah.";
        header("Location: login.php?error=" . urlencode($error));
        exit;
    }
}
?>