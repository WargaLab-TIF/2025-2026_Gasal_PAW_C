<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Data Supplier</h2>
    <form method="post" action="">
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        <label>Telp:</label>
        <input type="text" name="telp" required><br>
        <label>Alamat:</label>
        <input type="text" name="alamat" required><br>
        <input type="submit" name="submit" value="Simpan" class="btn-simpan">
    </form>

    <?php
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO register VALUES('', '$nama', '$telp', '$alamat')";
        mysqli_query($conn, $query);

        echo "<script>alert('Data berhasil ditambahkan');window.location='index.php';</script>";
    }
    ?>
</body>
</html>
