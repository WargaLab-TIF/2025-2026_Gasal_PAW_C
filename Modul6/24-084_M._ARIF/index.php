<?php
include 'koneksi.php';

// Tambah barang baru
if (isset($_POST['tambah_barang'])) {
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $supplier = $_POST['supplier_id'];

    $query = "INSERT INTO barang (kode_barang, nama_barang, harga, stok, supplier_id) 
                            VALUES ('$kode', '$nama', '$harga', '$stok', '$supplier')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Barang berhasil ditambahkan!'); window.location='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal menambah barang!'); window.location='index.php';</script>";
        exit;
    }
}

// Tambah transaksi detail
if (isset($_POST['tambah_detail'])) {
    $transaksi_id = $_POST['transaksi_id'];
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];

    // Cek apakah barang ini sudah ada di transaksi yang sama
    $cek = mysqli_query($conn, "SELECT * FROM transaksi_detail 
                                WHERE transaksi_id = $transaksi_id 
                                AND barang_id = $barang_id");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Barang ini sudah ada dalam detail transaksi tersebut.'); window.location='index.php';</script>";
        exit;
    }

    // Ambil harga dari tabel barang
    $barang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga FROM barang WHERE id = $barang_id"));
    $harga = $barang['harga'];

    // Lanjut insert data baru
    $query = "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) 
                VALUES ($transaksi_id, $barang_id, $harga, $qty)";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Detail transaksi berhasil ditambahkan!'); window.location='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal menambah detail transaksi!'); window.location='index.php';</script>";
        exit;
    }
}


// Ambil data untuk ditampilkan
$barang = mysqli_query($conn, "SELECT * FROM barang");
$transaksi = mysqli_query($conn, "SELECT * FROM transaksi");
$detail = mysqli_query($conn, "SELECT td.*, b.nama_barang, t.keterangan 
                                FROM transaksi_detail td
                                JOIN barang b ON td.barang_id = b.id
                                JOIN transaksi t ON t.id = td.transaksi_id");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang, Transaksi Detail & Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f8f9fa;
        }
        h2 {
            color: #333;
            margin-top: 40px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            margin-bottom: 40px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #007BFF;
            color: white;
        }
        form {
            margin: 15px 0;
        }
        input, select, button {
            padding: 8px;
            margin: 5px;
        }
        button {
            background: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        a {
            color: red;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h2>Tambah Barang</h2>
    <form method="POST">
        <input type="text" name="kode_barang" placeholder="Kode Barang" required>
        <input type="text" name="nama_barang" placeholder="Nama Barang" required>
        <input type="number" name="harga" placeholder="Harga" required>
        <input type="number" name="stok" placeholder="Stok" required>
        <input type="number" name="supplier_id" placeholder="Supplier ID" required>
        <button type="submit" name="tambah_barang">Tambah Barang</button>
    </form>

    <h2>Data Barang</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Supplier ID</th>
            <th>Aksi</th>
        </tr>
        <?php while ($b = mysqli_fetch_assoc($barang)): ?>
        <tr>
            <td><?= $b['id'] ?></td>
            <td><?= $b['kode_barang'] ?></td>
            <td><?= $b['nama_barang'] ?></td>
            <td>Rp<?= number_format($b['harga']) ?></td>
            <td><?= $b['stok'] ?></td>
            <td><?= $b['supplier_id'] ?></td>
            <td><a href='hapus_barang.php?id=<?= $b['id'] ?>&supplier_id=<?= $b['supplier_id'] ?>' class='hapus' onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</a></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Tambah Detail Transaksi</h2>
    <form method="POST">
        <select name="transaksi_id" required>
            <option value="">-- Pilih Transaksi --</option>
            <?php while ($t = mysqli_fetch_assoc($transaksi)): ?>
                <option value="<?= $t['id'] ?>">ID <?= $t['id'] ?> - <?= $t['keterangan'] ?></option>
            <?php endwhile; ?>
        </select>

        <select name="barang_id" required>
            <option value="">-- Pilih Barang --</option>
            <?php
            $barang2 = mysqli_query($conn, "SELECT * FROM barang");
            while ($b2 = mysqli_fetch_assoc($barang2)):
            ?>
                <option value="<?= $b2['id'] ?>"><?= $b2['nama_barang'] ?> (Rp<?= number_format($b2['harga']) ?>)</option>
            <?php endwhile; ?>
        </select>

        <input type="number" name="qty" min="1" placeholder="Qty" required>
        <button type="submit" name="tambah_detail">Tambah ke Detail</button>
    </form>

    <h2>Data Transaksi Detail</h2>
    <table>
        <tr>
            <th>Transaksi ID</th>
            <th>Nama Barang</th>
            <th>Harga Satuan</th>
            <th>Qty</th>
            <th>Keterangan Transaksi</th>
        </tr>
        <?php while ($d = mysqli_fetch_assoc($detail)): ?>
        <tr>
            <td><?= $d['transaksi_id'] ?></td>
            <td><?= $d['nama_barang'] ?></td>
            <td>Rp<?= number_format($d['harga']) ?></td>
            <td><?= $d['qty'] ?></td>
            <td><?= $d['keterangan'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Data Transaksi</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Waktu Transaksi</th>
            <th>Keterangan</th>
            <th>Total</th>
            <th>Pelanggan ID</th>
        </tr>
        <?php
        $transaksi3 = mysqli_query($conn, "SELECT * FROM transaksi");
        while ($t3 = mysqli_fetch_assoc($transaksi3)):
        ?>
        <tr>
            <td><?= $t3['id'] ?></td>
            <td><?= $t3['waktu_transaksi'] ?></td>
            <td><?= $t3['keterangan'] ?></td>
            <td>Rp<?= number_format($t3['total']) ?></td>
            <td><?= $t3['pelanggan_id'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>