<?php
// deklarasi variabel biodata
$nama     = "Cintya Margareth Sihombing";
$nim      = "230411100072";
$prodi    = "Teknik Informatika";
$alamat   = "Gonting, Bahal Batu II, Siborongborong, Tapanuli tara, Sumatera Utara";
$email    = "sihombingcintya0@gmail.com";
// Ambil data dari URL (query string) => $nama = isset($_GET['nama']) ?
// $_GET['nama'] : "Tidak diisi";
// isset ($_GET['nama']) => cek apakah parameter nama ada di URL.
// ? $_GET['nama'] => kalua ada, ambil nilainya.
// : "Tidak diisi"=> kalua tidak ada, isi dengan teks default “Tidak diisi”.
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Biodata</title>
    <style>
        table {
            border-collapse: collapse;  /* garis tabel menyatu */
            width: 50%;             /* tabel ditengah dgnlebar 60% */
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px 12px;
        }
        th {
            text-align: left;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Biodata</h2>
    <table>
        <tr>     <!-- untk buat tabel -->
            <th>Nama</th>   <!-- untuk judul kolom seperti nama,nim,prodi -->
            <td><?php echo $nama; ?></td>
             <!-- utk nilai variabel php yg ditampilkan $nama -->
        </tr>
        <tr>
            <th>NIM</th>
            <td><?php echo $nim; ?></td>
        </tr>
        <tr>
            <th>Prodi</th>
            <td><?php echo $prodi; ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $email; ?></td>
        </tr>
    </table>
</body>
</html>
