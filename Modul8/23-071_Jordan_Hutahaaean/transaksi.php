<?php
include('koneksi.php'); 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Ambil data transaksi
$query_transaksi = "SELECT t.id, t.waktu_transaksi, t.keterangan, t.total, p.nama AS pelanggan_nama 
                    FROM transaksi t 
                    JOIN pelanggan p ON t.pelanggan_id = p.id 
                    ORDER BY t.id ASC";
$transaksi_result = mysqli_query($koneksi, $query_transaksi);

// Ambil data supplier
$query_supplier = "SELECT * FROM supplier";
$supplier_result = mysqli_query($koneksi, $query_supplier);
$supplier = mysqli_fetch_assoc($supplier_result);

// Ambil detail transaksi dengan urutan berdasarkan transaksi_id
$query_detail = "SELECT td.transaksi_id, td.barang_id, td.qty, td.harga, b.nama_barang AS barang_nama 
                 FROM transaksi_detail td 
                 JOIN barang b ON td.barang_id = b.id 
                 ORDER BY td.transaksi_id ASC"; // Urutkan berdasarkan transaksi_id
$detail_result = mysqli_query($koneksi, $query_detail);

// Ambil data barang
$query_barang = "SELECT b.id, b.nama_barang, b.harga 
                 FROM barang b";
$barang_result = mysqli_query($koneksi, $query_barang);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <h1>Data Pengelolaan Transaksi</h1>

    <!-- Data Barang -->
    <h2>Data Barang</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Tindakan</th>
        </tr>
        <?php
        $no = 1;
        while ($barang = mysqli_fetch_assoc($barang_result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $barang['id'] . "</td>";
            echo "<td>" . $barang['nama_barang'] . "</td>";
            echo "<td>" . number_format($barang['harga'], 0, ',', '.') . "</td>";
            echo "<td>
                <button class='btn-delete'><a href='Transaksi/hapus_barang.php?id=" . $barang['id'] . "'>Hapus</a></button>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <!-- Data Transaksi -->
    <h2>Data Transaksi</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Waktu Transaksi</th>
            <th>Keterangan</th>
            <th>Total</th>
            <th>Nama Pelanggan</th>
        </tr>
        <?php while ($transaksi = mysqli_fetch_assoc($transaksi_result)) { ?>
            <tr>
                <td><?= $transaksi['id'] ?></td>
                <td><?= $transaksi['waktu_transaksi'] ?></td>
                <td><?= $transaksi['keterangan'] ?></td>
                <td><?= number_format($transaksi['total'], 0, ',', '.') ?></td>
                <td><?= $transaksi['pelanggan_nama'] ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>

    <!-- Data Detail Transaksi -->
    <h2>Data Detail Transaksi</h2>
    <table border="1">
        <tr>
            <th>Transaksi ID</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Qty</th>
        </tr>
        <?php while ($detail = mysqli_fetch_assoc($detail_result)) { ?>
            <tr>
                <td><?= $detail['transaksi_id'] ?></td>
                <td><?= $detail['barang_nama'] ?></td>
                <td><?= number_format($detail['harga'], 0, ',', '.') ?></td>
                <td><?= $detail['qty'] ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>

    <!-- Link ke halaman Tambah Data Transaksi dan Detail Transaksi -->
    <button><a href="transaksi/tambah_transaksi.php">Tambah Transaksi</a></button>
    <button><a href="transaksi/tambah_detail_transaksi.php">Tambah Detail Transaksi</a></button>
    <button><a href="home.php">Kembali</a></button>
</body>
</html>