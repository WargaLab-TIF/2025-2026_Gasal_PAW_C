<?php
    define('DB', mysqli_connect("localhost", 'root', '', 'store'));

    function getAllDataTransaksi() {
        $query = "SELECT transaksi.id, transaksi.waktu_transaksi, pelanggan.nama as nama_pelanggan, transaksi.keterangan, transaksi.total FROM transaksi JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id";
        return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
    }

    function getDataTransaksiByDate($start, $end) {
        $query = "SELECT total, waktu_transaksi, MONTH(waktu_transaksi) FROM transaksi WHERE waktu_transaksi >= '$start' AND waktu_transaksi <= '$end' ORDER BY waktu_transaksi ASC";
        return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
    }

    function getDataDetailById($id) {
        $query = "SELECT dt.transaksi_id, dt.harga, dt.qty, barang.nama_barang as nama FROM transaksi_detail as dt JOIN barang ON dt.barang_id = barang.id WHERE dt.transaksi_id = '$id'";
        return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
    }



    function getAllDataSupplier(){
        $query = "SELECT * FROM supplier";
        return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
    }
    function getAllDataBarang(){
        $query = "SELECT barang.id, barang.kode_barang, barang.nama_barang, barang.harga, barang.stok, supplier.nama FROM barang JOIN supplier ON barang.supplier_id = supplier.id";
        return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
    }
?>