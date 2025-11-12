<?php
include 'koneksi.php';

// Validasi input
$id_transaksi   = isset($_POST['id_transaksi']) ? (int)$_POST['id_transaksi'] : 0;
$id_barang      = isset($_POST['id_barang']) ? (int)$_POST['id_barang'] : 0;
$jumlah_barang  = isset($_POST['jumlah_barang']) ? (int)$_POST['jumlah_barang'] : 0;

if ($id_transaksi <= 0 || $id_barang <= 0 || $jumlah_barang <= 0) {
    die("❌ Data tidak lengkap. Pastikan semua input terisi.");
}

// Cek apakah barang sudah dipakai di transaksi ini
$sql_cek = "SELECT COUNT(*) AS total FROM transaksi_detail 
            WHERE transaksi_id = $id_transaksi AND barang_id = $id_barang";
$result_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_assoc($result_cek);

if ($data_cek['total'] > 0) {
    die("❌ Barang sudah ditambahkan ke transaksi ini.");
}

// Ambil harga barang
$sql_harga = "SELECT harga FROM barang WHERE barang_id = $id_barang";
$result_harga = mysqli_query($koneksi, $sql_harga);
$data_harga   = mysqli_fetch_assoc($result_harga);

if (!$data_harga) {
    die("❌ Barang tidak ditemukan.");
}

$harga_satuan = $data_harga['harga'];

// Simpan ke transaksi_detail
$sql_insert = "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty)
               VALUES ($id_transaksi, $id_barang, $harga_satuan, $jumlah_barang)";
if (!mysqli_query($koneksi, $sql_insert)) {
    die("❌ Gagal menyimpan detail: " . mysqli_error($koneksi));
}

// Update total transaksi
$sql_update = "UPDATE transaksi SET total = (
                  SELECT SUM(harga * qty) FROM transaksi_detail WHERE transaksi_id = $id_transaksi
              ) WHERE transaksi_id = $id_transaksi";
if (!mysqli_query($koneksi, $sql_update)) {
    die("❌ Gagal update total: " . mysqli_error($koneksi));
}

// Redirect balik ke form
header("Location: form_transaksi_detail.php?transaksi_id=$id_transaksi");
exit;
?>