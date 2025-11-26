<?php
include 'koneksi.php';

// Ambil data pelanggan untuk dropdown
$pelanggan_query = "SELECT id, nama FROM pelanggan";
$pelanggan_result = mysqli_query($conn, $pelanggan_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Transaksi</title>
</head>
<body>
    <form action="simpan_transaksi.php" method="post">
        <h1>Tambah Data Transaksi</h1>

        <label for="waktu_transaksi">Waktu Transaksi:</label>
        <input type="date" name="waktu_transaksi" min="<?= date('Y-m-d'); ?>" required>

        <label for="keterangan">Keterangan:</label>
        <textarea name="keterangan" placeholder="Masukkan keterangan transaksi" minlength="3" required></textarea>

        <label for="total">Total:</label>
        <input type="number" name="total" value="0" readonly>

        <label for="pelanggan_id">Pelanggan:</label>
        <select name="pelanggan_id" required>
            <option value="" disabled selected>Pilih Pelanggan</option>
            <?php while ($pelanggan = mysqli_fetch_assoc($pelanggan_result)) : ?>
                <option value="<?= $pelanggan['id']; ?>"><?= $pelanggan['nama']; ?></option>
            <?php endwhile; ?>
        </select>

        <button type="submit">Tambah Transaksi</button>
    </form>
</body>
</html>
