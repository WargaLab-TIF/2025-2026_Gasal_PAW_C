<?php
// Data awal
$height = array("Andy"=>"176","Barry"=>"165","Charlie"=>"170");
echo "Andy is ".$height['Andy']." cm tall.<br>";

// 3.3.1 Tambahkan 5 data baru
$height += [
    "Sultan"=>"251",
    "Robert"=>"272",
    "Suparwono"=>"240",
    "Vikas"=>"251",
    "Bernard"=>"249"
];

echo "<b>Data array height setelah ditambah:</b>";
echo "<pre>";
print_r($height);
echo "</pre>";

// Menampilkan nilai dengan indeks terakhir
$lastKey = array_key_last($height);
echo "Nilai dengan indeks terakhir adalah: <b>$lastKey = ".$height[$lastKey]." cm</b><br>";


// 3.3.2 Hapus 1 data tertentu

unset($height["Robert"]); // Hapus data Robert

echo "<b>Data array height setelah menghapus 'Robert':</b>";
echo "<pre>";
print_r($height);
echo "</pre>";

$lastKey = array_key_last($height);
echo "Nilai dengan indeks terakhir sekarang adalah: <b>$lastKey = ".$height[$lastKey]." cm</b><br>";


// 3.3.3 Buat array baru weight

$weight = array(58, 67, 73);

echo "<br><b>Data array weight:</b><br>";
echo "<pre>";
print_r($weight);
echo "</pre>";
echo "Data ke-2 dari array weight adalah: <b>".$weight[1]." kg</b><br>";
?>
