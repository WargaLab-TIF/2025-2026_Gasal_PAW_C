<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "store";

    $koneksi = mysqli_connect($hostname, $username, $password, $dbname);

    $errors = [];
    if (isset($_POST['simpan'])) {
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $telp = mysqli_real_escape_string($koneksi, $_POST['telp']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

        if (empty($nama) || !preg_match("/^[a-zA-Z\s]+$/", $nama)) {
            $errors[] = "Nama tidak boleh kosong dan hanya boleh huruf.";
        }

        if (empty($telp) || !preg_match("/^[0-9]+$/", $telp)) {
            $errors[] = "Telp tidak boleh kosong dan hanya boleh angka.";
        }

        if (empty($alamat) || !preg_match("/^[a-zA-Z0-9\s]+$/", $alamat)) {
            $errors[] = "Alamat tidak boleh kosong dan hanya boleh huruf atau angka.";
        }


        if (empty($errors)) {
            $sql = "INSERT INTO supplier(nama, telp, alamat) VALUES('$nama', '$telp', '$alamat')";
            if (mysqli_query($koneksi, $sql)) {
                header('Location: soal1.php');
                exit;
            }
        }
    }
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
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <h2> Data Master Supplier</h2>

    <div>
        <form action="" method="POST">
            <table>
                <tr>
                    <td width="150">Nama</td>
                    <td>
                        <input type="text" name="nama" placeholder="Nama" value="<?php echo isset($nama) ? $nama : ''; ?>">
                        <div class="error"><?php echo isset($errors[0]) ? $errors[0] : ''; ?></div>
                    </td>
                </tr>
                <tr>
                    <td>Telp</td>
                    <td>
                        <input type="text" name="telp" placeholder="Telp" value="<?php echo isset($telp) ? $telp : ''; ?>">
                        <div class="error"><?php echo isset($errors[1]) ? $errors[1] : ''; ?></div>
                    </td>
                </tr>
                <tr>  
                    <td>Alamat</td>
                    <td>
                        <input type="text" name="alamat" placeholder="Alamat" value="<?php echo isset($alamat) ? $alamat : ''; ?>">
                        <div class="error"><?php echo isset($errors[2]) ? $errors[2] : ''; ?></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="button-container">
                        <input type="submit" name="simpan" value="Simpan">
                        <a href="soal1.php"><input type="button" value="Batal"></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>