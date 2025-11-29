<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$q = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_assoc($q);

if ($data) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];

    if ($data['level'] == 1) {
        header("Location: home_admin.php");
    } else {
        header("Location: home_user.php");
    }
} else {
    echo "<script>alert('Login gagal');window.location='login.php';</script>";
}
?>