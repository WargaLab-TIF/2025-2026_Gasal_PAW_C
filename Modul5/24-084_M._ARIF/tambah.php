<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Data Supplier</title>
<link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="container">
    <h1>Tambah Data Supplier</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" required>
        </div>

        <div class="form-group">
            <label>Telepon:</label>
            <input type="text" name="telp" required>
        </div>

        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" required></textarea>
        </div>
        <div class="button-group">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-green">
            <input type="button" value="Batal" onclick="window.location='index.php';" class="btn btn-red">
        </div>
    </form>
</div>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
        }
    }
    ?>
</body>
</html>