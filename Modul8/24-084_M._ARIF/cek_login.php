<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$q = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

if (!$q) {
    die("Query Error: " . mysqli_error($conn));
}

$data = mysqli_fetch_assoc($q);

if ($data) {
    $_SESSION['login'] = true;
    $_SESSION['nama']  = $data['nama'];
    $_SESSION['level'] = $data['level'];

    header("location:index.php");
} else {
    header("location:login.php?error=1");
}
?>