<!DOCTYPE html>
<html>
<head>
    <title>Program Kasir Sederhana</title>
</head>
<body align="center">
<h2>=== Program Kasir Sederhana ===</h2>

<?php
session_start();

if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
}
?>

<form method="post">
    <label>Pilih Menu:</label><br>
    <select name="menu">
        <option value="" readonly>-- Pilih Menu Anda--</option>
        <option value="1">Susu (Rp. 10,000)</option>
        <option value="2">Air Mineral (Rp. 5,000)</option>
        <option value="3">Soda (Rp. 10,0000)</option>
    </select><br><br>

    <label>Jumlah:</label><br>
    <input type="number" name="jumlah" min="1"><br><br>

    <input type="submit" name="tambah" value="Tambah Pesanan">
    <input type="submit" name="selesai" value="Total">
</form>

<?php

if (isset($_POST['tambah'])) {
    $menu = $_POST['menu'];
    $jumlah = $_POST['jumlah'];

    if ($menu == 1) {
        $nama = "susu";
        $harga = 10000;
    } elseif ($menu == 2) {
        $nama = "air mineral";
        $harga = 5000;
    } elseif ($menu == 3) {
        $nama = "soda";
        $harga = 10000;
    } else {
        $nama = "Menu tidak tersedia";
        $harga = 0;
    }

    
    if ($harga > 0 && $jumlah > 0) {
        $subtotal = $harga * $jumlah;
        $_SESSION['total'] += $subtotal;

        echo "<p>Pesanan Anda: $nama ($jumlah x Rp$harga) = Rp$subtotal</p>";
        echo "<p><b>Total sementara: Rp".$_SESSION['total']."</b></p>";
        echo "<p>Silakan tambah pesanan anda lagi atau tekan 'Total' untuk menghitung total belanja Anda.</p>";
    } else {
        echo "<p style='color:red;'>Isi menu dan jumlah dengan benar!</p>";
    }
}

if (isset($_POST['selesai'])) {
    echo "<h3>Total yang harus Anda dibayar: Rp".$_SESSION['total']."</h3>";
    session_destroy();
}
?>
</body>
</html>