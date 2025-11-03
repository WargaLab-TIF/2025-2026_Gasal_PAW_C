<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Data Master Supplier</title>
    <style>
        .edit-hover:hover {
            color: #ffc107;
            background-color: white;
        }
        .hapus-hover:hover {
            color: #dc3545;
            background-color: white;
        }
        .tambah-hover:hover {
            color: #198754;
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5" style="max-width: 900px;">
        <?php
        require_once "conn.php";

        if (isset($_POST['hapus_id'])) {
            $id = htmlspecialchars($_POST['hapus_id']);

            $sql = "DELETE FROM supplier WHERE id='$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: masterSupplier.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus </div>";
            }
        }
        ?>
        <h2 class="m-5">Data Master Supplier</h2>
        <div class="mb-2 text-end">
            <a href="tambah_data.php" class="btn btn-success tambah-hover">Tambah Data</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Telp</th>
                    <th>Alamat</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "conn.php";
                $sql = "SELECT * FROM supplier ORDER BY id ASC";

                $result = mysqli_query($conn, $sql);
                $no = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $no++;
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['telp']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td>
                            <a href="edit_data.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-warning btn-sm edit-hover">Edit</a>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="hapus_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                <button type="submit" class="btn btn-danger btn-sm hapus-hover" onclick="return confirm('Anda yakin akan menghapus data supplier ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>