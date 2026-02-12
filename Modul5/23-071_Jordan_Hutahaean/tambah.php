<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES ('$nama','$nim','$jurusan')");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
</head>
<body>

<h2>➕ Tambah Data Mahasiswa</h2>
<form method="post">
    Nama: <input type="text" name="nama" required><br><br>
    NIM: <input type="text" name="nim" required><br><br>
    Jurusan: <input type="text" name="jurusan" required><br><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<br>
<a href="index.php">⬅️ Kembali ke Data Mahasiswa</a>

</body>
</html>
