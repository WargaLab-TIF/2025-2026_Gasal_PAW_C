<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM supplier WHERE id='$id'"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Data Supplier</title>
<link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="container">
    <h1>Edit Data Supplier</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?= $data['nama']; ?>" required>
        </div>

        <div class="form-group">
            <label>Telepon:</label>
            <input type="text" name="telp" value="<?= $data['telp']; ?>" required>
        </div>

        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" required><?= $data['alamat']; ?></textarea>
        </div>

        <div class="button-group">
            <input type="submit" name="update" value="Perbarui" class="btn btn-green">
            <input type="button" value="Batal" onclick="window.location='index.php';" class="btn btn-red">
        </div>
    </form>
</div>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        $update = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'";
        if (mysqli_query($conn, $update)) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
        }
    }
    ?>
</body>
</html>