<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .update-hover:hover {
            color: #198754;
            background-color: white;
        }

        .batal-hover:hover {
            color: #dc3545;
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="container mt-5" style="max-width: 600px;">
        <?php
        require_once "conn.php";

        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM supplier WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($result);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = htmlspecialchars($_POST["id"]);
            $nama = input($_POST["nama"]);
            $telp = input($_POST["telp"]);
            $alamat = input($_POST["alamat"]);

            $sql = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: masterSupplier.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal di Update </div>";
            }
        }
        ?>
        <br><br>
        <h2 class="m-5">Edit Data Master</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label>Nama : </label>
                <input type="text" class="form-control" name="nama" required value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>">
            </div>
            <div class="form-group">
                <label>Telp : </label>
                <input type="number" class="form-control" name="telp" required value="<?php echo isset($data['telp']) ? $data['telp'] : ''; ?>">
            </div>
            <div class="form-group">
                <label>Alamat : </label>
                <input type="text" class="form-control" name="alamat" required value="<?php echo isset($data['alamat']) ? $data['alamat'] : ''; ?>">
            </div>
            <div class="container-btn mt-3">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <button type="submit" class="btn update-hover btn-success">Update</button>
                <a href="masterSupplier.php" class="btn batal-hover btn-danger">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>