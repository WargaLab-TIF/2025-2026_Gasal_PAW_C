<?php
$total = 0;

do {
    echo "Menu Pilihan:<br>";
    echo "1. Nasi Goreng - 15000<br>";
    echo "2. Mie Ayam - 12000<br>";
    echo "3. Es Teh - 5000<br>";

    $pilihan = (int)readline("Masukkan nomor menu: ");

    if ($pilihan == 1) {
        $total += 15000;
    } elseif ($pilihan == 2) {
        $total += 12000;
    } elseif ($pilihan == 3) {
        $total += 5000;
    } else {
        echo "Menu tidak valid!<br>";
    }

    $ulang = strtolower(readline("Apakah ingin menambah pesanan lagi? (y/n): "));
} while ($ulang == "y");

echo "Total harga yang harus dibayar: Rp " . number_format($total, 0, ',', '.');
?>
