<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM supplier WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");
    echo "<script>alert('Data berhasil diubah');window.location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
</head>
<body>
    <h2>Edit Data Supplier</h2>
    <form method="post">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= $row['nama'] ?>" required><br><br>

        <label>Telepon:</label><br>
        <input type="text" name="telp" value="<?= $row['telp'] ?>" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required><?= $row['alamat'] ?></textarea><br><br>

        <button type="submit" name="update">Simpan Perubahan</button>
    </form>
</body>
</html>
