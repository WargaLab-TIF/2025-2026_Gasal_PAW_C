<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
</head>
<body>
    <h1>Biodata Diri</h1>
    <form action="" method="GET">
        <table>
            <tr>
                <td>
                    <label>Nama: </label>
                    <input type="text" name="nama"><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Umur: </label>
                    <input type="text" name="umur"><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label>NIM: </label>
                    <input type="text" name="nim"><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Jurusan: </label>
                    <input type="text" name="jurusan"><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Alamat: </label>
                    <input type="text" name="alamat"><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Hobi: </label>
                    <input type="text" name="hobi"><br><br>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Tampilkan"></td>
            </tr>
        </table>
        
    </form>
    <?php
    if (isset($_GET['nama'])) {
        $nama = $_GET['nama'];
        $umur = $_GET['umur'];
        $nim = $_GET['nim'];
        $jurusan = $_GET['jurusan'];
        $alamat = $_GET['alamat'];
        $hobi = $_GET['hobi'];
    ?>
        <h2>Biodata Diri</h2>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <td>Nama</td>
                <td><?php echo $nama; ?></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><?php echo $umur; ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><?php echo $nim; ?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><?php echo $jurusan; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?php echo $alamat; ?></td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td><?php echo $hobi; ?></td>
            </tr>
        </table>
    <?php } ?>
</body>
</html>