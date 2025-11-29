<?php
include 'konek.php';

$id = $_GET['id'];
$sql = "SELECT * FROM transaksi_detail WHERE barang_id=$id";
$transaksi_detail = $conn->query($sql);

if ($transaksi_detail->num_rows > 0) {
    echo "
    <script>
        alert('Barang tidak dapat dihapus karena digunakan dalam transaksi detail');
        window.location.href = '/22-049_Fendi%20Eka%20Saputra_TP6/index.php';
    </script>
    ";
    // header('Location: index.php');
    // exit();
} else {
    $sql = "DELETE FROM barang WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}



?>