<?php
require_once "./koneksi.php";
$transaksi = getAllDataTransaksi();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <title>Transaksi</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Penjualan XYZ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto me-0">
                    <li class="nav-item ms-2">
                        <a class="nav-link text-secondary" href="">Supplier</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link text-secondary" href="">Barang</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link text-secondary active text-white" aria-current="page" href="./transaksi.php\">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h4 class="h4 bg-primary text-white py-3 ps-4 mt-4 mb-0">Data Master Transaksi</h4>
        <div class="container border border-gray p-0">
            <div class="container d-flex justify-content-end">
                <a href="./report_transaksi.php" class="btn btn-sm btn-primary d-inline-block my-3 bold text-white">Lihat Laporan Penjualan</a>
                <a href="" class="btn btn-sm btn-success d-inline-block my-3 ms-4 bold text-white">Tambah Transaksi</a>
            </div>
            <table class="table table-hover mb-0 table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Waktu Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>keterangan</th>
                        <th>Total</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaksi as $nomor => $data) :  ?>
                        <tr>
                            <td><?= $nomor + 1 ?></td>
                            <td><?= $data["id"] ?></td>
                            <td><?= $data["waktu_transaksi"] ?></td>
                            <td><?= $data["nama_pelanggan"] ?></td>
                            <td><?= $data["keterangan"]  ?></td>
                            <td><?= $data["total"] ?></td>
                            <td>
                                <div class="d-flex" style="gap: 5px;">
                                    <a href="detail_transaksi.php?id=<?= $data['id'] ?>&nama=<?= $data['nama_pelanggan']?>" class="btn btn-sm btn-info text-white">Lihat Detail</a>
                                    <a href="" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>