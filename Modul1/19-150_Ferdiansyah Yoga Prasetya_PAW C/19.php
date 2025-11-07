<!DOCTYPE html>
<html>
<head>
    <title>Biodata Fleksibel</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Biodata Fleksibel</h2>
    
    <?php
    // Mengambil data dari query string dengan nilai default
    $nama = $_GET['nama'] ?? 'Ferdiansyah';
    $umur = $_GET['umur'] ?? '24';
    $alamat = $_GET['alamat'] ?? 'Surabaya';
    $email = $_GET['email'] ?? 'ferdi@mail.com';
    $pekerjaan = $_GET['pekerjaan'] ?? 'Mahasiswa';
    ?>
    
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?php echo htmlspecialchars($nama); ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><?php echo htmlspecialchars($umur); ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo htmlspecialchars($alamat); ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo htmlspecialchars($email); ?></td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td><?php echo htmlspecialchars($pekerjaan); ?></td>
        </tr>
    </table>
    
</body>
</html>