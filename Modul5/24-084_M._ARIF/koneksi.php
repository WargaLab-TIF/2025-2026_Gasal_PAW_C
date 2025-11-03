<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penjualan";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    echo "koneksi gagal: " . mysqli_connect_error();
}