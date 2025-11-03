<!DOCTYPE html>
<html>
<head>
    <title>Sistem Kasir Sederhana</title>
</head>
<body>

<h2 align="center">Sistem Kasir Sederhana</h2>

<form method="post" action="">
    <table align="center" cellpadding="5">
        <tr>
            <td>Pilih Menu</td>
            <td>
                <select name="menu">
                    <option value="Nasi Goreng">Nasi Goreng - Rp15000</option>
                    <option value="Mie Ayam">Mie Ayam - Rp12000</option>
                    <option value="Es Teh">Es Teh - Rp5000</option>
                    <option value="Es Jeruk">Es Jeruk - Rp7000</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Jumlah Porsi</td>
            <td><input type="number" name="jumlah" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="tambah" value="Tambah Pesanan"></td>
        </tr>
    </table>
</form>

<?php
session_start();

// Inisialisasi total pesanan
if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
}

// Proses input pesanan
if (isset($_POST['tambah'])) {
    $menu = $_POST['menu'];
    $jumlah = $_POST['jumlah'];
    $harga = 0;

    if ($menu == "Nasi Goreng") $harga = 15000;
    elseif ($menu == "Mie Ayam") $harga = 12000;
    elseif ($menu == "Es Teh") $harga = 5000;
    elseif ($menu == "Es Jeruk") $harga = 7000;

    $subtotal = $harga * $jumlah;
    $_SESSION['total'] += $subtotal;

    echo "<p align='center'>Anda membeli $jumlah $menu dengan total Rp $subtotal</p>";
    echo "<p align='center'>Total sementara: Rp ".$_SESSION['total']."</p>";
    echo "<p align='center'><a href=''>Tambah Lagi</a> | <a href='?selesai=true'>Selesai</a></p>";
}

// Jika selesai belanja
if (isset($_GET['selesai'])) {
    echo "<h3 align='center'>Total yang harus dibayar: Rp ".$_SESSION['total']."</h3>";
    echo "<p align='center'>Terima kasih telah berbelanja!</p>";
    session_destroy();
}
?>

</body>
</html>
