<?php
include 'koneksi_database.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Supplier</title>

    <style>
        body {
             font-family: Arial, sans-serif;
             margin: 20px;
            }

        h1 {
            color: #333;
         }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,td{
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #e6f7ff; 
        }

        tr:nth-child(even){
             background-color: #f9f9f9;
            }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            margin: 2px 0;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn-tambah { 
            background-color: #28a745;
         }

        .btn-edit {
             background-color: #ffc107; 
            }

        .btn-hapus {
             background-color: #dc3545; 
            } 
    </style>
</head>
<body>

    <h1>Data Master Supplier</h1>
    <a href="tambah.php" class="btn btn-tambah">Tambah Data</a>

    <table>
        <thead>
            <tr>
                <th>No</th> 
                <th>Nama</th> 
                <th>Telp</th>
                <th>Alamat</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        
    <tbody>
        <?php
        $hasil = $koneksi->query("SELECT * FROM supplier");
        if ($hasil->num_rows) {
            $no = 1;
            while ($baris = $hasil->fetch_assoc()) {
                echo "<tr>

                    <td>{$no}</td>
                    <td>{$baris['nama']}</td>
                    <td>{$baris['telp']}</td>
                    <td>{$baris['alamat']}</td>
                    <td>
                        <a href='edit.php?id={$baris['id']}' class='btn btn-edit'>Edit</a>
                        <a href='hapus.php?id={$baris['id']}' class='btn btn-hapus' onclick=\"return confirm('yakin anda menghapus supplier ini?');\">Hapus</a>
                    </td>

                </tr>";
        $no++;
    }

    } else echo "<tr>
                <td colspan='5' style='text-align:center;'>
                    Tidak ada data
                </td>
            </tr>";

    $koneksi->close();
    ?>
    </tbody>
</table>

</body>
</html>