<?php
include 'koneksi.php';

function cekBarang($koneksi, $id_barang) {
    $query = "SELECT COUNT(*) FROM transaksi_detail WHERE barang_id = $id_barang";
    $result = mysqli_query($koneksi, $query);
    $count = mysqli_fetch_row($result)[0];
    return $count > 0;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_barang"])) {
        $id_barang = $_GET["id_barang"];

        if (cekBarang($koneksi, $id_barang)) {
            echo '<script>
                alert("ID barang ini digunakan dalam tabel transaksi detil.");
                window.location.href = "databarang.php";
            </script>';
        } else {
            $query = "DELETE FROM barang WHERE id = $id_barang";
            if (mysqli_query($koneksi, $query)) {
                echo '<script>
                    alert("Barang berhasil dihapus.");
                    window.location.href = "databarang.php";
                </script>';
            } else {
                echo '<script>
                    alert("Barang gagal dihapus.");
                    window.location.href = "databarang.php";
                </script>';
            }
        }
    }
}
?>
