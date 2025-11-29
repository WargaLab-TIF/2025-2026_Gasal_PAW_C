<?php
require 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM supplier");
?>

<h2 style="text-align:center; color:#2a72d4;">Data Master Supplier</h2>
<center>
<a href="tambah.php" style="background:green; color:white; padding:8px 12px; text-decoration:none; border-radius:4px;">Tambah Data</a><br><br>

<table border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse; text-align:center;">
<tr style="background:#d9edf7;">
    <th>No</th>
    <th>Nama</th>
    <th>Telp</th>
    <th>Alamat</th>
    <th>Tindakan</th>
</tr>

<?php
$no = 1;
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>$no</td>
        <td>{$row['nama']}</td>
        <td>{$row['telp']}</td>
        <td>{$row['alamat']}</td>
        <td>
            <a href='edit.php?id={$row['id']}' style='background:orange; color:white; padding:4px 10px; text-decoration:none; border-radius:4px;'>Edit</a>
            <a href='hapus.php?id={$row['id']}' style='background:red; color:white; padding:4px 10px; text-decoration:none; border-radius:4px;' onclick='return confirm(\"Anda yakin akan menghapus supplier ini?\")'>Hapus</a>
        </td>
    </tr>";
    $no++;
}
?>
</table>
</center>
