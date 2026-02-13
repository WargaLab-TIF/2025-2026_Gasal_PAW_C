<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Tambah Data Supplier</title>
</head>
<body>
    <h2>Tambah Data Master Supplier Baru</h2>
    <form method="post">
        Nama: <input type="text" name="nama"><br>
        Telp: <input type="text" name="telp"><br>
        Alamat: <input type="text" name="alamat"><br>
        <input type="submit" name="simpan" value="Simpan">
        <a href="index.php">Batal</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        mysqli_query($koneksi, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')");
        header("Location: index.php");
    }
    ?>
</body>
</html>
