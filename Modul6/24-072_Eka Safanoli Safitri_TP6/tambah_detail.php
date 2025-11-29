<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $transaksi_id = $_POST['transaksi_id'];
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];

    $cek = $koneksi->query("SELECT * FROM transaksi_detail WHERE transaksi_id='$transaksi_id' AND barang_id='$barang_id'");
    if ($cek->num_rows > 0) {
        echo "<script>alert('Barang ini sudah ditambahkan!');history.back();</script>";
        exit;
    }

    $barang = $koneksi->query("SELECT harga FROM barang WHERE id='$barang_id'")->fetch_assoc();
    $harga_total = $barang['harga'] * $qty;

    $sql = "INSERT INTO transaksi_detail (transaksi_id, barang_id, qty, harga)
            VALUES ('$transaksi_id', '$barang_id', '$qty', '$harga_total')";
    $koneksi->query($sql);

    $total = $koneksi->query("SELECT SUM(harga) as total FROM transaksi_detail WHERE transaksi_id='$transaksi_id'")
                     ->fetch_assoc()['total'];
    $koneksi->query("UPDATE transaksi SET total='$total' WHERE id='$transaksi_id'");
}
?>

<form method="post">
    <label>Transaksi</label><br>
    <select name="transaksi_id" required>
        <option value="">Pilih</option>
        <?php
        $data = $koneksi->query("SELECT * FROM transaksi");
        while ($d = $data->fetch_assoc()) {
            echo "<option value='{$d['id']}'>Transaksi #{$d['id']}</option>";
        }
        ?>
    </select><br><br>

    <label>Barang</label><br>
    <select name="barang_id" required>
        <option value="">Pilih</option>
        <?php
        $barang = $koneksi->query("SELECT * FROM barang");
        while ($b = $barang->fetch_assoc()) {
            echo "<option value='{$b['id']}'>{$b['nama']} (Rp{$b['harga']})</option>";
        }
        ?>
    </select><br><br>

    <label>Qty</label><br>
    <input type="number" name="qty" required><br><br>

    <button type="submit">Tambah Detail</button>
</form>