<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "toko_makmur";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if($conn){
    echo "koneksi berhasil";
}else{
    echo "eror: ". mysqli_connect_error();
}
?>