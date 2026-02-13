<?php
echo "<h3>3.3 Deklarasi dan Akses Array Asosiatif</h3>";

// Membuat array asosiatif awal
$height = array(
    "Andi" => 170,
    "Budi" => 165,
    "Cici" => 160
);

echo "<b>Data awal array height (nama dan tinggi badan):</b><br>";
foreach ($height as $nama => $tinggi) {
    echo "$nama : $tinggi cm<br>";
}
echo "<br>";

// ===== 3.3.1 =====
// Tambahkan 5 data baru ke array $height
$height["Dodi"] = 172;
$height["Eka"] = 168;
$height["Fajar"] = 180;
$height["Gina"] = 159;
$height["Hana"] = 166;

echo "<b>3.3.1 Setelah menambah 5 data baru:</b><br>";
foreach ($height as $nama => $tinggi) {
    echo "$nama : $tinggi cm<br>";
}

// Menampilkan nilai dengan indeks terakhir (key terakhir)
$keys = array_keys($height);
$last_key = end($keys);
echo "<br>Nilai dengan indeks terakhir: <b>$height[$last_key]</b><br>";
echo "Indeks terakhir dari array height: <b>$last_key</b><br><br>";

// ===== 3.3.2 =====
// Hapus 1 data tertentu dari array $height (misalnya "Cici")
unset($height["Cici"]);

echo "<b>3.3.2 Setelah menghapus 1 data (Cici):</b><br>";
foreach ($height as $nama => $tinggi) {
    echo "$nama : $tinggi cm<br>";
}

// Tampilkan nilai dan indeks terakhir setelah penghapusan
$keys = array_keys($height);
$last_key = end($keys);
echo "<br>Nilai dengan indeks terakhir sekarang: <b>$height[$last_key]</b><br>";
echo "Indeks terakhir setelah penghapusan: <b>$last_key</b><br><br>";

// ===== 3.3.3 =====
// Buat array baru dengan nama $weight berisi 3 data
$weight = array(
    "Andi" => 65,
    "Budi" => 70,
    "Cici" => 55
);

echo "<b>3.3.3 Data array weight (nama dan berat badan):</b><br>";
foreach ($weight as $nama => $berat) {
    echo "$nama : $berat kg<br>";
}

// Tampilkan data ke-2 dari array $weight
// Catatan: array asosiatif tidak pakai indeks angka langsung, jadi kita ubah jadi array numerik sementara
$values = array_values($weight);
echo "<br>Data ke-2 dari array weight adalah: <b>" . $values[1] . " kg</b><br>";
?>
