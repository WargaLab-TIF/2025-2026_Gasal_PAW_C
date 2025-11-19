<?php
include "koneksi.php";

$id = $_GET['id'];

$q = mysqli_query($koneksi, 
    "SELECT transaksi.*, pelanggan.nama, pelanggan.alamat, pelanggan.telp 
     FROM transaksi 
     LEFT JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id
     WHERE transaksi.id = '$id'"
);

$data = mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Transaksi</title>
</head>
<body>

<h2>Detail Transaksi</h2>

<p>ID Transaksi: <?= $data['id'] ?></p>
<p>Pelanggan: <?= $data['nama'] ?></p>
<p>Alamat: <?= $data['alamat'] ?></p>
<p>Telepon: <?= $data['telp'] ?></p>

<p>Tanggal: <?= $data['waktu_transaksi'] ?></p>
<p>Keterangan: <?= $data['keterangan'] ?></p>
<p>Total: <?= number_format($data['total']) ?></p>

<a href="view.php">Kembali</a>

</body>
</html>
