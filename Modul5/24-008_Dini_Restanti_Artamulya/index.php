<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Master Supplier</h2>
    <a href="tambah.php" class="btn-tambah">Tambah Data</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM register ORDER BY id ASC");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama']; ?></td>
            <td><?php echo $d['telp']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn-edit">Edit</a>
                <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
