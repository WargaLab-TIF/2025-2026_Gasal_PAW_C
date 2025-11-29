<?php 
require "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $cek = mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE barang_id='$id'");

    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
                alert('Barang ini sudah digunakan dalam transaksi, tidak dapat dihapus!');
                window.location='hapus_barang.php';
              </script>";
        exit;
    } else {
        $hapus = mysqli_query($conn, "DELETE FROM barang WHERE id='$id'");
        if ($hapus) {
            echo "<script>
                    alert('Barang berhasil dihapus!');
                    window.location='hapus_barang.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Penghapusan gagal!');
                    window.location='hapus_barang.php';
                  </script>";
        }
        exit;
    }
}

$data = mysqli_query($conn, "SELECT * FROM barang");
?>
<center>
<h3>Data Barang</h3>

<table border="1" cellpadding="6">
<tr>
    <th>ID Barang</th>
    <th>Nama Barang</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php while ($b = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $b['id']; ?></td>
    <td><?= $b['nama_barang']; ?></td>
    <td><?= number_format($b['harga']); ?></td>
    <td><?= $b['stok']; ?></td>
    <td>
        <a href="hapus_barang.php?id=<?= $b['id']; ?>"
           onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
           Hapus
        </a>
    </td>
</tr>
<?php } ?>
</table>
</center>