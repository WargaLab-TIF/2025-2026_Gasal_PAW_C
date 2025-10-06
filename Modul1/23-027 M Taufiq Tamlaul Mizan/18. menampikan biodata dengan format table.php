<!-- Modifikasi script dasar PHP untuk menampilkan biodata dengan format tabel HTML ! -->
<!DOCTYPE html>
<html>
<head>
    <title>Biodata Diri</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 50px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #444;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    
    <?php
// Data biodata dalam bentuk variabel PHP
$nama = "fajar Saputra";
$alamat = "Jl. tunjungan No. 123, surabaya";
$tempat_lahir = "surabaya";
$tanggal_lahir = "15 oktober 2000";
$jenis_kelamin = "Laki-laki";
$agama = "Islam";
$hobi = "Membaca, Menulis, bermain game";
$pekerjaan = "Mahasiswa";
?>
</body>

<h2>Biodata Diri</h2>
<table>
    <tr>
        <th>Field</th>
        <th>Data</th>
    </tr>
    <tr>
        <td>Nama</td>
        <td><?php echo $nama; ?></td>
    </tr>
    <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td><?php echo $tempat_lahir . ", " . $tanggal_lahir; ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><?php echo $jenis_kelamin; ?></td>
    </tr>
    <tr>
        <td>Agama</td>
        <td><?php echo $agama; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?php echo $alamat; ?></td>
    </tr>
    <tr>
        <td>Hobi</td>
        <td><?php echo $hobi; ?></td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td><?php echo $pekerjaan; ?></td>
    </tr>
</table>
</html>
