<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'suplier_db';

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
    die('Koneksi gagal: ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');
$koneksi = $mysqli; // For compatibility with procedural style in other files
?>