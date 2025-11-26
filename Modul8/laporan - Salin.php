<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Laporan Penjualan</title>
<style>
table {
    border-collapse: collapse;
    width: 90%;
    margin: 40px auto;
}
table, th, td {
    border: 1px solid #888;
}
th {
    background: #0b5fa4;
    color: white;
    padding: 10px;
}
td {
    padding: 8px;
}
</style>
</head>
<body>

<?php include "navbar.php"; ?>
<h2>Filter Laporan</h2>

<form method="GET">
    <input type="date" name="dari" required>
    <input type="date" name="sampai" required>
    <button type="submit">Tampilkan</button>
</form>

<?php
if (isset($_GET['dari']) && isset($_GET['sampai'])) {
    $dari   = $_GET['dari'];
    $sampai = $_GET['sampai'];

    echo "<h3>Laporan dari $dari sampai $sampai</h3>";

    // contoh query: ambil data transaksi
    $sql = "SELECT * FROM transaksi WHERE tanggal BETWEEN '$dari' AND '$sampai'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Total</th>
              </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>".$row['id_transaksi']."</td>
                    <td>".$row['tanggal']."</td>
                    <td>".$row['nama_barang']."</td>
                    <td>".$row['jumlah']."</td>
                    <td>".$row['total']."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Tidak ada data transaksi pada rentang tanggal tersebut.</p>";
    }
}
?>
</body>
</html>
