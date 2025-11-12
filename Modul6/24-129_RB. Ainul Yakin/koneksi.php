<?php
// $host = 'localhost';
// $user = 'root';
// $pass = '';
// $db   = 'penjualan_db';

// $conn = mysqli_connect($host, $user, $pass, $db);

// if ($conn) {
//     echo "Koneksi Berhasil";
// } else {
//     echo "Koneksi Gagal: " . mysqli_connect_error();
// }


$koneksi = mysqli_connect("localhost", "root", "", "penjualan_db");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi Berhasil";
}
?>
