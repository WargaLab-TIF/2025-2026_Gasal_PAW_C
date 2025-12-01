<?php
require 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM supplier WHERE id=$id");
$data = mysqli_fetch_assoc($result);
?>

<h2 style="text-align:center; color:#2a72d4;">Edit Data Master Supplier</h2>
<center>
<form method="post" action="">
    <table>
        <tr><td>Nama</td><td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td></tr>
        <tr><td>Telp</td><td><input type="text" name="telp" value="<?php echo $data['telp']; ?>"></td></tr>
        <tr><td>Alamat</td><td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td></tr>
        <tr><td colspan="2" align="center">
            <input type="submit" name="update" value="Update" style="background:green; color:white; padding:5px 12px;">
            <a href="index.php" style="background:red; color:white; padding:5px 12px; text-decoration:none;">Batal</a>
        </td></tr>
    </table>
</form>

<?php
if(isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    mysqli_query($conn, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id");
    echo "<script>alert('Data berhasil diupdate!'); window.location='index.php';</script>";
}
?>
</center>
