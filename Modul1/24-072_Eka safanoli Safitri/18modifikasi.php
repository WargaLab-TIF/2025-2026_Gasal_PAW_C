<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Biodata Diri</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px;
      background-color: #f9f9f9;
    }
    h2 {
      text-align: center;
      color: #333;
    }
    table {
      width: 50%;
      margin: 20px auto;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    th, td {
      border: 1px solid #ddd;
      padding: 10px 15px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
      width: 30%;
    }
    tr:hover {
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>

  <h2>Biodata Diri</h2>

  <?php
  // Data biodata
  $nama = "Eka Safanoli Safitri";
  $usia = "20";
  $kota = "Kediri";

  // Tampilkan data dalam tabel
  echo "<table>";
  echo "<tr><th>Nama</th><td>$nama</td></tr>";
  echo "<tr><th>Usia</th><td>$usia</td></tr>";
  echo "<tr><th>Kota</th><td>$kota</td></tr>";
  echo "</table>";
  ?>

</body>
</html>