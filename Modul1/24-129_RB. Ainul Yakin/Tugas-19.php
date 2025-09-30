<!DOCTYPE html>
<html>
<head>
    <title>Biodata via query string</title>
</head>
<body>
    <h2>Biodata Diri (via query string)</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>Label</th>
            <th>Data</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?php echo $_GET['nama'] ?? 'Tidak tersedia'; ?></td>
        </tr>
        <tr>
            <td>Kampus</td>
            <td><?php echo $_GET['kampus'] ?? 'Tidak tersedia'; ?></td>
        </tr>
        <tr>
            <td>Fakultas</td
            ><td><?php echo $_GET['fakultas'] ?? 'Tidak tersedia'; ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td><?php echo $_GET['prodi'] ?? 'Tidak tersedia'; ?></td>
        </tr>
    </table>
</body>
</html>
