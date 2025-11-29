<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $waktu = $_POST['waktu'];
    $keterangan = trim($_POST['keterangan']);
    $pelanggan_id = $_POST['pelanggan_id'];

    if ($waktu < date('Y-m-d')) {
        echo "<script>alert('Tanggal tidak boleh sebelum hari ini');history.back();</script>";
        exit;
    }
    if (strlen($keterangan) < 3) {
        echo "<script>alert('Keterangan minimal 3 karakter');history.back();</script>";
        exit;
    }

    $sql = "INSERT INTO transaksi (waktu, keterangan, pelanggan_id, total)
            VALUES ('$waktu', '$keterangan', '$pelanggan_id', 0)";
    if ($koneksi->query($sql)) {
        header("Location: tambah_detail.php");
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>

<form method="post">
    <label>Tanggal Transaksi</label><br>
    <input type="date" name="waktu" required><br><br>

    <label>Keterangan</label><br>
    <textarea name="keterangan" required></textarea><br><br>

    <label>Pelanggan</label><br>
    <select name="pelanggan_id" required>
        <option value="">Pilih</option>
        <?php
        $data = $koneksi->query("SELECT * FROM pelanggan");
        while ($d = $data->fetch_assoc()) {
            echo "<option value='{$d['id']}'>{$d['nama']}</option>";
        }
        ?>
    </select><br><br>

    <button type="submit">Simpan Transaksi</button>
</form>