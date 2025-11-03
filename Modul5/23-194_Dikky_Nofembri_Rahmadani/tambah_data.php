<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Tambah Data Master</title>
    <style>
        .simpan-hover:hover {
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
    <div class="container mt-5" style="max-width: 600px">
        <?php 
            require_once 'conn.php';

            $nama = $telp = $alamat = "";
            $namaErr = $telpErr = $alamatErr = "";

            function input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if(empty($_POST["nama"])) {
                    $namaErr = "Nama tidak boleh kosong!";
                } elseif (!preg_match("/^[a-zA-Z\s.]*$/", $_POST["nama"])) {
                    $namaErr = "Nama hanya boleh mengandung huruf dan spasi";
                } else {
                    $nama = input($_POST["nama"]);
                }

                if(empty($_POST["telp"])) {
                    $telpErr = "Nomor telepon tidak boleh kosong!";
                } elseif (!preg_match("/^[0-9]*$/", $_POST["telp"])) {
                    $telpErr = "Nomor telepon hanya boleh menggunakan angka";
                } else {
                    $telp = input($_POST["telp"]);
                }

                if(empty($_POST["alamat"])) {
                    $alamatErr = "Alamat tidak boleh kosong!";
                } elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d\s.]+$/", $_POST["alamat"])) {
                    $alamatErr = "Alamat harus mengandung minimal 1 huruf dan 1 angka";
                } else {
                    $alamat = input($_POST["alamat"]);
                }

                if(empty($namaErr) && empty($telpErr) && empty($alamatErr)) {
                    $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
                    $result = mysqli_query($conn, $sql);
                    
                    if($result) {
                        header("Location: masterSupplier.php");
                    } else {
                        echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
                    }
                }
            }
        ?><br><br>
        <h2 class="mb-5">Tambah Data Master Supplier Baru</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nama : </label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama supplier" required value="<?php echo $nama;?>">
                <small class="text-danger"><?php echo $namaErr;?></small>
            </div>
            <div class="form-group">
                <label>Telp : </label>
                <input type="text" class="form-control" name="telp" placeholder="Masukkan telp supplier" required value="<?php echo $telp;?>">
                <small class="text-danger"><?php echo $telpErr;?></small>
            </div>
            <div class="form-group">
                <label>Alamat : </label>
                <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat supplier" required value="<?php echo $alamat;?>">
                <small class="text-danger"><?php echo $alamatErr;?></small>
            </div>
            <div class="container-btn mt-3">
                <button type="submit" name="submit" class="btn simpan-hover btn-success">Simpan</button>
                <a href="masterSupplier.php" class="btn batal-hover btn-danger">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>