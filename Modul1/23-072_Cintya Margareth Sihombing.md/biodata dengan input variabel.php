<?php
// Ambil variabel dari query string (GET)
$nama    = isset($_GET['nama']) ? $_GET['nama'] : "Tidak diisi";
$nim     = isset($_GET['nim']) ? $_GET['nim'] : "Tidak diisi";
$prodi   = isset($_GET['prodi']) ? $_GET['prodi'] : "Tidak diisi";
$alamat  = isset($_GET['alamat']) ? $_GET['alamat'] : "Tidak diisi";
$email   = isset($_GET['email']) ? $_GET['email'] : "Tidak diisi";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Biodata</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px 12px;
        }
        th {
            text-align: left;
            background-color: #f2f2f2;
            width: 30%;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Biodata</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?php echo htmlspecialchars($nama); ?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?php echo htmlspecialchars($nim); ?></td>
        </tr>
        <tr>
            <th>Prodi</th>
            <td><?php echo htmlspecialchars($prodi); ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?php echo htmlspecialchars($alamat); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo htmlspecialchars($email); ?></td>
        </tr>
    </table>
</body>
</html>
