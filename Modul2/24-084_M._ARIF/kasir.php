<?php
// Daftar menu
$menu = [
    "Nasi Goreng" => 15000,
    "Mie Ayam" => 12000,
    "Sate Ayam" => 20000,
    "Bakso" => 13000,
    "Es Teh" => 5000,
    "Es Jeruk" => 7000,
    "Kopi" => 8000
];

// Jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pilihan = $_POST['menu'];
    $jumlah = $_POST['jumlah'];

    if (isset($menu[$pilihan])) {
        $harga_satuan = $menu[$pilihan];
        $total = $harga_satuan * $jumlah;

        echo "<h2>Struk Pembelian</h2>";
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><td>Menu</td><td>$pilihan</td></tr>";
        echo "<tr><td>Harga Satuan</td><td>Rp " . number_format($harga_satuan, 0, ',', '.') . "</td></tr>";
        echo "<tr><td>Jumlah</td><td>$jumlah</td></tr>";
        echo "<tr><td>Total Harga</td><td><b>Rp " . number_format($total, 0, ',', '.') . "</b></td></tr>";
        echo "</table><br>";

        echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Beli Lagi</a>";
    } else {
        echo "Menu tidak ditemukan!";
    }
} else {
?>
    <h2>Program Kasir Sederhana</h2>
    <form method="post" action="">
        <label>Pilih Menu:</label><br>
        <select name="menu" required>
            <option value="">-- Pilih Menu --</option>
            <?php
            foreach ($menu as $nama => $harga) {
                echo "<option value='$nama'>$nama - Rp " . number_format($harga, 0, ',', '.') . "</option>";
            }
            ?>
        </select><br><br>

        <label>Jumlah Beli:</label><br>
        <input type="number" name="jumlah" min="1" required><br><br>

        <input type="submit" value="Hitung Total">
    </form>
<?php
}
?>