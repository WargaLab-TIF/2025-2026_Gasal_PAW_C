<?php
include 'konek.php'; 

$errors = [];
$waktu_transaksi = $keterangan = $total = '';
$pelanggan_id = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $waktu_transaksi = $_POST['waktu_transaksi'];
    $keterangan = $_POST['keterangan'];
    $total = $_POST['total'];
    $pelanggan_id = $_POST['pelanggan_id'];

    
    $current_date = date('Y-m-d');
    if (empty($waktu_transaksi)) {
        $errors['waktu_transaksi'] = "Waktu transaksi tidak boleh kosong.";
    } elseif ($waktu_transaksi < $current_date) {
        $errors['waktu_transaksi'] = "Waktu transaksi tidak boleh sebelum hari ini.";
    }


    if (empty($keterangan)) {
        $errors['keterangan'] = "Keterangan tidak boleh kosong.";
    } elseif (strlen($keterangan) < 3) {
        $errors['keterangan'] = "Keterangan minimal 3 karakter.";
    }

    

    
    if (empty($pelanggan_id)) {
        $errors['pelanggan_id'] = "Pelanggan harus dipilih.";
    }

    
    if (count($errors) === 0) {
        $sql = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id) 
                VALUES ('$waktu_transaksi', '$keterangan', '$total', '$pelanggan_id')";
        if ($conn->query($sql) === TRUE) {
            header('Location: index.php');
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}


$sql_pelanggan = "SELECT id, nama FROM pelanggan";
$result_pelanggan = $conn->query($sql_pelanggan);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            border-color: #4CAF50;
        }
        .error {
            color: #e74c3c;
            font-size: 0.85em;
            margin-top: 5px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-right: 10px;
            transition: background-color 0.3s;
        }
        .btn-success {
            background-color: #4CAF50;
        }
        .btn-success:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Data Transaksi</h2>
        <form method="POST" action="">
            
            <div class="form-group">
                <label>Waktu Transaksi:</label>
                <input type="date" name="waktu_transaksi" min="<?php echo date('Y-m-d'); ?>" value="<?php echo htmlspecialchars($waktu_transaksi); ?>" required>
                <?php if (isset($errors['waktu_transaksi'])): ?>
                    <div class="error"><?php echo $errors['waktu_transaksi']; ?></div>
                <?php endif; ?>
            </div>

        
            <div class="form-group">
                <label>Keterangan:</label>
                <textarea name="keterangan" rows="3" required><?php echo htmlspecialchars($keterangan); ?></textarea>
                <?php if (isset($errors['keterangan'])): ?>
                    <div class="error"><?php echo $errors['keterangan']; ?></div>
                <?php endif; ?>
            </div>

            
            <div class="form-group">
                <label>Total:</label>
                <input type="number" name="total" value="0" readonly>
            </div>

            
            <div class="form-group">
                <label>Pelanggan:</label>
                <select name="pelanggan_id" required>
                    <option value="">Pilih Pelanggan</option>
                    <?php
                    if ($result_pelanggan->num_rows > 0) {
                        while ($row = $result_pelanggan->fetch_assoc()) {
                            echo "<option value='{$row['id']}' " . ($pelanggan_id == $row['id'] ? 'selected' : '') . ">{$row['nama']}</option>";
                        }
                    }
                    ?>
                </select>
                <?php if (isset($errors['pelanggan_id'])): ?>
                    <div class="error"><?php echo $errors['pelanggan_id']; ?></div>
                <?php endif; ?>
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <button type="submit" class="btn btn-success">Tambah Transaksi</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
