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

    <style>
        h2{
            text-align: center;
        }

        table{
            width: 600px;
            height: 200px;
            border:1px solid black;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }

        tr,td{
            width: 300px;
            border: 1px solid black;
            text-align: center;
            padding:8px;
        }

    </style>
</head>
<body>

<h2>Biodata</h2>

<table>
    <tr><td>Nama</td> <td><?php echo $nama; ?></td></tr>
    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
    <tr><td>Tempat, Tanggal Lahir</td><td><?php echo $ttl; ?></td></tr>
    <tr><td>Jenis Kelamin</td><td><?php echo $jk; ?></td></tr>
    <tr><td>Hobi</td><td><?php echo $hobi; ?></td></tr>
</table>

</body>
</html>




