<?php
include "koneksi.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM supplier WHERE id = $id";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        header("Location: index.php");
    } else {
        echo "Gagal menghapus data.";
    }
}
?>
