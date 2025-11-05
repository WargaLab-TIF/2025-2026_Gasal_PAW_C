<!DOCTYPE html>
<html>
<head>
    <title>Program Kasir Sederhana</title>
</head>
<body>
    <h2>Program Kasir Sederhana</h2>
    <form method="get">
        <label>Pilih Menu:</label>
        <select name="menu" required>
            <option value="">-- Pilih Menu --</option>
            <option value="latte">Latte (Rp 15.000)</option>
            <option value="Ice Americano">Ice Americano (Rp 10.000)</option>
            <option value="Strawberry Pancakes">Strawberry Pancakes (Rp 18.000)</option>
        </select>
        <br><br>
        <label>Jumlah:</label>
        <input type="number" name="jumlah" required>
        <input type="submit" value="Lihat Total">
    </form>

    <?php
    if (isset($_GET['menu']) && isset($_GET['jumlah'])) {
        $menu = $_GET['menu'];
        $jumlah = $_GET['jumlah'];

        if ($menu == "latte") {
            $harga = 15000;
            $nama_menu = "Latte";
        } elseif ($menu == "Ice Americano") {
            $harga = 10000;
            $nama_menu = "Ice Americano";
        } elseif ($menu == "Strawberry Pancakes") {
            $harga = 18000;
            $nama_menu = "Strawberry Pancakes";
        } else {
            $harga = 0;
            $nama_menu = "Menu tidak valid";
        }

        $total = $harga * $jumlah;

        echo "<h3>Struk Pembelian:</h3>";
        echo "Menu: $nama_menu <br>";
        echo "Jumlah: $jumlah <br>";
        echo "Total Harga: <b>Rp " . number_format($total, 0, ',', '.') . "</b>";
    }
    ?>
</body>
</html>
