<?php 
$nama = "Elsa Maria Hutahean";
$nim = "240411100124";
$jurusan = "Teknik Informatika";
$alamat = "Sumatera Utara";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
</head>
<body>
    <h2>Biodata Mahasiswa</h2>
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <td>Nama</td>
      <td><?php echo $nama; ?></td>
    </tr>
    <tr>
      <td>NIM</td>
      <td><?php echo $nim; ?></td>
    </tr>
    <tr>
      <td>Jurusan</td>
      <td><?php echo $jurusan; ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><?php echo $alamat; ?></td>
    </tr>
</body>
</html>