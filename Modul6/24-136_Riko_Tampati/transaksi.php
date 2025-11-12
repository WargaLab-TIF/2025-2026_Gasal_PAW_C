<?php
include "koneksi.php";

if (isset($_POST['tambah'])) {
    $tgl = $_POST['tanggal'];
    mysqli_query($conn, "INSERT INTO transaksi (tanggal, total) VALUES ('$tgl', 0)");
    header("Location: transaksi.php");
}

$transaksi = mysqli_query($conn, "SELECT * FROM transaksi");
?>

<h2>Data Transaksi</h2>

<form method="post">
    Tanggal: <input type="date" name="tanggal" required>
    <button type="submit" name="tambah">Tambah</button>
</form>

<table border="1" cellpadding="5">
<tr><th>ID</th><th>Tanggal</th><th>Total</th><th>Aksi</th></tr>
<?php while ($t = mysqli_fetch_assoc($transaksi)) : ?>
<tr>
    <td><?= $t['id'] ?></td>
    <td><?= $t['tanggal'] ?></td>
    <td><?= number_format($t['total']) ?></td>
    <td><a href="detil_transaksi.php?transaksi_id=<?= $t['id'] ?>">Input Detil</a></td>
</tr>
<?php endwhile; ?>
</table>

<a href="barang.php">Kembali ke Barang</a>
