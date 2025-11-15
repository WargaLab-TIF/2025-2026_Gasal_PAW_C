<?php
$conn = mysqli_connect("localhost", "root", "", "db_supplier");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
