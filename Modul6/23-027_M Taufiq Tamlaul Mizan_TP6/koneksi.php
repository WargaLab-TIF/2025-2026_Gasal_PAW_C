<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$db_host = 'localhost';
$db_user = 'root'; 
$db_pass = '';
$db_name = 'database praktikum modul 6 baru'; 

$koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}

$koneksi->set_charset("utf8mb4");

?>