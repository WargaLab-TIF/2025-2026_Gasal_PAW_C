<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaksi_id = $_POST['transaksi_id'];
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];

    // Ambil harga satuan barang dari tabel barang
    $barang_query = "SELECT harga FROM barang WHERE id = '$barang_id'";
    $barang_result = mysqli_query($conn, $barang_query);

    if ($barang_result && mysqli_num_rows($barang_result) > 0) {
        $barang_data = mysqli_fetch_assoc($barang_result);
        $harga_satuan = $barang_data['harga'];
        $harga_total = $harga_satuan * $qty;

        // Simpan detail transaksi
        $detail_query = "INSERT INTO transaksi_detail (transaksi_id, barang_id, qty, harga)
                         VALUES ('$transaksi_id', '$barang_id', '$qty', '$harga_total')";

        if (mysqli_query($conn, $detail_query)) {
            // Update total transaksi pada tabel transaksi
            $update_query = "UPDATE transaksi SET total = (
                                SELECT SUM(harga) FROM transaksi_detail WHERE transaksi_id = '$transaksi_id'
                             ) WHERE id = '$transaksi_id'";

            if (mysqli_query($conn, $update_query)) {
                echo "<script>alert('Detail transaksi berhasil disimpan dan total transaksi diperbarui.'); window.location.href='master_detail.php';</script>";
                exit;
            } else {
                echo "Gagal memperbarui total transaksi: " . mysqli_error($conn);
            }
        } else {
            echo "Gagal menyimpan detail transaksi: " . mysqli_error($conn);
        }
    } else {
        echo "Barang tidak ditemukan atau ada masalah pada query barang.";
    }
}

// Ambil data transaksi untuk dropdown
$transaksi_query = "SELECT id FROM transaksi";
$transaksi_result = mysqli_query($conn, $transaksi_query);

// Ambil data barang untuk dropdown
$barang_query = "SELECT id, nama_barang FROM barang";
$barang_result = mysqli_query($conn, $barang_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Detail Transaksi</title>
</head>
<body>
    <form action="" method="post">
        <h1>Tambah Detail Transaksi</h1>

        <label for="barang_id">Pilih Barang:</label>
        <select name="barang_id" required>
            <?php while ($barang = mysqli_fetch_assoc($barang_result)) : ?>
                <option value="<?= $barang['id']; ?>"><?= $barang['nama_barang']; ?></option>
            <?php endwhile; ?>
        </select>

        <label for="transaksi_id">ID Transaksi:</label>
        <select name="transaksi_id" required>
            <?php while ($transaksi = mysqli_fetch_assoc($transaksi_result)) : ?>
                <option value="<?= $transaksi['id']; ?>"><?= $transaksi['id']; ?></option>
            <?php endwhile; ?>
        </select>

        <label for="qty">Quantity:</label>
        <input type="number" name="qty" min="1" required>

        <button type="submit">Tambah Detail Transaksi</button>
    </form>
</body>
</html>
