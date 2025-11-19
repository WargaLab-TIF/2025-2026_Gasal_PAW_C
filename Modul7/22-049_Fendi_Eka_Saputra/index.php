<?php
include 'konek.php'; 


$sql_barang = "SELECT * FROM barang JOIN supplier ON barang.supplier_id = supplier.id";
$result_barang = $conn->query($sql_barang);

$sql_transaksi = "SELECT * FROM transaksi JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id";
$result_transaksi = $conn->query($sql_transaksi);

$sql_transaksi_detail = "SELECT * FROM transaksi_detail JOIN barang ON transaksi_detail.barang_id = barang.id";
$result_transaksi_detail = $conn->query($sql_transaksi_detail);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang dan Transaksi</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f9;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .btn {
            padding: 8px 16px;
            color: #fff;
            border-radius: 4px;
            text-align: center;
            margin: 5px;
            text-decoration: none;
        }
        .btn-success { background-color: #28a745; }
        .btn-danger { background-color: #dc3545; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 12px; text-align: left; }
        th { background-color: #f0f0f0; color: #333; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>
    <div class="container">
        
        <h2>Barang</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Nama Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_barang->num_rows > 0) {
                    while ($row = $result_barang->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['kode_barang']}</td>";
                        echo "<td>{$row['nama_barang']}</td>";
                        echo "<td>{$row['harga']}</td>";
                        echo "<td>{$row['stok']}</td>";
                        echo "<td>{$row['nama']}</td>";
                        echo "<td>
                                <a href='delete_barang.php?id={$row['id']}' class='btn btn-danger' onclick=\"return confirm('Anda yakin ingin menghapus data ini?');\">Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Data tidak ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>

        
        <h2>Transaksi</h2>
        <a href="transaksi.php" class="btn btn-success">Tambah Transaksi</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Waktu Transaksi</th>
                    <th>Keterangan</th>
                    <th>Total</th>
                    <th>Nama Pelanggan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_transaksi->num_rows > 0) {
                    while ($row = $result_transaksi->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['waktu_transaksi']}</td>";
                        echo "<td>{$row['keterangan']}</td>";
                        echo "<td>{$row['total']}</td>";
                        echo "<td>{$row['nama']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Data tidak ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>

        
        <h2>Transaksi Detail</h2>
        <a href="transaksi_detail.php" class="btn btn-success">Tambah Transaksi Detail</a>
        <table>
            <thead>
                <tr>
                    <th>Transaksi ID</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_transaksi_detail->num_rows > 0) {
                    while ($row = $result_transaksi_detail->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['transaksi_id']}</td>";
                        echo "<td>{$row['nama_barang']}</td>";
                        echo "<td>{$row['harga']}</td>";
                        echo "<td>{$row['qty']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Data tidak ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
