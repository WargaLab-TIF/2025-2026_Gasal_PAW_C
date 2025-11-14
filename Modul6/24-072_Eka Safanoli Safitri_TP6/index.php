<?php include 'koneksi.php'; ?>

<h2>Data Barang</h2>
<table border="1">
<tr><th>ID</th><th>Nama</th><th>Harga</th><th>Aksi</th></tr>
<?php
$barang = $koneksi->query("SELECT * FROM barang");
while ($b = $barang->fetch_assoc()) {
    echo "<tr>
            <td>{$b['id']}</td>
            <td>{$b['nama']}</td>
            <td>Rp{$b['harga']}</td>
            <td><a href='hapus_barang.php?id={$b['id']}' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a></td>
          </tr>";
}
?>
</table>

<br>
<a href="tambah_transaksi.php">Tambah Transaksi</a> |
<a href="tambah_detail.php">Tambah Detail Transaksi</a>

<h2>Data Transaksi</h2>
<table border="1">
<tr><th>ID</th><th>Waktu</th><th>Keterangan</th><th>Total</th></tr>
<?php
$trx = $koneksi->query("SELECT * FROM transaksi");
while ($t = $trx->fetch_assoc()) {
    echo "<tr>
            <td>{$t['id']}</td>
            <td>{$t['waktu']}</td>
            <td>{$t['keterangan']}</td>
            <td>Rp{$t['total']}</td>
          </tr>";
}
?>
</table>

<h2>Data Detail Transaksi</h2>
<table border="1">
<tr><th>ID</th><th>Transaksi</th><th>Barang</th><th>Qty</th><th>Harga</th></tr>
<?php
$detail = $koneksi->query("
    SELECT td.*, b.nama AS barang_nama 
    FROM transaksi_detail td
    JOIN barang b ON td.barang_id=b.id
");
while ($d = $detail->fetch_assoc()) {
    echo "<tr>
            <td>{$d['id']}</td>
            <td>{$d['transaksi_id']}</td>
            <td>{$d['barang_nama']}</td>
            <td>{$d['qty']}</td>
            <td>Rp{$d['harga']}</td>
          </tr>";
}
?>
</table>