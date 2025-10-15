<?php
echo "<h3>3.5 Deklarasi dan Akses Array Multidimensi</h3>";

// Membuat array multidimensi awal (data mahasiswa)
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

// Menampilkan data awal
echo "<b>Data awal array students:</b><br>";
for ($i = 0; $i < count($students); $i++) {
    echo "Nama: " . $students[$i][0] . " | NIM: " . $students[$i][1] . " | No HP: " . $students[$i][2] . "<br>";
}
echo "<br>";

// ===== 3.5.1 =====
// Tambahkan 5 data baru dalam array $students
array_push($students,
    array("Dodi", "220404", "0812345601"),
    array("ahok", "220405", "0812345602"),
    array("kentung", "220406", "0812345603"),
    array("koneng", "220407", "0812345604"),
    array("david", "220408", "0812345605")
);

// Tampilkan seluruh data setelah penambahan
echo "<b>3.5.1 Setelah menambah 5 data baru:</b><br>";
for ($i = 0; $i < count($students); $i++) {
    echo "Nama: " . $students[$i][0] . " | NIM: " . $students[$i][1] . " | No HP: " . $students[$i][2] . "<br>";
}
echo "<br>";

// ===== 3.5.2 =====
// Tampilkan data array students dalam bentuk tabel HTML
echo "<b>3.5.2 Tampilkan data dalam bentuk tabel:</b><br><br>";

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>No HP</th>
      </tr>";

for ($i = 0; $i < count($students); $i++) {
    echo "<tr>";
    echo "<td>" . ($i + 1) . "</td>";
    echo "<td>" . $students[$i][0] . "</td>";
    echo "<td>" . $students[$i][1] . "</td>";
    echo "<td>" . $students[$i][2] . "</td>";
    echo "</tr>";
}
echo "</table>";
