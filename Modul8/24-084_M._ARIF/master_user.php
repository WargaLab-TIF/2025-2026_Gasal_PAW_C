<?php
session_start();
if(!isset($_SESSION['nama'])) header("Location: login.php");
if($_SESSION['level'] != 1) die("Akses ditolak!");
include 'koneksi.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-4">
    <h3>Data Master User</h3>
    <a href="user_tambah.php" class="btn btn-primary btn-sm mb-3">Tambah User</a>
    <a href="index.php" class="btn btn-secondary btn-sm mb-3">Kembali</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            $q = mysqli_query($conn, "SELECT * FROM users");
            while($r = mysqli_fetch_assoc($q)){ ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $r['nama'] ?></td>
                    <td><?= $r['username'] ?></td>
                    <td><?= $r['level'] ?></td>
                    <td>
                        <a href="user_edit.php?id=<?= $r['id_user'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="user_hapus.php?id=<?= $r['id_user'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>