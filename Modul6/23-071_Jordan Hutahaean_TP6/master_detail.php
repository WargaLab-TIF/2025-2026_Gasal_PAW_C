<?php
include 'koneksi.php';

// Fungsi untuk menambahkan detail transaksi dan memperbarui total
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['transaksi_id']) && isset($_POST['barang_id']) && isset($_POST['qty'])) {
    $transaksi_id = $_POST['transaksi_id'];
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];

    // Ambil harga satuan barang dari tabel barang
    $barang_query = "SELECT harga FROM barang WHERE id = '$barang_id'";
    $barang_result = mysqli_query($conn, $barang_query);
    $barang_data = mysqli_fetch_assoc($barang_result);

    if ($barang_data) {
        $harga_satuan = $barang_data['harga'];
        $harga_total = $harga_satuan * $qty;

        // Simpan detail transaksi
        $detail_query = "INSERT INTO transaksi_detail (transaksi_id, barang_id, qty, harga)
                         VALUES ('$transaksi_id', '$barang_id', '$qty', '$harga_total')";

        if (mysqli_query($conn, $detail_query)) {
            // Update total transaksi pada tabel transaksi
            $update_query = "UPDATE transaksi SET total = (
                                SELECT SUM(harga) FROM transaksi_detail WHERE transaksi_id = '$transaksi_id'
                             ) WHERE id = '$transaksi_id'";

            if (mysqli_query($conn, $update_query)) {
                echo "<script>alert('Detail transaksi berhasil disimpan dan total transaksi diperbarui.'); window.location.href='master_detail.php';</script>";
            } else {
                echo "Gagal memperbarui total transaksi: " . mysqli_error($conn);
            }
        } else {
            echo "Gagal menyimpan detail transaksi: " . mysqli_error($conn);
        }
    } else {
        echo "Barang tidak ditemukan atau ada masalah pada query barang.";
    }
}

// Ambil data barang
$barang_query = "SELECT * FROM barang";
$barang_result = mysqli_query($conn, $barang_query) or die("Error: " . mysqli_error($conn));

// Ambil data transaksi
$transaksi_query = "SELECT transaksi.id, waktu_transaksi, keterangan, total, pelanggan.nama as nama_pelanggan 
                    FROM transaksi 
                    JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id";
$transaksi_result = mysqli_query($conn, $transaksi_query) or die("Error: " . mysqli_error($conn));

// Ambil data transaksi detail
$detail_query = "SELECT transaksi_detail.transaksi_id, barang.nama_barang, barang.harga, transaksi_detail.qty, transaksi_detail.harga as total_harga 
                 FROM transaksi_detail 
                 JOIN barang ON transaksi_detail.barang_id = barang.id";
$detail_result = mysqli_query($conn, $detail_query) or die("Error: " . mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Detail Transaksi</title>
</head>
<body>
    <h1>Data Transaksi</h1>

    <!-- Tabel Barang -->
    <h2>Barang</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Nama Supplier</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($barang_result)) : ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['kode_barang']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['harga']; ?></td>
                <td><?= $row['stok']; ?></td>
                <td><?= $row['nama_supplier']; ?></td>
                <td>
                    <form action="hapus_barang.php" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Tabel Transaksi -->
    <h2>Transaksi</h2>
    <a href="tambah_transaksi.php"><button>Tambah Transaksi</button></a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Waktu Transaksi</th>
            <th>Keterangan</th>
            <th>Total</th>
            <th>Nama Pelanggan</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($transaksi_result)) : ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['waktu_transaksi']; ?></td>
                <td><?= $row['keterangan']; ?></td>
                <td><?= $row['total']; ?></td>
                <td><?= $row['nama_pelanggan']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>


    <!-- Tabel Transaksi Detail -->
    <h2>Transaksi Detail</h2>
    <a href="tambah_detail.php"><button>Tambah Detail</button></a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID Transaksi</th>
            <th>Nama Barang</th>
            <th>Harga Satuan</th>
            <th>Quantity</th>
            <th>Total Harga</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($detail_result)) : ?>
            <tr>
                <td><?= $row['transaksi_id']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['harga']; ?></td>
                <td><?= $row['qty']; ?></td>
                <td><?= $row['total_harga']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
