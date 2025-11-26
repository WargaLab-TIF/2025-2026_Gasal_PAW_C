<?php
include('../koneksi.php'); 
if (!isset($_SESSION['logged_in'])) {
    header('Location: ../login.php');
    exit;
}
// Ambil data pelanggan untuk dropdown
$query_pelanggan = "SELECT id, nama FROM pelanggan";
$pelanggan_result = mysqli_query($koneksi, $query_pelanggan);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $pelanggan_id = $_POST['pelanggan_id'];
    
    // Validasi tanggal
    if (strtotime($tanggal) < strtotime(date('Y-m-d'))) {
        echo "Tanggal tidak boleh sebelum hari ini.";
    } elseif (strlen($keterangan) < 3) {
        echo "Keterangan minimal 3 karakter.";
    } else {
        // Insert transaksi dengan total 0 sebagai default
        $query = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id) VALUES ('$tanggal', '$keterangan', 0, '$pelanggan_id')";
        mysqli_query($koneksi, $query);

        header('Location: tambah_detail_transaksi.php');
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form method="POST">
    <label for="tanggal">Tanggal:</label>
    <input type="date" name="tanggal" required><br>
    
    <label for="keterangan">Keterangan:</label>
    <textarea name="keterangan" minlength="3" required></textarea><br>

    <label for="total">Total:</label>
    <input type="text" name="total" value="0"><br>
    
    <label for="pelanggan_id">Pelanggan:</label>
    <select name="pelanggan_id" required>
        <?php while ($pelanggan = mysqli_fetch_assoc($pelanggan_result)) { ?>
            <option value="<?= $pelanggan['id'] ?>"><?= $pelanggan['nama'] ?></option>
        <?php } ?>
    </select><br>
    <button type="submit">Simpan Transaksi</button>
</form>
</body>
</html>
