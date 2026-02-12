<?php
include('../koneksi.php'); 
if (!isset($_SESSION['logged_in'])) {
    header('Location: ../login.php');
    exit;
}
$query = "SELECT * FROM supplier";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header-container">
        <h2>Data Supplier</h2>
        <a href="../home.php">Kembali</a> 
        <button class="btn-add"><a href="tambah_datasupplier.php">Tambah Data</a></button> 
    </div>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $data['nama'] . "</td>";
            echo "<td>" . $data['telp'] . "</td>";
            echo "<td>" . $data['alamat'] . "</td>";
            echo "<td>
                <button class='btn-edit'><a href='edit_datasupplier.php?id=" . $data['id'] . "'>Edit</a></button>
                <button class='btn-delete'><a href='hapus_supplier.php?id=" . $data['id'] . "'>Hapus</a></button>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
<?php mysqli_close($koneksi); ?>
