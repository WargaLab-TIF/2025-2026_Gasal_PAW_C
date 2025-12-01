<?php require 'koneksi.php'; ?>

<h2 style="text-align:center; color:#2a72d4;">Tambah Data Master Supplier Baru</h2>
<center>
<form method="post" action="">
    <table>
        <tr><td>Nama</td><td><input type="text" name="nama"></td></tr>
        <tr><td>Telp</td><td><input type="text" name="telp"></td></tr>
        <tr><td>Alamat</td><td><input type="text" name="alamat"></td></tr>
        <tr><td colspan="2" align="center">
            <input type="submit" name="submit" value="Simpan" style="background:green; color:white; padding:5px 12px;">
            <a href="index.php" style="background:red; color:white; padding:5px 12px; text-decoration:none;">Batal</a>
        </td></tr>
    </table>
</form>

<?php
if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama','$telp','$alamat')");
    echo "<script>alert('Data berhasil ditambah!'); window.location='index.php';</script>";
}
?>
</center>
