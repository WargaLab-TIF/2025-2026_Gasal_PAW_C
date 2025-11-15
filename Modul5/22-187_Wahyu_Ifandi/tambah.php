<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Master Supplier Baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<h3>Tambah Data Master Supplier Baru</h3>

<form method="post" action="">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Telp</label>
        <input type="text" name="telp" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-danger">Batal</a>
</form>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "INSERT INTO supplier VALUES(NULL,'$nama','$telp','$alamat')");
    echo "<script>alert('Data berhasil disimpan');window.location='index.php';</script>";
}
?>

</body>
</html>
