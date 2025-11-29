<?php
include "koneksi.php";
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

if (!isset($_POST['nama_barang'], $_POST['jumlah'], $_POST['total'])) {
    die("Form tidak lengkap!");
}

$nama   = $_POST['nama_barang'];
$jumlah = $_POST['jumlah'];
$total  = $_POST['total'];

echo "DEBUG:<br>";
echo "Nama Barang: $nama<br>";
echo "Jumlah: $jumlah<br>";
echo "Total: $total<br><br>";

$sql = "INSERT INTO transaksi (nama_barang, jumlah, total)
        VALUES ('$nama', '$jumlah', '$total')";

echo "Query: $sql<br><br>";

$query = mysqli_query($koneksi, $sql);

if (!$query) {
    die("ERROR MySQL: " . mysqli_error($koneksi));
}
echo "Data berhasil disimpan!";
?>