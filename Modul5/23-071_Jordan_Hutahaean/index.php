<?php
include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #eee; }
        a { text-decoration: none; }
    </style>
</head>
<body>

<h2>📋 Data Mahasiswa</h2>
<a href="tambah.php">➕ Tambah Data</a><br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['nim'] ?></td>
        <td><?= $row['jurusan'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">✏️ Edit</a> |
            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
