<!-- Rancang halaman biodata yang fleksibel dengan input variabel (misalnya via query
string) ! -->

<?php
$nama = $_GET['nama'] ?? '';
$alamat = $_GET['alamat'] ?? '';
$ttl = $_GET['ttl'] ?? '';
$jk = $_GET['jk'] ?? '';
$hobi = $_GET['hobi'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Biodata Sederhana</title>
</head>
<body>

<h2>Biodata</h2>

<table border="1" cellpadding="8">
    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
    <tr><td>Tempat, Tanggal Lahir</td><td><?php echo $ttl; ?></td></tr>
    <tr><td>Jenis Kelamin</td><td><?php echo $jk; ?></td></tr>
    <tr><td>Hobi</td><td><?php echo $hobi; ?></td></tr>
</table>

</body>
</html>
