<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #46A2B4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #A6DEE8;
            color: black;
        }
        tr:hover {
            background-color: #ddd;
        }
        .button-container {
            display: flex;
            justify-content: flex-end; 
            margin-bottom: 10px; 
        }
        button {
            padding: 10px 15px;
            background-color: #3CB371;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #2E8B57; 
        }
        a {
            text-decoration: none;
            color: white;
        }
        .edit-button {
            padding: 5px 10px;
            background-color: #FF8C00;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .edit-button:hover {
            background-color: #FF4500; 
        }
        .hapus-button {
            padding: 5px 10px;
            background-color: #FF0000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .hapus-button:hover {
            background-color: #B22222; 
        }
    </style>
</head>
<body>

<h2>Data Master Supplier</h2>

<div class="button-container">
    <a href="soal2.php"><button>Tambah Data</button></a>
</div>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Telp</th>
        <th>Alamat</th>
        <th>Tindakan</th>
    </tr>

    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "store";

    $koneksi = mysqli_connect($hostname, $username, $password, $dbname);

    $no = 1;
    $data = mysqli_query($koneksi, "SELECT * FROM supplier");
    if ($data) {
        while ($hasil = mysqli_fetch_array($data)) {      
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($hasil['nama']); ?></td>
                <td><?php echo htmlspecialchars($hasil['telp']); ?></td>
                <td><?php echo htmlspecialchars($hasil['alamat']); ?></td>
                <td>
                    <a href="soal3.php?id=<?php echo $hasil['id']; ?>" class="edit-button">Edit</a>        
                    <a href="soal4.php?id=<?php echo $hasil['id']; ?>" class="hapus-button" onclick="return confirm('Anda yakin ingin menghapus supplier ini?');">Hapus</a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
</body>
</html>