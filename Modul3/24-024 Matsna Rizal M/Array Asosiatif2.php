<?php
echo "<h3>3.4 Mengakses Array Asosiatif dengan Perulangan FOR</h3>";

// Membuat array asosiatif awal
$height = array(
    "Andi" => 170,
    "Budi" => 165,
    "Cici" => 160
);

echo "<b>Data awal array height:</b><br>";

// Ubah array asosiatif jadi dua array numerik: key dan value
$keys = array_keys($height);
$values = array_values($height);

// Tampilkan data dengan perulangan FOR
for ($i = 0; $i < count($height); $i++) {
    echo $keys[$i] . " : " . $values[$i] . " cm<br>";
}
echo "<br>";

// ===== 3.4.1 =====
// Tambahkan 5 data baru dalam array $height
$height["ahok"] = 172;
$height["pragos"] = 168;
$height["kentung"] = 180;
$height["koneng"] = 159;
$height["imam"] = 166;

// Ubah lagi menjadi dua array numerik setelah penambahan
$keys = array_keys($height);
$values = array_values($height);

echo "<b>3.4.1 Setelah menambah 5 data baru:</b><br>";
for ($i = 0; $i < count($height); $i++) {
    echo $keys[$i] . " : " . $values[$i] . " cm<br>";
}

echo "<br>Pertanyaan: Apakah perlu mengubah struktur loop FOR setelah menambah data?<br>";
echo "Jawaban: <b>Tidak perlu</b>. Karena kondisi perulangan menggunakan <b>count(\$height)</b> yang otomatis menyesuaikan jumlah data.<br><br>";

// ===== 3.4.2 =====
// Buat array baru dengan nama $weight (berisi 3 data)
$weight = array(
    "Andi" => 65,
    "Budi" => 70,
    "Cici" => 55
);

// Ubah ke bentuk numerik lagi untuk bisa diakses dengan FOR
$keys_weight = array_keys($weight);
$values_weight = array_values($weight);

echo "<b>3.4.2 Data array weight:</b><br>";
for ($i = 0; $i < count($weight); $i++) {
    echo $keys_weight[$i] . " : " . $values_weight[$i] . " kg<br>";
}

echo "<br>Pertanyaan: Apakah perlu membuat skrip baru untuk array \$weight?<br>";
echo "Jawaban: <b>Tidak perlu</b>. Cukup sedikit modifikasi dari skrip sebelumnya (mengganti nama variabel). Struktur loop FOR tetap sama.<br>";
?>
