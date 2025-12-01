<?php
// 3.4 Mengakses array asosiatif dengan perulangan menggunakan loop

// Deklarasi array asosiatif awal
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170"
);

// Menampilkan data awal
echo "<h3>Data tinggi awal:</h3>";
foreach ($height as $x => $x_value) {
    echo "Key = " . $x . ", Value = " . $x_value . "<br>";
}

// 3.4.1 Tambahkan 5 data baru
$height["David"] = "180";
$height["Evan"] = "172";
$height["Frank"] = "168";
$height["George"] = "177";
$height["Henry"] = "174";

// Menampilkan data setelah penambahan
echo "<h3>Data tinggi setelah menambah 5 data baru:</h3>";
foreach ($height as $x => $x_value) {
    echo "Key = " . $x . ", Value = " . $x_value . "<br>";
}

// 3.4.2 Buat array baru $weight dengan 3 data
$weight = array(
    "Andy" => "65",
    "Charlie" => "70",
    "David" => "68"
);

// Menampilkan data dari array $weight
echo "<h3>Data berat badan:</h3>";
foreach ($weight as $key => $value) {
    echo "Key = " . $key . ", Value = " . $value . "<br>";
}
?>