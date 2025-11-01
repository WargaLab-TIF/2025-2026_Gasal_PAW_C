<!DOCTYPE html>
<html>
<head>
    <title>Sistem Kasir Sederhana</title>
</head>
<body>
    <h2>Sistem Kasir Sederhana</h2>

    <?php
    // Daftar menu dengan harga
    $menu = array(
        "Nasi Goreng" => 15000,
        "Mie Ayam" => 12000,
        "Es Teh" => 5000,
        "Es Jeruk" => 7000
    );

    // Inisialisasi total
    $total = 0;

    // Cek apakah form dikirim
    if (isset($_POST['submit'])) {
        $pilihan = $_POST['menu'];
        $jumlah   = $_POST['jumlah'];
        
        // Hitung subtotal
        $subtotal = $menu[$pilihan] * $jumlah;
        $total = $_POST['total_sebelumnya'] + $subtotal;
        
        echo "<p>Anda memesan $jumlah x $pilihan = Rp $subtotal</p>";
        echo "<p>Total sementara: Rp $total</p>";

        // Tampilkan form lagi untuk menambah item
        echo '
        <form method="post">
            <label>Pilih menu lagi:</label>
            <select name="menu" required>
        ';
        foreach ($menu as $item => $harga) {
            echo "<option value='$item'>$item - Rp $harga</option>";
        }
        echo '
            </select>
            <input type="number" name="jumlah" min="1" value="1" required>
            <input type="hidden" name="total_sebelumnya" value="'.$total.'">
            <input type="submit" name="submit" value="Tambah">
        </form>
        ';

        // Tombol selesai untuk menyelesaikan pembayaran
        echo '
        <form method="post" action="">
            <input type="hidden" name="total_akhir" value="'.$total.'">
            <input type="submit" name="selesai" value="Selesai">
        </form>
        ';
    } elseif (isset($_POST['selesai'])) {
        // Menampilkan total akhir
        $total = $_POST['total_akhir'];
        echo "<h3>Total yang harus dibayar: Rp $total</h3>";
        echo "<p>Terima kasih telah berbelanja!</p>";
    } else {
        // Form awal
        echo '
        <form method="post">
            <label>Pilih menu:</label>
            <select name="menu" required>
        ';
        foreach ($menu as $item => $harga) {
            echo "<option value='$item'>$item - Rp $harga</option>";
        }
        echo '
            </select>
            <input type="number" name="jumlah" min="1" value="1" required>
            <input type="hidden" name="total_sebelumnya" value="0">
            <input type="submit" name="submit" value="Tambah">
        </form>
        ';
    }
    ?>
</body>
</html>
