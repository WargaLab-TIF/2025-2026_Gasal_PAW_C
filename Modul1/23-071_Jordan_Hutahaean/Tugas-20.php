<?php
$nama   = $_GET['nama'] ?? "Tidak diketahui";
$nim    = $_GET['nim'] ?? "Tidak diketahui";
$kelas  = $_GET['kelas'] ?? "Tidak diketahui";
$alamat = $_GET['alamat'] ?? "Tidak diketahui";

echo "<h2>Biodata</h2>";
echo "<table border='1' cellpadding='5'>
<tr><th>Nama</th><td>$nama</td></tr>
<tr><th>NIM</th><td>$nim</td></tr>
<tr><th>Kelas</th><td>$kelas</td></tr>
<tr><th>Alamat</th><td>$alamat</td></tr>
</table>";
?>
