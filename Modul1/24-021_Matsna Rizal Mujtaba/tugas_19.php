<html>
<head>
    <title>Biodata Dinamis</title>
</head>
<body>
    <h1>BIODATA PRIBADI</h1>

    <table border="1">
        <tr>
            <td>Nama</td>
            <td><?php echo $_GET['nama']; ?></td>
        </tr>
        <tr>
            <td>Nama Panggilan</td>
            <td><?php echo $_GET['panggilan']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $_GET['alamat']; ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><?php echo $_GET['umur']; ?></td>
        </tr>
    </table>
</body>
</html>
