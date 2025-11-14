<?php include 'koneksi.php'; ?>

<h2>Tambah Data Mahasiswa</h2>

<form method="post">
    Nama: <input type="text" name="nama"><br>
    NIM: <input type="text" name="nim"><br>
    Jurusan: <input type="text" name="jurusan"><br><br>
    <input type="submit" name="simpan" value="Simpan">
</form>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES ('$nama', '$nim', '$jurusan')");
    header("Location: index.php");
}
?>