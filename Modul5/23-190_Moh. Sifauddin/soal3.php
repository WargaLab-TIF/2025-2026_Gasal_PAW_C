<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "store";

    $koneksi = mysqli_connect($hostname, $username, $password, $dbname);

    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");

    if ($data && mysqli_num_rows($data) > 0) {
        $hasil = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 350px;
            margin-left: 150px;
            text-align: right;
        }
        h2 {
            color: #46A2B4;
        }
        td {
            padding: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="button"] {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .button-container {
            text-align: center; 
        }
    </style>
</head>
<body>
    <h2>Edit Data Master Supplier</h2>

    <form action="" method="POST">
        <table>
            <tr>
                <td width="150">Nama</td>
                <td><input type="text" name="nama" value="<?php echo $hasil['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Telp</td>
                <td><input type="text" name="telp" value="<?php echo $hasil['telp']; ?>"></td>
            </tr>
            <tr>  
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $hasil['alamat']; ?>"</td>
            </tr>
            <tr>
                <td colspan="2" class="button-container">
                    <input type="submit" value="Update" name="simpan">
                    <a href="soal1.php"><input type="button" value="Batal"></a>
                </td>
            </tr>
        </table>
    </form>
    <?php
    }

    if (isset($_POST['simpan'])) {
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $telp = mysqli_real_escape_string($koneksi, $_POST['telp']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

        $sql = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'";

        if (mysqli_query($koneksi, $sql)) {
            header('Location: soal1.php');
            exit();
        }
    }
    ?>
</body>
</html>
