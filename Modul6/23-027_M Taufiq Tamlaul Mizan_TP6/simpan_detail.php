<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $transaksi_id = (int)$_POST['transaksi_id'];
    $barang_id    = (int)$_POST['barang_id'];
    $jumlah       = (int)$_POST['jumlah']; 

    if ($transaksi_id <= 0 || $barang_id <= 0 || $jumlah <= 0) {
        die("Error: Data tidak valid.");
    }

    $koneksi->begin_transaction();

    try {
        $stmt_harga = $koneksi->prepare("SELECT harga FROM barang WHERE id = ?");
        $stmt_harga->bind_param("i", $barang_id);
        $stmt_harga->execute();
        $result_harga = $stmt_harga->get_result();
        
        if ($result_harga->num_rows === 0) {
            throw new Exception("Error: Barang tidak ditemukan.");
        }
        
        $barang = $result_harga->fetch_assoc();
        $harga_satuan = $barang['harga'];
        $stmt_harga->close();

       
        $subtotal = $harga_satuan * $jumlah;

        $sql_insert = "INSERT INTO transaksi_detail (transaksi_id, barang_id, qty, subtotal) 
                       VALUES (?, ?, ?, ?)";
        $stmt_insert = $koneksi->prepare($sql_insert);
        $stmt_insert->bind_param("iiid", $transaksi_id, $barang_id, $jumlah, $subtotal);
        $stmt_insert->execute();
        $stmt_insert->close();

        $sql_update_total = "
            UPDATE transaksi t
            SET t.total = (
                SELECT SUM(td.subtotal) 
                FROM transaksi_detail td 
                WHERE td.transaksi_id = ?
            )
            WHERE t.id = ?
        ";
        $stmt_update = $koneksi->prepare($sql_update_total);
        $stmt_update->bind_param("ii", $transaksi_id, $transaksi_id);
        $stmt_update->execute();
        $stmt_update->close();

        $koneksi->commit();

        header("Location: form_tambah_detail.php?transaksi_id=" . $transaksi_id);
        exit;

    } catch (Exception $e) {
        $koneksi->rollback();
        die("TRANSAKSI GAGAL: " . $e->getMessage());
    }

} else {
    header("Location: form_tambah_detail.php?transaksi_id=1");
    exit;
}
?>