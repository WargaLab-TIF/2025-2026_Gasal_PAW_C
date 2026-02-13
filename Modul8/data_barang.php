<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['login']) || $_SESSION['level'] != 1) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Data Barang</title>
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

<h2 style="text-align:center; margin-top:20px;">Data Barang</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>ID Supplier</th>
    </tr>

    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM barang");

    while ($data = mysqli_fetch_assoc($query)) : ?>
        <tr>
            <td><?= $data['id']; ?></td>
            <td><?= $data['nama_barang']; ?></td>
            <td><?= $data['harga']; ?></td>
            <td><?= $data['stok']; ?></td>
            <td><?= $data['supplier_id']; ?></td>
        </tr>
    <?php endwhile; ?>

</table>

</body>
</html>
