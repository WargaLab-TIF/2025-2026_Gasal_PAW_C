<?php
$conn = mysqli_connect("localhost", "root", "", "store");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
