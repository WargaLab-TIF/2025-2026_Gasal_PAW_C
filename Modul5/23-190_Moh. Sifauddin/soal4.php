<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "store";

$koneksi = mysqli_connect($hostname, $username, $password, $dbname);

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = "DELETE FROM supplier WHERE id='$id'";

    if (mysqli_query($koneksi, $query)) {
        header('Location: soal1.php');
            exit();
    }   
}
?>
