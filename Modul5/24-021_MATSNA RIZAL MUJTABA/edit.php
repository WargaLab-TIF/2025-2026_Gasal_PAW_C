<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Edit Data Supplier</title>
</head>
<body>
    <h2>Edit Data Master Supplier</h2>
    <?php
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");
    $data = mysqli_fetch_array($query);
    ?>
    <form method="post">
        Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br>
        Telp: <input type="text" name="telp" value="<?= $data['telp'] ?>"><br>
        Alamat: <input type="text" name="alamat" value="<?= $data['alamat'] ?>"><br>
        <input type="submit" name="update" value="Update">
        <a href="index.php">Batal</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        mysqli_query($koneksi, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");
        header("Location: index.php");
    }
    ?>
</body>
</html>
