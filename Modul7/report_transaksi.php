<?php
require_once "./koneksi.php";
$mode = "input";
if(isset($_POST['submit'])) {
    $mode = "output";
    $start = $_POST['start'];
    $end = $_POST['end'];
    $result = getDataTransaksiByDate($start, $end);
    $total = 0;

    $labels = [];
    $values = [];
    foreach($result as $data) {
        $labels[] = formatDate($data['waktu_transaksi']);
        $values[] = $data['total'];
    }
}

function formatDate($data) {
    $date = explode("-", $data);
    return $date[2] . " " . date("F", mktime(0, 0, 0, $date[1], 10)) . " " . $date[0];
}
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
    <style>
        div#Grafik {
            width: 80%;
            max-width: 800px;
        }

        @media print {
            * {
                margin: 0;
                padding: 0;
                font-size: 10px;
            }

            .h4 {
                font-size: 10px;
            }

            nav.navbar, #noPrint {
                display: none;
            }

            canvas#myChart {
                width: 100% !important;
                height: auto !important;
            }
        }
    </style>
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
                        <a class="nav-link text-secondary active text-white" aria-current="page" href="./transaksi.php">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="parent" class="container">
        <div id="parent2" class="container">
            <h4 id="header" class="h4 bg-primary text-white py-3 ps-4 mt-4 mb-0">
                Rekap Laporan Penjualan <?= (isset($start) && isset($end))? formatDate($start) . " sampai " . formatDate($end) : '' ?>
            </h4>
            <div id="parent3" class="container border border-gray p-0">
                <div id="noPrint" class="container">
                    <a href="./transaksi.php" id="noPrint" class="btn btn-sm btn-primary d-inline-block my-3 bold text-white">&lt; Kembali</a>
                </div>
                <?php if($mode === "input") : ?>
                <form action="" method="post" class="d-flex ">
                    <input type="date" name="start" class="form-control w-25 me-2" required>
                    <input type="date" name="end" class="form-control w-25 me-2" required>
                    <input type="submit" name="submit" class="btn btn-success">
                </form>
                <?php elseif($mode === "output") : ?>
                    <?php if($result) : ?>
                    <div id="noPrint" class="container">
                        <a onclick="window.print()" class="btn btn-sm btn-warning d-inline-block my-3 bold"><i style="font-size:20px" class="fa">&#xf02f;</i> Cetak</a>
                        <a href="./cetak_excel.php?start_date=<?= $start?>&end_date=<?= $end?>" class="btn btn-sm btn-warning d-inline-block my-3 bold"><i style="font-size:20px" class="fa">&#xf1c3;</i> Excel</a>
                    </div>
                    <div id="Grafik">
                        <canvas id="myChart"></canvas>
                    </div>
                    <table id="laporanTable" class="table table-hover mb-0 table-bordered mt-5">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Total</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $nomor => $data) :  ?>
                                <tr>
                                    <?php $total += $data['total'] ?>
                                    <td><?= $nomor + 1 ?></td>
                                    <td><?= "Rp" . number_format($data['total'], 0, ",", ".") ?></td>
                                    <td><?= formatDate($data['waktu_transaksi']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <table class="table table-hover mb-0 table-bordered mt-5 w-50">
                        <thead class="table-primary">
                            <tr>
                                <th>Jumlah Pelanggan</th>
                                <th>Jumlah Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $nomor + 1 . " Oarang"?></td>
                                <td><?= "Rp" . number_format($total, 0, ",", ".") ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php else : ?>
                    <p class="text-center">Data Tidak Ditemukan!</p>
                    <?php endif; ?>
                <?php endif ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const ctx = document.getElementById('myChart');
        const labels = <?= isset($labels)? json_encode($labels) : ''?>;
        const values = <?= isset($values)? json_encode($values) : ''?>;

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: labels,
            datasets: [{
                label: 'Total',
                data: values,
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>
</body>
</html>