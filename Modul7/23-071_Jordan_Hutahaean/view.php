<?php 
include "koneksi.php";

$query = "SELECT transaksi.*, pelanggan.nama 
          FROM transaksi 
          LEFT JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header-container">
    <h2>Data Transaksi</h2>
    <button class="btn-add"><a href="tambah_transaksi.php">Tambah Transaksi</a></button>
    <button class="btn-report"><a href="report_transaksi.php">Lihat Laporan</a></button>
</div>

<table>
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Pelanggan</th>
        <th>Keterangan</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>

<?php 
$no = 1;
while ($d = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $d['id'] ?></td>
        <td><?= $d['waktu_transaksi'] ?></td>
        <td><?= $d['nama'] ?></td>
        <td><?= $d['keterangan'] ?></td>
        <td><?= number_format($d['total']) ?></td>
        <td>
            <button class="btn-view"><a href="detail_transaksi.php?id=<?= $d['id'] ?>">Detail</a></button>
            <button class="btn-delete"><a href="hapus_transaksi.php?id=<?= $d['id'] ?>">Hapus</a></button>
        </td>
    </tr>
<?php } ?>

</table>

</body>
</html>
