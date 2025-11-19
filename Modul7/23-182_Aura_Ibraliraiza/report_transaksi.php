<?php
require "koneksi.php";
if (isset($_POST["submit"])) {
    $query = "SELECT * FROM transaksi WHERE waktu_transaksi BETWEEN '{$_POST['mulai']}' AND '{$_POST['akhir']}'";
    $transaksi = mysqli_query($koneksi, $query);

    $penjualan = [];
    $penjualann = [];
    $total_pelanggan = 0;
    $pelanggan = [];
    $jumlah_pendapatan = 0;

    foreach ($transaksi as $row) {
        $jumlah_pendapatan += $row["total"];

        if (!in_array($row["pelanggan_id"], $pelanggan)) {
            $total_pelanggan += 1;
            $pelanggan[] = $row["pelanggan_id"];
        }

        if (array_key_exists($row["waktu_transaksi"], $penjualan)) {
            $penjualan[$row['waktu_transaksi']] += $row["total"];
        } else {
            $penjualan[$row['waktu_transaksi']] = $row["total"];
        }

        $date_key = new DateTime($row["waktu_transaksi"]);
        $date_key = $date_key->format("j F Y");

        if (array_key_exists($date_key, $penjualann)) {
            $penjualann[$date_key] += $row["total"];
        } else {
            $penjualann[$date_key] = $row["total"];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Transaksi</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="navbar-brand">Penjualan XYZ</a>
            <ul class="navbar-nav">
                <li><a href="#">Supplier</a></li>
                <li><a href="#">Barang</a></li>
                <li><a href="#">Transaksi</a></li>
            </ul>
        </div>
    </nav>
        <?php if (!isset($_POST["submit"])): ?>
            <div class="container">
                <div class="card-header">Rekap Laporan Penjualan</div>
                <button type="button" class="noprint btn btn-primary" onclick="history.back();">&lt; Kembali</button>
                <form method="post" action="" class="form-inline">
                    <input name="mulai" type="date">
                    <input name="akhir" type="date">
                    <button type="submit" name="submit" class="btn btn-success">Tampilkan</button>
                </form>
            </div>
        <?php endif; ?>
    

    <?php if (isset($_POST["submit"])): ?>
        <div class="container">
            <div class="card-header">Rekap Laporan Penjualan <?= $_POST['mulai'] ?> sampai <?= $_POST["akhir"] ?></div>
            <button type="button" class="noprint btn btn-primary" onclick="history.back();">&lt; Kembali</button>
            <br>
            <button type="button" class="btnn" onclick="window.print();">Cetak</button>
            <button type="button" class="btnn" onclick="window.location.href='downloadexcel.php?mulai=<?= $_POST['mulai'] ?>&akhir=<?= $_POST['akhir'] ?>'">Excel</button>
            <canvas id="mychart" class="mb-4"></canvas>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($penjualann as $tanggal => $total): ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td>Rp. <?= number_format($total, 0, ',', '.') ?></td>
                            <td><?= $tanggal ?></td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <table class="tablee" id="table-a">
                <thead>
                    <tr>
                        <th>Jumlah Pelanggan</th>
                        <th>Jumlah Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $total_pelanggan ?> Orang</td>
                        <td>Rp. <?= number_format($jumlah_pendapatan, 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <?php if (isset($_POST["submit"])): ?>
    <script>
        const ctx = document.getElementById("mychart").getContext("2d");
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode(array_keys($penjualan)); ?>,
                datasets: [{
                    label: 'Total',
                    data: <?= json_encode(array_values($penjualan)) ?>,
                    backgroundColor: "rgba(128, 128, 128, 0.2)",
                    borderColor: "rgba(128, 128, 128, 0.5)",
                    borderWidth: 1
                }]
            }
        });
    </script>
    <?php endif; ?>
</body>
</html>
