<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['login']) || $_SESSION['level'] != 1) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Data User</title>
<style>
table {
    border-collapse: collapse;
    width: 90%;
    margin: 40px auto;
}
table, th, td {
    border: 1px solid #888;
}
th {
    background: #0b5fa4;
    color: white;
    padding: 10px;
}
td {
    padding: 8px;
}
</style>
</head>
<body>

<?php include "navbar.php"; ?>

<h2 style="text-align:center; margin-top:20px;">Data User</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Level</th>
    </tr>

    <?php
    $query = "SELECT * FROM user";
    $result = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $row['id_user']; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td><?= $row['hp']; ?></td>
            <td><?= $row['level']; ?></td>
        </tr>
    <?php endwhile; ?>

</table>

</body>
</html>
