<?php 
include 'koneksi.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <h2>Edit Data Master supplier</h2>
    <?php
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM supplier WHERE id = $id");
    $data = $result->fetch_assoc();
    ?>
    <form method="post">
        Nama: <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        Telp: <input type="text" name="telp" value="<?php echo htmlspecialchars($data['telp'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        Alamat: <input type="text" name="alamat" value="<?php echo htmlspecialchars($data['alamat'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <input type="submit" name="update" value="Update">
        <a href="index.php">Batal</a>
    </form>
    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        $mysqli->query("UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id");
        header("Location: index.php");
    }
    ?>
</body>
</html>