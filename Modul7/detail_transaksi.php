<?php
require_once "./koneksi.php";
if(!isset($_GET['id'])) {
    header("Location: ./transaksi.php");
    exit;
}
$id = $_GET['id'];
$nama = $_GET['nama'];
$detail = getDataDetailById($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <title>Detail Transaksi</title>
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
    <div class="container">
        <h4 class="h4 bg-primary text-white py-3 ps-4 mt-4 mb-0">Data Detail <?= $nama?></h4>
        <div class="container border border-gray p-0">
            <table class="table table-hover mb-0 table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Barang</th>
                        <th>Harga<;/th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail as $nomor => $data) :  ?>
                        <tr>
                            <td><?= $data["transaksi_id"] ?></td>
                            <td><?= $data["harga"] ?></td>
                            <td><?= $data["qty"] ?></td>
                            <td><?= $data["nama"]  ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>