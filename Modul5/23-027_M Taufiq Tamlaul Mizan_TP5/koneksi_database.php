<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database praktikum";

$koneksi = new mysqli($servername, $username, $password, $dbname);

if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
} else {
    // echo "Koneksi ke database berhasil!";
}
?>