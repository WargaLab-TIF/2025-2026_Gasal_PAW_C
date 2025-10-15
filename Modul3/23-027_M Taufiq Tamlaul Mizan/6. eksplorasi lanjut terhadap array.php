<?php
// push array
$team = array("Budi", "Siti", "Eko");

echo "<b>Sebelum push (push array) : </b><br>";
print_r($team);
// echo "<hr>";

array_push($team, "Wati", "Joko");

echo "<br> <b>Setelah push (push array) : </b><br>";
print_r($team);

// array marge
$team_a = array("Budi", "Siti");
$team_b = array("Eko", "Wati", "Joko");

// gabungkan
$full_team = array_merge($team_a, $team_b);

echo "<br> <b>Tim Gabungan (marge array) : </b><br>";
print_r($full_team);

// values array
$nilai = array(
    "Matematika" => 85,
    "Fisika" => 90,
    "Biologi" => 88
);

// ambil nilai
$daftar_nilai = array_values($nilai);

echo "<br> <b>Array Asli  (values array):</b><br>";
print_r($nilai);

echo "<br> <b>Setelah array_values():</b><br>";
print_r($daftar_nilai);

// search array
$inventory = array(
    "A1" => "Buku",
    "A2" => "Pensil",
    "B1" => "Penghapus",
    "B2" => "Penggaris"
);

// cari array
$key_found = array_search("Pensil", $inventory);

if ($key_found !== false) {
    echo "<br><br> <b>Nilai 'pensil' ditemukan pada key: </b> (serch array)" . $key_found;
} else {
    echo "Nilai tidak ditemukan.";
}

// filter array
function cari_angka_genap($angka) {
    return $angka % 2 == 0;
}

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// saring array $numbers
$even_numbers = array_filter($numbers, "cari_angka_genap");

echo " <br> <b>Array setelah difilter (hanya angka genap):</b><br>";
print_r($even_numbers);

// sorting array

// sort (asending)
$angka = [3, 1, 5, 2, 4];
sort($angka);
echo " <br> <b>setalah di sort :</b>  <br>";
print_r($angka);

// rsort (descending)
$angka = [3, 1, 5, 2, 4];
rsort($angka);
echo "<br> <b>setelah di rsort :</b> <br>";
print_r($angka);

// asort (ascending)
$nilai = ["Budi" => 85, "Ani" => 90, "Candra" => 75];
asort($nilai);
echo "<br> <b>setelah di asort :</b> <br>";
print_r($nilai);

// ksort(ascending)
$nilai = ["Budi" => 85, "Ani" => 90, "Candra" => 75];
ksort($nilai);
echo "<br> <b>setelah di ksort :</b> <br>";
print_r($nilai);
?>