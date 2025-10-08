<!DOCTYPE html>
<html>
<head>
    <title>Program Kasir Sederhana</title>
</head>
<body>
<h2>=== Program Kasir Sederhana ===</h2>

<?php
// session untuk simpan total selama perulangan
session_start();

if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
}
?>

<form method="post">
    <label>Pilih Menu:</label><br>
    <select name="menu">
        <option value="">-- Pilih Menu --</option>
        <option value="1">geprek ebu (Rp10000)</option>
        <option value="2">geprek mawar (Rp10000)</option>
        <option value="3">geprek kantin (Rp10000)</option>
    </select><br><br>

    <label>Jumlah:</label>
    <input type="number" name="jumlah" min="1"><br><br>

    <input type="submit" name="tambah" value="Tambah Pesanan">
    <input type="submit" name="selesai" value="Total">
</form>

<?php

if (isset($_POST['tambah'])) {
    $menu = $_POST['menu'];
    $jumlah = $_POST['jumlah'];

    if ($menu == 1) {
        $nama = "geprek ebu";
        $harga = 10000;
    } elseif ($menu == 2) {
        $nama = "geprek mawar";
        $harga = 10000;
    } elseif ($menu == 3) {
        $nama = "geprek kantin";
        $harga = 10000;
    } else {
        $nama = "Menu tidak tersedia";
        $harga = 0;
    }

    
    if ($harga > 0 && $jumlah > 0) {
        $subtotal = $harga * $jumlah;
        $_SESSION['total'] += $subtotal;

        echo "<p>Pesanan: $nama ($jumlah x Rp$harga) = Rp$subtotal</p>";
        echo "<p><b>Total sementara: Rp".$_SESSION['total']."</b></p>";
        echo "<p>Silakan tambah pesanan lagi atau tekan 'Total' untuk menghitung keseluruhan.</p>";
    } else {
        echo "<p style='color:red;'>Isi menu dan jumlah dengan benar!</p>";
    }
}

if (isset($_POST['selesai'])) {
    echo "<h3>Total yang harus dibayar: Rp".$_SESSION['total']."</h3>";
    echo "<p>Terima kasih sudah berbelanja!</p>";
    session_destroy();
}
?>
</body>
</html>
