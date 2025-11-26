<?php
include('../koneksi.php'); 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['logged_in'])) {
    header('Location: ../login.php');
    exit;
}

$query = "SELECT * FROM user";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data User</h2>
    <a href="../home.php">Kembali</a> |
    <button><a href="tambah_datauser.php">Tambah Data</a></button>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Level</th>
            <th>Tindakan</th>
        </tr>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $data['username'] . "</td>";
            echo "<td>" . $data['nama_lengkap'] . "</td>";
            echo "<td>" . $data['alamat'] . "</td>";
            echo "<td>" . $data['hp'] . "</td>";
            echo "<td>" . ucfirst($data['level']) . "</td>";
            echo "<td>
                <button><a href='edit_datauser.php?id_user=" . $data['id_user'] . "'>Edit</a></button>
                <button><a href='hapus_user.php?id_user=" . $data['id_user'] . "' onclick=\"return confirm('Yakin ingin hapus?');\">Hapus</a></button>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
<?php mysqli_close($koneksi); ?>
