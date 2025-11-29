<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_tugaspraktikum");

if ($koneksi) {
    echo "Koneksi ke database BERHASIL!";
} else {
    echo "Koneksi ke database GAGAL! - " . mysqli_connect_error();
}
?>