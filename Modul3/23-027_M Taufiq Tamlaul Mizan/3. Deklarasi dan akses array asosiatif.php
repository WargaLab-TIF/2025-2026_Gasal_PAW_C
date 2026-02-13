<?php
// srip awal
$height=array("Andy"=>"176","Barry"=>"165","Charlie"=>"170");

echo "andy is " . $height['Andy'] . " cm tall. ";


// 3. 3. 1. Tambahkan 5 data baru dalam array $height! Tampilkan nilai dengan indeks terakhir dari array $height!

$height = array(
    "Andy"=>"176",
    "Barry"=>"165",
    "Charlie"=>"170",
    "david"=>"180",
    "ethan"=>"172",
    "frank"=>"168",
    "george"=>"185",
    "harry"=>"179"
);
echo "<br>";
echo "indeks terakhir : " . end($height);

// 3. 3. 2. Hapus 1 data tertentu dari array $height! Tampilkan nilai dengan indeks terakhir dari array $height!

$height = array(
    "Andy"=>"176",
    "Barry"=>"165",
    "Charlie"=>"170",
    "david"=>"180",
    "ethan"=>"172",
    "frank"=>"168",
    "george"=>"185",
    "harry"=>"179"
);

unset($height['harry']);
echo "<br>";
echo "indeks terakhir setelah 1 data di hapus : " . end($height);

// 3. 3. 3. Buat array baru dengan nama $weight yang memiliki 3 buah data! Tampilkan data ke-2 dari array $weight!

$weight=array(
    "Andy"=>"176",
    "Barry"=>"165",
    "Charlie"=>"170"
);
echo "<br>";
echo "tampilkan data ke 2 dari array : " . $weight['Barry'];
?>