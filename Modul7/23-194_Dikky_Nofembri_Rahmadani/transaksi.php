<?php
require 'conn.php';
$transaksi = getAllDataTransaksi();
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.5.0/chart.min.js" integrity="sha512-n/G+dROKbKL3GVngGWmWfwK0yPctjZQM752diVYnXZtD/48agpUKLIn0xDQL9ydZ91x6BiOmTIFwWjjFi2kEFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="container">
        <h4 class="h4 bg-primary text-white py-3 ps-4 mt-4 mb-0">Data Master Transaksi</h4>
        <div class="container border border-gray p-0">
            <div class="container d-flex justify-content-end">
                <a href="./report.php" class="btn btn-sm btn-primary d-inline-block my-3 bold text-white">Lihat Laporan Penjualan</a>
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
                                    <a href="detail_transaksi.php?id=<?= $data['id'] ?>&nama=<?= $data['nama_pelanggan'] ?>" class="btn btn-sm btn-info text-white">Lihat Detail</a>
                                    <a href="" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>