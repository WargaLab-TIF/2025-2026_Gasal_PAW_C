<?php
// skrip awal
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170"
);

foreach ($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

// 3. 4. 1. Tambahkan 5 data baru dalam array $height! Apakah Anda perlu melakukan perubahan pada skrip penggunaan struktur perulangan FOR (skrip baris 4 – 7) untuk menampilkan seluruh data dalam array $height dengan adanya penambahan 5 data baru? Mengapa demikian? Jelaskan!

$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170",
    "david"=>"180",
    "ethan"=>"172",
    "frank"=>"168",
    "george"=>"185",
    "harry"=>"179"
);

 echo "<br>". "setelah di tambahkan 5 data baru : <br>";
foreach ($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

// 3. 4. 2. Buat array baru dengan nama $weight yang memiliki 3 buah data! Tampilkan seluruh data dari array $weight dengan menggunakan struktur perulangan FOR! Apakah Anda membuat skrip baru untuk menampilkan seluruh array $weight ataukah Anda cukup sedikit memodifikasi skrip yang sudah ada? Mengapa demikian? Jelaskan!

$weight = array(
    "frank"=>"168",
    "george"=>"185",
    "harry"=>"179"

);

 echo "<br>". "data berat badan : <br>";
foreach ($weight as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
?>