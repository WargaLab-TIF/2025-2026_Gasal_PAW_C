<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    die("Error: ID Barang tidak ditemukan.");
}
$id_barang = (int)$_GET['id'];

$sql_check = "SELECT COUNT(*) as jumlah_terpakai 
              FROM transaksi_detail 
              WHERE barang_id = ?";

$stmt_check = $koneksi->prepare($sql_check);
$stmt_check->bind_param("i", $id_barang);
$stmt_check->execute();
$result_check = $stmt_check->get_result();
$row = $result_check->fetch_assoc();
$jumlah_terpakai = $row['jumlah_terpakai'];
$stmt_check->close();

$link_kembali = "<br><br><a href='tampil_barang.php'>Kembali</a>";

if ($jumlah_terpakai > 0) {
    // JIKA TERPAKAI: Beri notifikasi
    echo "<b>NOTIFIKASI: GAGAL MENGHAPUS!</b><br>";
    echo "Barang ini terpakai di {$jumlah_terpakai} transaksi.";
    echo $link_kembali;

} else {
    // JIKA AMAN: Hapus (dari kolom 'id' yang BENAR)
    $sql_delete = "DELETE FROM barang WHERE id = ?";
    $stmt_delete = $koneksi->prepare($sql_delete);
    $stmt_delete->bind_param("i", $id_barang);
    
    if ($stmt_delete->execute()) {
        echo "Barang berhasil dihapus.";
    } else {
        echo "Gagal menghapus: " . $stmt_delete->error;
    }
    echo $link_kembali;
    $stmt_delete->close();
}
$koneksi->close();
?>