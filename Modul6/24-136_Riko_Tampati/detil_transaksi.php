<?php
include "koneksi.php";

$transaksi_id = $_GET['transaksi_id'];

$queryBarang = mysqli_query($conn, "SELECT * FROM barang");

$queryTerpakai = mysqli_query($conn, "SELECT barang_id FROM detil_transaksi WHERE transaksi_id='$transaksi_id'");

$barangTerpakai = [];
while ($row = mysqli_fetch_assoc($queryTerpakai)) {
    $barangTerpakai[] = $row['barang_id'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Detil Transaksi</title>
</head>
<body>
    <h2>Input Detil Transaksi #<?= $transaksi_id ?></h2>

    <form action="simpan_detil.php" method="post">
        <input type="hidden" name="transaksi_id" value="<?= $transaksi_id ?>">

        <label>Barang:</label>
        <select name="barang_id" required>
            <option value="">-- Pilih Barang --</option>
            <?php while ($b = mysqli_fetch_assoc($queryBarang)) : ?>
                <?php if (!in_array($b['id'], $barangTerpakai)) : ?>
                    <option value="<?= $b['id'] ?>">
                        <?= $b['nama_barang'] ?> (Rp<?= number_format($b['harga']) ?>)
                    </option>
                <?php endif; ?>
            <?php endwhile; ?>
        </select>

        <br><br>

        <label>Jumlah:</label>
        <input type="number" name="jumlah" min="1" required>

        <button type="submit">Simpan</button>
    </form>

    <hr>

    <h3>Daftar Barang di Transaksi Ini</h3>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>

        <?php
        $qDetil = mysqli_query($conn, "
            SELECT d.*, b.nama_barang, b.harga 
            FROM detil_transaksi d 
            JOIN barang b ON d.barang_id = b.id 
            WHERE d.transaksi_id = '$transaksi_id'
        ");

        $no = 1;
        $total = 0;

        while ($d = mysqli_fetch_assoc($qDetil)) :
            $total += $d['subtotal'];
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d['nama_barang'] ?></td>
                <td><?= number_format($d['harga']) ?></td>
                <td><?= $d['jumlah'] ?></td>
                <td><?= number_format($d['subtotal']) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <p><strong>Total: Rp<?= number_format($total) ?></strong></p>

    <a href="transaksi.php">Kembali ke Transaksi</a>
</body>
</html>
