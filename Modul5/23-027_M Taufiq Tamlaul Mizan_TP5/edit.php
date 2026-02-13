<?php
include 'koneksi_database.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data supplier
$sql = "SELECT * FROM supplier WHERE id = ?";
$edit = $koneksi->prepare($sql);
$edit->bind_param("i", $id); // i=integer
$edit->execute();
$hasil = $edit->get_result();
$row = $hasil->fetch_assoc();

if (!$row) {
    echo "Data tidak ditemukan!";
    exit;
};

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Supplier</title>
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

        .btn-update { 
            background-color: #28a745; 
        } 
        
        .btn-batal { 
            background-color: #dc3545; 
        } 
        
    </style>
</head>
<body>
    <h1>Edit Data Master Supplier</h1> 
    
    <form action="proses update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
        </div>
        <div>
            <label for="telp">Telp</label>
            <input type="text" id="telp" name="telp" value="<?php echo htmlspecialchars($row['telp']); ?>">
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($row['alamat']); ?>">
        </div>
        <div>
            <button type="submit" class="btn btn-update">Update</button>
            <a href="tampilan data.php" class="btn btn-batal">Batal</a>
        </div>
    </form>
</body>
</html>