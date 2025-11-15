<?php
require 'koneksi.php';

$id_barang = $_GET['id'] ?? null;

if (!$id_barang) {
    die("ID Barang tidak ditemukan.");
}

// Cek apakah barang digunakan di transaksi_detail
$stmt_check = $pdo->prepare("SELECT COUNT(*) FROM transaksi_detail WHERE id_barang = ?");
$stmt_check->execute([$id_barang]);
$count = $stmt_check->fetchColumn();

if ($count > 0) {
    echo "<script>
        alert('Barang ini sudah digunakan dalam transaksi. Tidak bisa dihapus.');
        window.history.back();
    </script>";
    exit;
}

// Hapus barang
$stmt_hapus = $pdo->prepare("DELETE FROM barang WHERE id_barang = ?");
$stmt_hapus->execute([$id_barang]);

echo "<script>
    alert('Barang berhasil dihapus.');
    window.location.href = 'list_barang.php';
</script>";
?>