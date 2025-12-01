<?php
require_once "./koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';

// Ambil parameter dari URL
$id_transaksi = isset($_GET['id']) ? $_GET['id'] : '';
$nama_pelanggan = isset($_GET['nama']) ? $_GET['nama'] : '';

// Ambil data transaksi header
$query_transaksi = "SELECT * FROM transaksi WHERE id = '$id_transaksi'";
$result_transaksi = mysqli_query(DB, $query_transaksi);
$data_transaksi = mysqli_fetch_assoc($result_transaksi);

// Ambil detail transaksi
$detail = getDetailTransaksi($id_transaksi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Detail Transaksi</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Penjualan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
                    </li>
                    <?php if ($username === 'admin') : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data Master
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./barang.php">Data Barang</a></li>
                            <li><a class="dropdown-item" href="./supplier.php">Data Supplier</a></li>
                            <li><a class="dropdown-item" href="./pelanggan.php">Data Pelanggan</a></li>
                            <li><a class="dropdown-item" href="./users.php">Data User</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="./transaksi.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./report_transaksi.php">Laporan</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, <?= htmlspecialchars($username); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Detail Transaksi: <?= htmlspecialchars($id_transaksi) ?></h4>
            <a href="./transaksi.php" class="btn btn-sm btn-primary">&lt; Kembali</a>
        </div>
        
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Informasi Transaksi</h5>
                <table class="table table-borderless">
                    <tr>
                        <td width="200"><strong>ID Transaksi</strong></td>
                        <td>: <?= htmlspecialchars($data_transaksi['id']) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Transaksi</strong></td>
                        <td>: <?= htmlspecialchars($data_transaksi['waktu_transaksi']) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Pelanggan</strong></td>
                        <td>: <?= htmlspecialchars($data_transaksi['nama_pelanggan']) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Keterangan</strong></td>
                        <td>: <?= htmlspecialchars($data_transaksi['keterangan']) ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <h5>Detail Barang</h5>
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;
                foreach ($detail as $nomor => $item) : 
                    $total += $item['subtotal'];
                ?>
                <tr>
                    <td><?= $nomor + 1 ?></td>
                    <td><?= htmlspecialchars($item['kode_barang']) ?></td>
                    <td><?= htmlspecialchars($item['nama_barang']) ?></td>
                    <td><?= htmlspecialchars($item['jumlah']) ?></td>
                    <td>Rp<?= number_format($item['harga'], 0, ",", ".") ?></td>
                    <td>Rp<?= number_format($item['subtotal'], 0, ",", ".") ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5" class="text-end">TOTAL</th>
                    <th>Rp<?= number_format($total, 0, ",", ".") ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>