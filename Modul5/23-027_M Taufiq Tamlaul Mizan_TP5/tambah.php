<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Supplier</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 20px; 
        }

        form { 
            max-width: 400px;
        }

        div { 
            margin-bottom: 15px; 
        }
        label { 
            display: block;
            margin-bottom: 5px; 
        }

        input[type="text"] {
            width: 100%; 
            padding: 8px; 
            box-sizing: border-box; 
        }

        .btn { 
            padding: 10px 15px;
            text-decoration: none; 
            color: white; 
            border: none; 
            cursor: pointer; 
            border-radius: 4px; 
        }

        .btn-simpan {
            background-color: #28a745;
        }

        .btn-batal { 
            background-color: #dc3545; 
        }
    </style>
</head>
<body>
    <h1>Tambah Data Master Supplier Baru</h1>
    
    <form action="proses tambah.php" method="POST">
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Nama" required>
        </div>
        <div>
            <label for="telp">Telp</label>
            <input type="text" id="telp" name="telp" placeholder="telp">
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" placeholder="alamat">
        </div>
        <div>
            <button type="submit" class="btn btn-simpan">Simpan</button>
            <a href="tampilan data.php" class="btn btn-batal">Batal</a>
        </div>
    </form>
</body>
</html>