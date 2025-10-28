<?php
$students = array(
  array("Cintya", "230411100072", "081226414411"),
  array("Rafi", "230411100073", "08124567891"),
  array("Dinda", "230411100074", "08124567892"),
  array("Bagas", "230411100075", "08124567893"),
  array("Nadia", "230411100076", "08124567894"),
  array("Farhan", "230411100077", "08124567895"),
  array("Sinta", "230411100078", "08124567896"),
  array("Kevin", "230411100079", "08124567897")
);

echo "<h3>Daftar Mahasiswa</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>No. HP</th>
      </tr>";

for ($row = 0; $row < count($students); $row++) {
  echo "<tr>";
  echo "<td>" . ($row + 1) . "</td>";
  for ($col = 0; $col < 3; $col++) {
    echo "<td>" . $students[$row][$col] . "</td>";
  }
  echo "</tr>";
}

echo "</table>";
?>
