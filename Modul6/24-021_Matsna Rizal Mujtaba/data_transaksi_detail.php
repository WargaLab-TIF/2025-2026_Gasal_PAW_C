<?php
include 'koneksi.php';
$query = "SELECT * FROM transaksi_detail";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Transaksi Detail</title>
    <style>
        h2 { color: #699AC0; margin: 0; }
        .tambah { background-color: #74BF48; color: white; border-radius: 3px; padding: 10px 15px; border: none; }
        .header { background-color: #CFEBFE; }
        .content { width: 900px; margin: auto; }
    </style>
</head>
<body>
    <div class="content">
        <h2>Data Transaksi Detail</h2>
        <div style="text-align: right; margin: 10px 0;">
            <a href="form_transaksi_detail.php"><button class="tambah">Tambah Data</button></a>
        </div>
        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <tr class="header">
                <th>No</th>
                <th>Id Transaksi</th>
                <th>Id Barang</th>
                <th>Harga</th>
                <th>Qty</th>
            </tr>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($hasil)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['transaksi_id']; ?></td>
                <td><?= $row['barang_id']; ?></td>
                <td><?= $row['harga']; ?></td>
                <td><?= $row['qty']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
