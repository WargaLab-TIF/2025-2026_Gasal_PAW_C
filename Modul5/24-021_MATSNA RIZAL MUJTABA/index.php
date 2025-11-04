<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style1.css">
    <title>Data Master Supplier</title>
</head>
<body>
    <h2>Data Master Supplier</h2>
    <a href="tambah.php">Tambah Data</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th colspan="2">Tindakan</th>
        </tr>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM supplier");
        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>
                <td>$no</td>
                <td>{$data['nama']}</td>
                <td>{$data['telp']}</td>
                <td>{$data['alamat']}</td>
                <td><a href='edit.php?id={$data['id']}'>Edit</a></td>
                <td><a href='hapus.php?id={$data['id']}' onclick=\"return confirm('Anda yakin akan menghapus supplier ini?')\">Hapus</a></td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>
