<?php
include 'koneksi.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Ambil data user
$query = "SELECT * FROM user WHERE username = '$username'";
$data = mysqli_query($koneksi, $query);
$hasil = mysqli_fetch_assoc($data);

if ($hasil) {
    // Sesuaikan dengan format password di database
    // usernamame: Admin10, password: admin123 -> md5('admin123')
    if ($hasil['password'] === md5($password) || $password === $hasil['password']) {
        $_SESSION['login'] = true;
        $_SESSION['nama']  = $hasil['nama'];
        $_SESSION['level'] = $hasil['level'];

        header("Location: index.php");
        exit;
    } else {
        // Password salah
        header("Location: login.php");
        exit;
    }
} else {
    // Username tidak ditemukan
    header("Location: login.php");
    exit;
}
