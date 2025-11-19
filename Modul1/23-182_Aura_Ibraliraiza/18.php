<?php
// Data biodata
$nama   = "Aura Ibraliraiza";
$nim    = "230411100182";
$jurusan= "Teknik Informatika";
$alamat = "Kamal, Bangkalan";
$email  = "ailiraliraiza@gmail.com";
$telepon= "085964343397";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Biodata Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            box-shadow: 0px 0px 8px rgba(0,0,0,0.2);
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
            width: 30%;
        }
        td {
            background-color: #fff;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Biodata Mahasiswa</h2>
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
        <th>Jurusan</th>
        <td><?php echo $jurusan; ?></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td><?php echo $alamat; ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $email; ?></td>
    </tr>
    <tr>
        <th>No. Telepon</th>
        <td><?php echo $telepon; ?></td>
    </tr>
</table>

</body>
</html>
