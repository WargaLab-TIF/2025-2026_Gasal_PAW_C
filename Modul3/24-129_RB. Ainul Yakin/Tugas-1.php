<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

echo "I like " . $fruits[0] . ", " . $fruits[1] . ", and " . $fruits[2] . ".<br><br>";

echo "3.1.1. tambahkan 5 data buah baru ke dalam array fruits!<br>";
echo "setelah ditambahkan:<br>";

array_push($fruits, "Durian", "Apel", "Mangga", "Anggur", "Kurma");

echo "I like " . $fruits[0] . ", " . $fruits[1] . ", " . $fruits[2] . ", " . $fruits[3] . ", " . $fruits[4] . ", " . $fruits[5] . ", " . $fruits[6] . ", and " . $fruits[7] . ".<br>";

$max_index = count($fruits) - 1;

echo "Buah dengan indeks tertinggi ($max_index) adalah: " . $fruits[$max_index]. ".<br><br>";

echo "3.1.2. hapus 1 data tertentu dari array fruits!<br>";
echo "Hapus 1 data tertentu dari array:<br>";
unset($fruits[2]);
echo "I like " . $fruits[0] . ", " . $fruits[1] . ", " . $fruits[3] . ", " . $fruits[4] . ", " . $fruits[5] . " and " . $fruits[6] . ".<br>";
$max_index = count($fruits) - 1;
echo "Setelah penghapusan:<br>";
echo "Buah dengan indeks tertinggi ($max_index) adalah: " . $fruits[$max_index];
echo "<br><br>";

echo "3.1.3. buat array baru veggies!<br>";
$veggies = array("Wortel", "Kentang", "Brokoli");

echo "Data array \$veggies:<br>";
foreach ($veggies as $veggie) {
    echo "- " . $veggie . "<br>";
}
?>