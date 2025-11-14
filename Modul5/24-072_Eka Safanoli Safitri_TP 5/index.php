<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 40px;
        }

        h2 {
            color: #007bff;
            margin-bottom: 10px;
        }

        a.tambah {
            background-color: #28a745;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        a.tambah:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        th {
            background-color: #e9ecef;
            color: #333;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-top: 1px solid #dee2e6;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-edit {
            background-color: #fd7e14;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-edit:hover {
            background-color: #e36c0a;
        }

        .btn-hapus {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-hapus:hover {
            background-color: #c82333;
        }

        .aksi {
            text-align: center;
        }
    </style>
</head>
<body>
<h2>Data Mahasiswa</h2>
<a href="tambah.php" class="tambah">+ Tambah Data</a>
<br><br>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>

    <?php
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $cek_tabel = mysqli_query($conn, "SHOW TABLES LIKE 'mahasiswa'");
    if (mysqli_num_rows($cek_tabel) == 0) {
        echo "<tr><td colspan='5'>Tabel <b>mahasiswa</b> belum ada di database!</td></tr>";
    } else {
        $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
        if (mysqli_num_rows($result) > 0) {
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>$no</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['nim']}</td>
                    <td>{$row['jurusan']}</td>
                    <td class='aksi'>
                        <a href='edit.php?id={$row['id']}' class='btn-edit'>Edit</a>
                        <a href='#' onclick='hapus({$row['id']})' class='btn-hapus'>Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='5'>Belum ada data mahasiswa.</td></tr>";
        }
    }
    ?>
</table>

<script>
function hapus(id) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        window.location = "hapus.php?id=" + id;
    }
}
</script>

</body>
</html>