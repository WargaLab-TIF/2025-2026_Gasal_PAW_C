<?php
include 'koneksi.php';

// 1. Pastikan ada ID barang dan supplier_id di URL
if (!isset($_GET['id']) || !isset($_GET['supplier_id'])) {
    echo "<h3>Data tidak lengkap!</h3>";
    exit;
}

$id = (int) $_GET['id'];
$supplier_id = (int) $_GET['supplier_id'];

// 2. Cek apakah barang ini sudah digunakan dalam tabel transaksi_detail
$cek_penggunaan = mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE barang_id = $id");

if (mysqli_num_rows($cek_penggunaan) > 0) {
    // Jika barang terpakai, beri notifikasi dan jangan dihapus
    echo "<script>alert('Barang tidak bisa dihapus karena sudah digunakan dalam transaksi!');
            window.location='index.php?id=$supplier_id';</script>";
    exit;
}

// 3. Jika barang belum digunakan, hapus dari tabel barang
$query = "DELETE FROM barang WHERE id = $id";
$result = mysqli_query($conn, $query);

// 4. Beri notifikasi hasil
if ($result) {
    echo "<script>
            alert('Barang berhasil dihapus.');
            window.location='index.php?id=$supplier_id';
        </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data!');
            window.location='index.php?id=$supplier_id';
        </script>";
}
?>