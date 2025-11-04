<?php 
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM register WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data Supplier</h2>
    <form method="post" action="">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo $d['nama']; ?>" required><br>
        <label>Telp:</label>
        <input type="text" name="telp" value="<?php echo $d['telp']; ?>" required><br>
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $d['alamat']; ?>" required><br>
        <input type="submit" name="update" value="Update" class="btn-simpan">
    </form>

    <?php
    if(isset($_POST['update'])){
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        mysqli_query($conn, "UPDATE register SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");
        echo "<script>alert('Data berhasil diupdate');window.location='index.php';</script>";
    }
    ?>
</body>
</html>
