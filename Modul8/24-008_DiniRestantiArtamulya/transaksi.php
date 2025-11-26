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
<title>Data transaksi</title>
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

<h2 style="text-align:center; margin-top:20px;">Data transaksi</h2>

<table>
    <tr>
        <th>ID Transaksi</th>
        <th>Waktu Transaksi</th>
        <th>Keterangan</th>
        <th>Total</th>
        <th>Pelanggan</th>
    </tr>

    <?php
    $query = "SELECT * FROM transaksi";
    $result = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['waktu_transaksi']; ?></td>
            <td><?= $row['keterangan']; ?></td>
            <td><?= $row['total']; ?></td>
            <td><?= $row['pelanggan_id']; ?></td>
        </tr>
    <?php endwhile; ?>

</table>

</body>
</html>
