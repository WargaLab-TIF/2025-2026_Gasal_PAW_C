<?php
// Konfigurasi Database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_penjualan');

// Koneksi ke Database
$koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Cek Koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Konstanta untuk koneksi (digunakan di beberapa file)
define('DB', $koneksi);

// ==================== FUNGSI TRANSAKSI ====================

function getAllDataTransaksi() {
    $query = "SELECT * FROM transaksi ORDER BY waktu_transaksi DESC";
    $result = mysqli_query(DB, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    return $data;
}

function getDataTransaksiByDate($start, $end) {
    $query = "SELECT * FROM transaksi 
              WHERE waktu_transaksi BETWEEN '$start' AND '$end' 
              ORDER BY waktu_transaksi ASC";
    $result = mysqli_query(DB, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    return $data;
}

function getDetailTransaksi($id_transaksi) {
    $query = "SELECT dt.*, b.nama_barang, b.kode_barang 
              FROM detail_transaksi dt
              JOIN barang b ON dt.id_barang = b.id
              WHERE dt.id_transaksi = '$id_transaksi'";
    $result = mysqli_query(DB, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    return $data;
}

// ==================== FUNGSI BARANG ====================

function getAllBarang() {
    $query = "SELECT b.*, s.nama_supplier 
              FROM barang b 
              LEFT JOIN supplier s ON b.id_supplier = s.id 
              ORDER BY b.id DESC";
    $result = mysqli_query(DB, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    return $data;
}

function getBarangById($id) {
    $query = "SELECT * FROM barang WHERE id = '$id'";
    $result = mysqli_query(DB, $query);
    return mysqli_fetch_assoc($result);
}

function tambahBarang($kode, $nama, $harga, $stok, $id_supplier) {
    $query = "INSERT INTO barang (kode_barang, nama_barang, harga, stok, id_supplier) 
              VALUES ('$kode', '$nama', '$harga', '$stok', '$id_supplier')";
    return mysqli_query(DB, $query);
}

function updateBarang($id, $kode, $nama, $harga, $stok, $id_supplier) {
    $query = "UPDATE barang SET 
              kode_barang = '$kode',
              nama_barang = '$nama',
              harga = '$harga',
              stok = '$stok',
              id_supplier = '$id_supplier'
              WHERE id = '$id'";
    return mysqli_query(DB, $query);
}

function hapusBarang($id) {
    $query = "DELETE FROM barang WHERE id = '$id'";
    return mysqli_query(DB, $query);
}

// ==================== FUNGSI SUPPLIER ====================

function getAllSupplier() {
    $query = "SELECT * FROM supplier ORDER BY id DESC";
    $result = mysqli_query(DB, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    return $data;
}

function getSupplierById($id) {
    $query = "SELECT * FROM supplier WHERE id = '$id'";
    $result = mysqli_query(DB, $query);
    return mysqli_fetch_assoc($result);
}

function tambahSupplier($nama, $alamat, $telepon) {
    $query = "INSERT INTO supplier (nama_supplier, alamat, telepon) 
              VALUES ('$nama', '$alamat', '$telepon')";
    return mysqli_query(DB, $query);
}

function updateSupplier($id, $nama, $alamat, $telepon) {
    $query = "UPDATE supplier SET 
              nama_supplier = '$nama',
              alamat = '$alamat',
              telepon = '$telepon'
              WHERE id = '$id'";
    return mysqli_query(DB, $query);
}

function hapusSupplier($id) {
    $query = "DELETE FROM supplier WHERE id = '$id'";
    return mysqli_query(DB, $query);
}

// ==================== FUNGSI PELANGGAN ====================

function getAllPelanggan() {
    $query = "SELECT * FROM pelanggan ORDER BY id DESC";
    $result = mysqli_query(DB, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    return $data;
}

function getPelangganById($id) {
    $query = "SELECT * FROM pelanggan WHERE id = '$id'";
    $result = mysqli_query(DB, $query);
    return mysqli_fetch_assoc($result);
}

function tambahPelanggan($nama, $alamat, $telepon) {
    $query = "INSERT INTO pelanggan (nama_pelanggan, alamat, telepon) 
              VALUES ('$nama', '$alamat', '$telepon')";
    return mysqli_query(DB, $query);
}

function updatePelanggan($id, $nama, $alamat, $telepon) {
    $query = "UPDATE pelanggan SET 
              nama_pelanggan = '$nama',
              alamat = '$alamat',
              telepon = '$telepon'
              WHERE id = '$id'";
    return mysqli_query(DB, $query);
}

function hapusPelanggan($id) {
    $query = "DELETE FROM pelanggan WHERE id = '$id'";
    return mysqli_query(DB, $query);
}

// ==================== FUNGSI USERS ====================

function getAllUsers() {
    $query = "SELECT * FROM users ORDER BY id DESC";
    $result = mysqli_query(DB, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    return $data;
}

function getUserById($id) {
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query(DB, $query);
    return mysqli_fetch_assoc($result);
}

function tambahUser($username, $password, $role) {
    $password_hash = md5($password);
    $query = "INSERT INTO users (username, password, role) 
              VALUES ('$username', '$password_hash', '$role')";
    return mysqli_query(DB, $query);
}

function updateUser($id, $username, $password, $role) {
    if (!empty($password)) {
        $password_hash = md5($password);
        $query = "UPDATE users SET 
                  username = '$username',
                  password = '$password_hash',
                  role = '$role'
                  WHERE id = '$id'";
    } else {
        $query = "UPDATE users SET 
                  username = '$username',
                  role = '$role'
                  WHERE id = '$id'";
    }
    return mysqli_query(DB, $query);
}

function hapusUser($id) {
    $query = "DELETE FROM users WHERE id = '$id'";
    return mysqli_query(DB, $query);
}

// ==================== FUNGSI GENERATE ID TRANSAKSI ====================

function generateIdTransaksi() {
    $query = "SELECT id FROM transaksi ORDER BY id DESC LIMIT 1";
    $result = mysqli_query(DB, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $lastId = $row['id'];
        $number = (int) substr($lastId, 3);
        $newNumber = $number + 1;
        $newId = 'TRX' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    } else {
        $newId = 'TRX001';
    }
    
    return $newId;
}

?>