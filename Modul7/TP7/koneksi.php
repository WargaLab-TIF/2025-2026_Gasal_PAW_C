<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "store6";

define('DB', mysqli_connect($host, $user, $pass, $db));

if (mysqli_connect_errno()) {
    die("Gagal koneksi ke database: " . mysqli_connect_error());
}
?>