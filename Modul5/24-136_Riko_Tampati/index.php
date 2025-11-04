<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="text-primary mb-4">Data Master Supplier</h3>
    <a href="tambah.php" class="btn btn-success mb-3">Tambah Data</a>
    
    <table class="table table-bordered table-striped">
        <thead class="table-info">
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
            include 'koneksi.php';
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM supplier");
            while($data = mysqli_fetch_array($query)) {
                echo "
                <tr>
                    <td>{$no}</td>
                    <td>{$data['nama']}</td>
                    <td>{$data['telp']}</td>
                    <td>{$data['alamat']}</td>
                    <td>
                        <a href='edit.php?id={$data['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapus.php?id={$data['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
