<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Supplier</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data Supplier</h1>
    <a href="tambah.php" class="btn-tambah">+ Tambah Data</a>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM supplier");
        while ($data = mysqli_fetch_assoc($query)) {
            echo "
            <tr>
                <td>$no</td>
                <td>{$data['nama']}</td>
                <td>{$data['telp']}</td>
                <td>{$data['alamat']}</td>
                <td>
                    <a href='edit.php?id={$data['id']}' class='btn-edit'>Edit</a>
                    <a href='hapus.php?id={$data['id']}' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")' class='btn-hapus'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>