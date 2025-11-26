<?php
session_start();

include 'koneksi.php';

// ambil data dari form 
$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

// Menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
    $row = mysqli_fetch_assoc($data);

    // simpan session
    $_SESSION['username'] = $username;
    $_SESSION['level'] = $row['level'];
    $_SESSION['status'] = "login";
    

    // Redirect ke halaman dashboard
    header("location:dashboard.php");
} else {
    header("location:login.php?pesan=gagal");
}
?>