<?php
$nama       = $_GET['nama'] ?? "Data belum diisi";
$nim        = $_GET['nim'] ?? "Data belum diisi";
$prodi      = $_GET['prodi'] ?? "Data belum diisi";
$universitas = $_GET['universitas'] ?? "Data belum diisi";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Biodata Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            width: 50%;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        th {
            background: #f0f0f0;
            text-align: left;
            width: 30%;
        }
    </style>
</head>

<body>
    <h2>Biodata Mahasiswa</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= htmlspecialchars($nama); ?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?= htmlspecialchars($nim); ?></td>
        </tr>
        <tr>
            <th>Prodi</th>
            <td><?= htmlspecialchars($prodi); ?></td>
        </tr>
        <tr>
            <th>Universitas</th>
            <td><?= htmlspecialchars($universitas); ?></td>
        </tr>
    </table>
</body>
</html>