<?php
//mulai sesi untuk 'mengingat' isi keranjang
session_start();

// Buat keranjang kosong jika belum ada pesanan
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

// menu makanan
$menu = [
    'NG' => ['nama' => 'Nasi Goreng', 'harga' => 15000],
    'MA' => ['nama' => 'Mie Ayam', 'harga' => 12000],
    'BK' => ['nama' => 'Bakso', 'harga' => 10000],
    'ET' => ['nama' => 'Es Teh', 'harga' => 3000],
    'EJ' => ['nama' => 'Es Jeruk', 'harga' => 5000]
];

// logika tombol tambah dan reset keranjang
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Jika tombol 'tambah' ditekan
    if (isset($_POST['tambah'])) {
        $kode_menu = $_POST['menu'];
        $jumlah = (int)$_POST['jumlah'];

        // Tambahkan item yang dipilih ke dalam keranjang
        if (isset($menu[$kode_menu]) && $jumlah > 0) {
            $_SESSION['keranjang'][] = [
                'kode' => $kode_menu,
                'jumlah' => $jumlah
            ];
        }
    }

    // Jika tombol 'reset' ditekan
    if (isset($_POST['reset'])) {
        $_SESSION['keranjang'] = [];
    }

    // refresh browser
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kasir sederhana</title>
    <style>
        body { font-family: sans-serif; display: flex; gap: 2em; padding: 1em; }
        div { padding: 1em; border: 1px solid #ccc; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <!-- daftar menu -->
    <div>
        <h2>Menu Makanan</h2>
        <table border="1">
            <tr><th>Menu</th><th>Harga</th></tr>
            <tr>
                <td>Nasi Goreng</td>
                <td>Rp 15.000</td>
            </tr>
            <tr>
                <td>Mie Ayam</td>
                <td>Rp 12.000</td>
            </tr>
            <tr>
                <td>Bakso</td>
                <td>Rp 10.000</td>
            </tr>
            <tr>
                <td>Es Teh</td>
                <td>Rp 3.000</td>
            </tr>
            <tr>
                <td>Es Jeruk</td>
                <td>Rp 5.000</td>
            </tr>
        </table>

        <!-- pesan -->
        <hr>
        <form method="post">
            <h3>Pesan:</h3>
            <select name="menu">
                <?php foreach ($menu as $kode => $item): ?>
                    <option value="<?= $kode ?>"><?= $item['nama'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="jumlah" value="1" min="1" style="width: 50px;">
            <br><br>
            <button type="submit" name="tambah">Tambah Pesanan</button>
            <button type="submit" name="reset">Reset Keranjang</button>
        </form>
    </div>

    <!-- keranjang -->
    <div>
        <h2>Keranjang Belanja</h2>
        <?php if (empty($_SESSION['keranjang'])): ?>
            <p>Keranjang masih kosong.</p>
        <?php else: ?>
            <table border="1">
                <tr><th>Item</th><th>Jumlah</th><th>Harga</th><th>Subtotal</th></tr>
                <?php $total_harga = 0; ?>
                <?php foreach ($_SESSION['keranjang'] as $pesanan): ?>
                    <?php
                        $kode = $pesanan['kode'];
                        $jumlah = $pesanan['jumlah'];
                        $item_menu = $menu[$kode];
                        $subtotal = $item_menu['harga'] * $jumlah;
                        $total_harga += $subtotal;
                    ?>
                    <tr>
                        <td><?= $item_menu['nama'] ?></td>
                        <td><?= $jumlah ?></td>
                        <td>Rp <?= number_format($item_menu['harga']) ?></td>
                        <td>Rp <?= number_format($subtotal) ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr style="font-weight: bold;">
                    <td colspan="3">TOTAL BAYAR</td>
                    <td>Rp <?= number_format($total_harga) ?></td>
                </tr>
            </table>
        <?php endif; ?>
    </div>

</body>
</html>