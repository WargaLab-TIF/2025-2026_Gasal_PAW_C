<?php
require_once "koneksi.php";

$error = "";
$sukses = "";
$result_transaksi = mysqli_query($conn, "SELECT id FROM transaksi");
$result_barang = mysqli_query($conn, "SELECT * FROM barang");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaksi_id = $_POST['transaksi_id'];
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];

    if (empty($transaksi_id) || empty($barang_id) || empty($qty)) {
        $error = "Semua field wajib diisi!";
    } else {
        $cek = mysqli_query($conn, "SELECT * FROM transaksi_detail 
                                    WHERE transaksi_id='$transaksi_id' 
                                    AND barang_id='$barang_id'");
        if (mysqli_num_rows($cek) > 0) {
            $error = "Barang ini sudah ditambahkan pada transaksi tersebut!";
        } else {
            $barang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga FROM barang WHERE id='$barang_id'"));
            $harga_total = $barang['harga'] * $qty;

            $insert = "INSERT INTO transaksi_detail (transaksi_id, barang_id, qty, harga)
                       VALUES ('$transaksi_id', '$barang_id', '$qty', '$harga_total')";
            if (mysqli_query($conn, $insert)) {
                mysqli_query($conn, "UPDATE transaksi 
                    SET total = (SELECT SUM(harga) FROM transaksi_detail WHERE transaksi_id='$transaksi_id') 
                    WHERE id='$transaksi_id'");
                $sukses = "Detail transaksi berhasil ditambahkan!";
            } else {
                $error = "Gagal menambahkan detail: " . mysqli_error($conn);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Detail Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Detail Transaksi</h2>

        <?php if ($error): ?>
            <div class="alert error"><?= $error ?></div>
        <?php elseif ($sukses): ?>
            <div class="alert success"><?= $sukses ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="transaksi_id">Pilih ID Transaksi:</label>
            <select name="transaksi_id" required>
                <option value="">-- Pilih Transaksi --</option>
                <?php while ($row = mysqli_fetch_assoc($result_transaksi)): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['id'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="barang_id">Pilih Barang:</label>
            <select name="barang_id" required>
                <option value="">-- Pilih Barang --</option>
                <?php
                mysqli_data_seek($result_barang, 0);
                while ($b = mysqli_fetch_assoc($result_barang)): ?>
                    <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?> - Rp<?= number_format($b['harga']) ?></option>
                <?php endwhile; ?>
            </select>

            <label for="qty">Jumlah (Qty):</label>
            <input type="number" name="qty" min="1" required>

            <button type="submit">Simpan Detail</button>
        </form>
    </div>
</body>
</html>
