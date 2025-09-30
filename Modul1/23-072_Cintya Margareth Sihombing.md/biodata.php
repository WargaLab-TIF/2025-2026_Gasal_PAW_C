<?php
// deklarasi variabel biodata
$nama     = "Cintya Margareth Sihombing";
$nim      = "230411100072";
$prodi    = "Teknik Informatika";
$alamat   = "Gonting, Bahal Batu II, Siborongborong, Tapanuli tara, Sumatera Utara";
$email    = "sihombingcintya0@gmail.com";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Biodata</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px 12px;
        }
        th {
            text-align: left;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Biodata</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?php echo $nim; ?></td>
        </tr>
        <tr>
            <th>Prodi</th>
            <td><?php echo $prodi; ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $email; ?></td>
        </tr>
    </table>
</body>
</html>
