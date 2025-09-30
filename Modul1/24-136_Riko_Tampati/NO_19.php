<?php 
$nama = $_GET['nama'] ?? 'RIKO';
$NIM = $_GET['nim'] ?? '24_136';
$jurusan = $_GET['jurusan'] ?? 'Teknik Informatika';

echo "<table border='1'>
<tr><th>Nama</th><td>$nama</td></tr>
<tr><th>NIM</th><td>$NIM</td></tr>
<tr><th>Jurusan</th><td>$jurusan</td></tr>
</table>";
?>
