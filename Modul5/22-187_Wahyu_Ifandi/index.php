<?php
include 'koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM supplier");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
        }
        .edit {
            background-color: #3498db;
        }
        .edit:hover {
            background-color: #2980b9;
        }
        .hapus {
            background-color: #e74c3c;
        }
        .hapus:hover {
            background-color: #c0392b;
        }
        .tambah {
            background-color: #2ecc71;
            padding: 7px 12px;
        }
        .tambah:hover {
            background-color: #27ae60;
        }
    </style>
    <script>
        function konfirmasiHapus(id) {
            if (confirm("Anda yakin akan menghapus supplier ini?")) {
                window.location.href = "hapus.php?id=" + id;
            }
        }
    </script>
</head>
<body>
    <h2>Daftar Supplier</h2>

    <a href="tambah.php" class="tambah">+ Tambah Supplier</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['telp'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="edit">Edit</a>
                <a href="#" onclick="konfirmasiHapus(<?= $row['id'] ?>)" class="hapus">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
