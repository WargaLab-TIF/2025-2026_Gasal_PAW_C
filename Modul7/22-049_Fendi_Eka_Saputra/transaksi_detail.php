<?php
include 'konek.php'; 

$errors = [];
$barang_id = $transaksi_id = $qty = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $barang_id = $_POST['barang_id'];
    $transaksi_id = $_POST['transaksi_id'];
    $qty = $_POST['qty'];

    
    if (empty($barang_id)) {
        $errors['barang_id'] = "Barang harus dipilih.";
    } else {
        
        $check_barang = "SELECT * FROM transaksi_detail WHERE barang_id = '$barang_id' AND transaksi_id = '$transaksi_id'";
        $result_check = $conn->query($check_barang);
        if ($result_check->num_rows > 0) {
            $errors['barang_id'] = "Barang ini sudah ada di transaksi ini.";
        }
    }

    
    if (empty($transaksi_id)) {
        $errors['transaksi_id'] = "Transaksi harus dipilih.";
    }

    
    if (empty($qty)) {
        $errors['qty'] = "Quantity tidak boleh kosong.";
    } elseif (!is_numeric($qty) || $qty <= 0) {
        $errors['qty'] = "Quantity harus berupa angka positif.";
    }

    
    if (count($errors) === 0) {
    
        $get_price_query = "SELECT harga FROM barang WHERE id = '$barang_id'";
        $result_price = $conn->query($get_price_query);
        $harga_satuan = $result_price->fetch_assoc()['harga'];

    
        $harga_total = $harga_satuan * $qty;

        
        $sql = "INSERT INTO transaksi_detail (barang_id, transaksi_id, qty, harga) 
                VALUES ('$barang_id', '$transaksi_id', '$qty', '$harga_total');";
        $sql .= "UPDATE transaksi SET total = total + $harga_total;";
        
        if ($conn->multi_query($sql) === TRUE) {
            header('Location: index.php'); 
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}


$sql_barang = "SELECT id, nama_barang FROM barang";
$result_barang = $conn->query($sql_barang);
// $barang = $result_barang->fetch_all(MYSQLI_ASSOC);


$sql_transaksi = "SELECT id FROM transaksi";
$result_transaksi = $conn->query($sql_transaksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Detail Transaksi</title>
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
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-group input:focus, .form-group select:focus {
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
        <h2>Tambah Detail Transaksi</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Pilih Barang:</label>
                <select name="barang_id" required>
                    <option value="">Pilih Barang</option>
                    <?php
                    if ($result_barang->num_rows > 0) {
                        while ($row = $result_barang->fetch_assoc()) {
                            echo "<option value='{$row['id']}' " . ($barang_id == $row['id'] ? 'selected' : '') . ">{$row['nama_barang']}</option>";
                        }
                    }
                    ?>
                </select>
                <?php if (isset($errors['barang_id'])): ?>
                    <div class="error"><?php echo $errors['barang_id']; ?></div>
                <?php endif; ?>
            </div>

            
            <div class="form-group">
                <label>ID Transaksi:</label>
                <select name="transaksi_id" required>
                    <option value="">Pilih ID Transaksi</option>
                    <?php
                    if ($result_transaksi->num_rows > 0) {
                        while ($row = $result_transaksi->fetch_assoc()) {
                            echo "<option value='{$row['id']}' " . ($transaksi_id == $row['id'] ? 'selected' : '') . ">{$row['id']}</option>";
                        }
                    }
                    ?>
                </select>
                <?php if (isset($errors['transaksi_id'])): ?>
                    <div class="error"><?php echo $errors['transaksi_id']; ?></div>
                <?php endif; ?>
            </div>

        
            <div class="form-group">
                <label>Quantity:</label>
                <input type="number" name="qty" min="1" value="<?php echo htmlspecialchars($qty); ?>" required>
                <?php if (isset($errors['qty'])): ?>
                    <div class="error"><?php echo $errors['qty']; ?></div>
                <?php endif; ?>
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <button type="submit" class="btn btn-success">Tambah Detail Transaksi</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
