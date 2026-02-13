<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "tpp_modul_8";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>