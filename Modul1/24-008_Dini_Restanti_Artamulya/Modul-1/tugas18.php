<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
</head>
<body>
    <h1>Biodata Diri</h1>
    <?php
        $nama = "Kim Mingyu";
        $umur = "28 tahun";
        $nim = "240411100008";
        $jurusan ="Teknik Infofrmatika";
        $hobi ="Memasak";
        $alamat = "Korea";
    ?>

    <table border="1">
        <tr>
            <td>Nama</td>
            <td>
                <?php echo $nama; ?>
            </td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>
                <?php echo $umur; ?>
            </td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>
                <?php echo $nim; ?>
            </td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>
                <?php echo $jurusan; ?>
            </td>
        </tr>
        <tr>
            <td>Hobi</td>
            <td>
                <?php echo $hobi; ?>
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>
                <?php echo $alamat; ?>
            </td>
        </tr>
    </table>
</body>
</html>