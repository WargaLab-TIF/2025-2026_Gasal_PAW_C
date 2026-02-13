<?php
include 'koneksi.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE username = '$username'";
$data = mysqli_query($koneksi, $query);
$hasil = mysqli_fetch_assoc($data);

if ($hasil) {

    if ($hasil['password'] === md5($password) || $password === $hasil['password']) {

        $_SESSION['login'] = true;
        $_SESSION['nama']  = $hasil['nama'];
        $_SESSION['level'] = $hasil['level'];

        header("Location: index.php");
        exit;

    } else {
        header("Location: login.php");
        exit;
    }

} else {
    header("Location: login.php");
    exit;
}
