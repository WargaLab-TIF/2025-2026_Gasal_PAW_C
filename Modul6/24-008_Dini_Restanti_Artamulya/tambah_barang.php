<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Query untuk menambah data
    $query = "INSERT INTO barang (nama_barang, harga, stok) VALUES ('$nama_barang', '$harga', '$stok')";
    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        echo "<script>
                alert('Barang berhasil ditambahkan!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan barang!');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Styling tambahan khusus untuk form tambah barang */
        .form-container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #333;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 10px;
            font-size: 14px;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 25px;
            border-radius: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn-back {
            background-color: #777;
        }

        .btn-back:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Barang</h2>
        <form method="POST">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" required>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" required>
            </div>
            <div class="btn-container">
                <button type="submit" name="simpan" class="btn">Simpan</button>
                <a href="index.php" class="btn btn-back">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
