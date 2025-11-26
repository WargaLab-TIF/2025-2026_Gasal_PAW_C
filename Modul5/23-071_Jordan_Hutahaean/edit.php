<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id=$id");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
</head>
<body>

<h2>✏️ Edit Data Mahasiswa</h2>

<form method="post">
    Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>
    NIM: <input type="text" name="nim" value="<?= $data['nim'] ?>" required><br><br>
    Jurusan: <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>" required><br><br>
    <button type="submit" name="update">Simpan Perubahan</button>
</form>

<br>
<a href="index.php">⬅️ Kembali ke Data Mahasiswa</a>

</body>
</html>
