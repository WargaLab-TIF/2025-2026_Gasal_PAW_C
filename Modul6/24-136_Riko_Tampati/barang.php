<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    mysqli_query($conn, "INSERT INTO barang (nama_barang, harga) VALUES ('$nama', '$harga')");
    header("Location: barang.php");
}

$barang = mysqli_query($conn, "SELECT * FROM barang");
?>

<h2>Data Barang</h2>

<form method="post">
    Nama Barang: <input type="text" name="nama_barang" required>
    Harga: <input type="number" name="harga" required>
    <button type="submit" name="simpan">Simpan</button>
</form>

<table border="1" cellpadding="5">
<tr><th>ID</th><th>Nama Barang</th><th>Harga</th><th>Aksi</th></tr>
<?php while ($b = mysqli_fetch_assoc($barang)) : ?>
<tr>
    <td><?= $b['id'] ?></td>
    <td><?= $b['nama_barang'] ?></td>
    <td><?= number_format($b['harga']) ?></td>
    <td><a href="hapus_barang.php?id=<?= $b['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a></td>
</tr>
<?php endwhile; ?>
</table>

<a href="transaksi.php">Ke Transaksi</a>
