<?php
// 3.3 Deklarasi dan akses array asosiatif
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170"
);

// Menampilkan data awal
echo "<h3>Data tinggi awal:</h3>";
foreach ($height as $nama => $tinggi) {
    echo "$nama memiliki tinggi $tinggi cm tall.<br>";
}

// 3.3.1 Tambahkan 5 data baru
$height["David"] = "180";
$height["Evan"] = "172";
$height["Frank"] = "168";
$height["George"] = "177";
$height["Henry"] = "174";

// Menampilkan data setelah penambahan
echo "<h3>Data tinggi setelah menambah 5 orang:</h3>";
foreach ($height as $nama => $tinggi) {
    echo "$nama memiliki tinggi $tinggi cm<br>";
}

// Menampilkan nilai dengan indeks terakhir
$lastKey = array_key_last($height);
echo "<br><b>Indeks terakhir:</b> $lastKey dengan tinggi {$height[$lastKey]} cm<br>";

// 3.3.2 Hapus 1 data tertentu (misal "Barry")
unset($height["Barry"]);

// Menampilkan data setelah penghapusan
echo "<h3>Data tinggi setelah menghapus 1 orang (Barry):</h3>";
foreach ($height as $nama => $tinggi) {
    echo "$nama memiliki tinggi $tinggi cm<br>";
}

// Menampilkan nilai dengan indeks terakhir setelah penghapusan
$lastKey = array_key_last($height);
echo "<br><b>Indeks terakhir sekarang:</b> $lastKey dengan tinggi {$height[$lastKey]} cm<br>";

// 3.3.3 Buat array baru weight dengan 3 data
$weight = array(
    "Andy" => "65",
    "Charlie" => "70",
    "David" => "68"
);

// Menampilkan semua data array weight
echo "<h3>Data berat badan:</h3>";
foreach ($weight as $nama => $berat) {
    echo "$nama memiliki berat $berat kg<br>";
}

// Menampilkan data ke-2 dari array weight
$keys = array_keys($weight);
$secondKey = $keys[1];
echo "<br><b>Data ke-2 dari array weight:</b> $secondKey memiliki berat {$weight[$secondKey]} kg";
?>