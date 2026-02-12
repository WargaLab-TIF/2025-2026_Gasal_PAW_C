<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
            mysqli_query($conn, $update_query);

            echo "<script>alert('Detail transaksi berhasil disimpan dan total transaksi diperbarui.'); window.location.href='master_detail.php';</script>";
        } else {
            echo "Gagal menyimpan detail transaksi: " . mysqli_error($conn);
        }
    } else {
        echo "Barang tidak ditemukan atau ada masalah pada query barang.";
    }
} else {
    echo "Permintaan tidak valid.";
}
?>
