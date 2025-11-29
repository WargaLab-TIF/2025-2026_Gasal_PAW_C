<?php
require_once "koneksi.php";

$error = "";
$sukses = "";
$result_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $waktu_transaksi = $_POST['waktu_transaksi'];
    $keterangan = trim($_POST['keterangan']);
    $pelanggan_id = $_POST['pelanggan_id'];
    $today = date('Y-m-d');

    $cek_kolom = mysqli_query($conn, "SHOW COLUMNS FROM transaksi LIKE 'user_id'");
    $ada_user_id = mysqli_num_rows($cek_kolom) > 0;

    if ($waktu_transaksi < $today) {
        $error = "Tanggal transaksi tidak boleh sebelum hari ini!";
    } elseif (strlen($keterangan) < 3) {
        $error = "Keterangan minimal 3 karakter!";
    } elseif (empty($pelanggan_id)) {
        $error = "Pelanggan harus dipilih!";
    } else {
        if ($ada_user_id) {
            $sql = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id, user_id) 
                    VALUES ('$waktu_transaksi', '$keterangan', 0, '$pelanggan_id', 1)";
        } else {
            $sql = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id) 
                    VALUES ('$waktu_transaksi', '$keterangan', 0, '$pelanggan_id')";
        }

        if (mysqli_query($conn, $sql)) {
            $sukses = "Data transaksi berhasil ditambahkan!";
        } else {
            $error = "Gagal menambahkan data: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Transaksi</h2>

        <?php if ($error): ?>
            <div class="alert error"><?= $error ?></div>
        <?php elseif ($sukses): ?>
            <div class="alert success"><?= $sukses ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="waktu_transaksi">Waktu Transaksi:</label>
            <input type="date" name="waktu_transaksi" required>

            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" rows="3" required></textarea>

            <label for="total">Total:</label>
            <input type="number" name="total" value="0" readonly>

            <label for="pelanggan_id">Pilih Pelanggan:</label>
            <select name="pelanggan_id" required>
                <option value="">-- Pilih Pelanggan --</option>
                <?php while ($row = mysqli_fetch_assoc($result_pelanggan)): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nama']) ?></option>
                <?php endwhile; ?>
            </select>

            <button type="submit">Simpan Transaksi</button>
        </form>
    </div>
</body>
</html>
