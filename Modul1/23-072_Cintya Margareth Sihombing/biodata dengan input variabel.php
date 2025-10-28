<?php
// Ambil variabel dari query string (GET)
$nama    = isset($_GET['nama']) ? $_GET['nama'] : "Tidak diisi";
// $_GET['nama'] utk mengambil parameter nama dri url
//  dan isset($_GET['nama']) utk mengecek apakah parameter nama ada ata tdk si 
// ? utk jika $nama bnr akan muncl jika salah maka tidak diisi
$nim     = isset($_GET['nim']) ? $_GET['nim'] : "Tidak diisi";
$prodi   = isset($_GET['prodi']) ? $_GET['prodi'] : "Tidak diisi";
$alamat  = isset($_GET['alamat']) ? $_GET['alamat'] : "Tidak diisi";
$email   = isset($_GET['email']) ? $_GET['email'] : "Tidak diisi";
// ini utk mendeklarasikan variabel biodata 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Biodata</title>
    <style>
        table {
            border-collapse: collapse;  /* agar baris tabel tdk ganda */
            width: 60%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;    /* setiap <td> akan memiliki garis tepi hitam sebanyak 1px */
            </td>
            padding: 8px 12px;
        }
        th {
            text-align: left;   /* agar judul kolom rata kiri dlm tabel */
            background-color: #f2f2f2;  /* warna pada header */
            width: 30%;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Biodata</h2>
    <table>
        <tr>     <!-- untk buat tabel -->
            <th>Nama</th>   <!-- untuk judul kolom seperti nama,nim,prodi -->
            <td><?php echo htmlspecialchars($nama); ?></td> 
            <!-- utk nilai variabel php yg ditampilkan $nama -->
        </tr>
        <tr>
            <th>NIM</th>
            <td><?php echo htmlspecialchars($nim); ?></td>
        </tr>
        <tr>
            <th>Prodi</th>
            <td><?php echo htmlspecialchars($prodi); ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?php echo htmlspecialchars($alamat); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo htmlspecialchars($email); ?></td>
            <!-- Tanpa htmlspecialchars => script akan dijalankan di browser (XSS attack).
            Dengan htmlspecialchars => script ditampilkan apa adanya sebagai teks. -->
        </tr>
    </table>
<!-- program ini halaman biodata dinamis, datanya dpt berubah sesuai isi query string di URL -->
</body>
</body>
</html>
