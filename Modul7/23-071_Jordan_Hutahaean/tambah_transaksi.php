<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $pelanggan = $_POST['pelanggan'];
    $keterangan = $_POST['keterangan'];
    $total = $_POST['total'];

    mysqli_query($koneksi, 
        "INSERT INTO transaksi (waktu_transaksi, pelanggan_id, keterangan, total)
         VALUES ('$tanggal', '$pelanggan', '$keterangan', '$total')"
    );

    header("Location: view.php");
    exit;
}

$pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Tambah Transaksi</h2>

<form method="POST">
    <label>Tanggal</label><br>
    <input type="date" name="tanggal" required><br><br>

    <label>Pelanggan</label><br>
    <select name="pelanggan" required>
        <option value="">--Pilih--</option>
        <?php while ($p = mysqli_fetch_assoc($pelanggan)) { ?>
            <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
        <?php } ?>
    </select><br><br>

    <label>Keterangan</label><br>
    <input type="text" name="keterangan" required><br><br>

    <label>Total</label><br>
    <input type="number" name="total" required><br><br>

    <button type="submit" name="submit">Simpan</button>
</form>

<a href="view.php">Kembali</a>

</body>
</html>
