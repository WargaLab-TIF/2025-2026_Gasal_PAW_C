<?php
include 'koneksi.php';

if (isset($_GET['transaksi_id'])) {
    $id_transaksi_aktif = (int)$_GET['transaksi_id'];
} else {
    die("ERROR: ID Transaksi tidak ada di URL. <br>
         Coba buka file ini dengan menambahkan ?transaksi_id=1 di akhir URL.");
}

$sql = "
    SELECT
        b.id,
        b.nama_barang
    FROM
        barang b
    LEFT JOIN
        transaksi_detail td ON b.id = td.barang_id
                           AND td.transaksi_id = ? 
    WHERE
        td.barang_id IS NULL
    ORDER BY
        b.nama_barang ASC
";

$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id_transaksi_aktif);
$stmt->execute();
$result_barang = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Detail Transaksi</title>
</head>
<body>
    <h2>Tambah Barang untuk Transaksi #<?php echo $id_transaksi_aktif; ?></h2>
    
    <form action="simpan_detail.php" method="POST">
        <input type="hidden" name="transaksi_id" value="<?php echo $id_transaksi_aktif; ?>">
        
        <label for="barang_id">Pilih Barang:</label>
        <select name="barang_id" id="barang_id" required>
            <option value="">-- Pilih Barang Tersedia --</option>
            <?php
            if ($result_barang->num_rows > 0) {
                while ($barang = $result_barang->fetch_assoc()) {
                    echo "<option value=\"{$barang['id']}\">" . htmlspecialchars($barang['nama_barang']) . "</option>";
                }
            } else {
                echo '<option value="" disabled>Semua barang sudah ditambahkan</option>';
            }
            ?>
        </select>
        
        <label for="jumlah">Jumlah (Qty):</label>
        <input type="number" name="jumlah" id="jumlah" value="1" min="1" required>
        
        <button type="submit">Tambah Barang</button>
    </form>
</body>
</html>
<?php
$stmt->close();
$koneksi->close();
?>