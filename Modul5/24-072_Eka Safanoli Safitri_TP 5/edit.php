<?php include 'koneksi.php'; ?>
<?php
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$row = mysqli_fetch_array($data);
?>

<h2>Edit Data Mahasiswa</h2>
<form method="post">
    Nama: <input type="text" name="nama" value="<?= $row['nama'] ?>"><br>
    NIM: <input type="text" name="nim" value="<?= $row['nim'] ?>"><br>
    Jurusan: <input type="text" name="jurusan" value="<?= $row['jurusan'] ?>"><br><br>
    <input type="submit" name="update" value="Update">
</form>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id='$id'");
    header("Location: index.php");
}
?>