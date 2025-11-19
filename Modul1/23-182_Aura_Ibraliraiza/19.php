<?php
// Cek apakah ada data yang dikirim lewat GET
$submitted = isset($_GET['nama']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form & Biodata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form, table {
            width: 50%;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #aaa;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            border: none;
            background: #007bff;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
            width: 30%;
            text-align: left;
        }
        td {
            background: #fff;
        }
        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body>

<?php if (!$submitted): ?>
    <!-- Tampilan Form -->
    <h2>Form Input Biodata</h2>
    <form method="get">
        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>NIM</label>
        <input type="text" name="nim" required>

        <label>Jurusan</label>
        <input type="text" name="jurusan" required>

        <label>Alamat</label>
        <textarea name="alamat" rows="3" required></textarea>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>No. Telepon</label>
        <input type="text" name="telepon" required>

        <button type="submit">Tampilkan Biodata</button>
    </form>

<?php else: ?>
    <!-- Tampilan Biodata -->
    <h2>Biodata Mahasiswa</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?php echo $_GET['nama']; ?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?php echo $_GET['nim']; ?></td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td><?php echo $_GET['jurusan']; ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?php echo $_GET['alamat']; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $_GET['email']; ?></td>
        </tr>
        <tr>
            <th>No. Telepon</th>
            <td><?php echo $_GET['telepon']; ?></td>
        </tr>
    </table>
<?php endif; ?>

</body>
</html>
