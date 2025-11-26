<?php
// Database connection
include('../koneksi.php'); 
if (!isset($_SESSION['logged_in'])) {
    header('Location: ../login.php');
    exit;
}

// Ambil data barang dan transaksi
$query_barang = "SELECT id, nama_barang, harga FROM barang ORDER BY id";
$barang_result = mysqli_query($koneksi, $query_barang);

$query_transaksi = "SELECT id FROM transaksi ORDER BY id";
$transaksi_result = mysqli_query($koneksi, $query_transaksi);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $transaksi_id = $_POST['transaksi_id'];
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];

    // Cek apakah barang sudah ada di detail transaksi
    $check_query = "SELECT * FROM transaksi_detail WHERE transaksi_id = '$transaksi_id' AND barang_id = '$barang_id'";
    $check_result = mysqli_query($koneksi, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "Barang sudah ada di transaksi ini.";
    } else {
        // Ambil harga satuan barang
        $harga_query = "SELECT harga FROM barang WHERE id = '$barang_id'";
        $harga_result = mysqli_fetch_assoc(mysqli_query($koneksi, $harga_query));
        $harga_satuan = $harga_result['harga'];
        $harga = $harga_satuan * $qty;
        
        // Insert detail transaksi
        $insert_query = "INSERT INTO transaksi_detail (transaksi_id, barang_id, qty, harga) VALUES ('$transaksi_id', '$barang_id', '$qty', '$harga')";
        mysqli_query($koneksi, $insert_query);

        // Update total transaksi
        $update_total_query = "UPDATE transaksi SET total = (SELECT SUM(harga) FROM transaksi_detail WHERE transaksi_id = '$transaksi_id') WHERE id = '$transaksi_id'";
        mysqli_query($koneksi, $update_total_query);

        header('Location: ../transaksi.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Detail Transaksi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Tambah Detail Transaksi</h1>
    <form method="POST">
        <label for="transaksi_id">ID Transaksi:</label>
        <select name="transaksi_id" required>
            <option value="" disabled selected>Pilih Id Transaksi</option>
            <?php while ($transaksi = mysqli_fetch_assoc($transaksi_result)) { ?>
                <option value="<?= $transaksi['id'] ?>"><?= $transaksi['id'] ?></option>
            <?php } ?>
        </select><br>
        
        <label for="barang_id">Barang:</label>
        <select name="barang_id" required>
            <option value="" disabled selected>Pilih barang</option>
            <?php while ($barang = mysqli_fetch_assoc($barang_result)) { ?>
                <option value="<?= $barang['id'] ?>"><?= $barang['nama_barang'] ?></option>
            <?php } ?>
        </select><br>
        
        <label for="qty">Jumlah:</label>
        <input type="number" name="qty" required placeholder="Masukkan Jumlah" min="1"><br>
        
        <button type="submit">Tambah Detail</button>
    </form>
</body>
</html>