<?php
include 'conn.php';
include 'nav.php';

if (!isset($_GET['id'])) {
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
    <title>Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.5.0/chart.min.js" integrity="sha512-n/G+dROKbKL3GVngGWmWfwK0yPctjZQM752diVYnXZtD/48agpUKLIn0xDQL9ydZ91x6BiOmTIFwWjjFi2kEFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="container">
        <h4 class="h4 bg-primary text-white py-3 ps-4 mt-4 mb-0">Detail Transaksi : <?= $nama ?></h4>
        <div class="container border border-gray p-0">
            <table class="table table-hover mb-0 table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail as $nomor => $data) : ?>
                        <tr>
                            <td><?= $data["transaksi_id"] ?></td>
                            <td><?= $data["harga"] ?></td>
                            <td><?= $data["qty"] ?></td>
                            <td><?= $data["nama"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="./transaksi.php" id="noPrint" class="btn btn-sm btn-primary d-inline-block my-3 bold text-white"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
</body>

</html>