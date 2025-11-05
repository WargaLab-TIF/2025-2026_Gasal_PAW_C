<?php
    $koneksi = mysqli_connect("localhost", "root", "", "store");

    if ($koneksi) {
        $query = "SELECT * FROM supplier";
        $hasil = mysqli_query($koneksi, $query);
    } else {
        echo "Connection Failed: " . mysqli_connect_error();
    }
?>
