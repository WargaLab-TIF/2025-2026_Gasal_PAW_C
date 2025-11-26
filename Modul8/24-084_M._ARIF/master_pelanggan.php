<?php
session_start();
if(!isset($_SESSION['nama'])) header("Location: login.php");
include 'koneksi.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-4">
    <h3>Data Master Pelanggan</h3>
    <a href="pelanggan_tambah.php" class="btn btn-primary btn-sm mb-3">Tambah Pelanggan</a>
    <a href="index.php" class="btn btn-secondary btn-sm mb-3">Kembali</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>HP</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            $q = mysqli_query($conn, "SELECT * FROM pelanggan");
            while($r = mysqli_fetch_assoc($q)){ ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $r['nama'] ?></td>
                    <td><?= $r['alamat'] ?></td>
                    <td><?= $r['telp'] ?></td>
                    <td>
                        <a href="pelanggan_edit.php?id=<?= $r['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="pelanggan_hapus.php?id=<?= $r['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pelanggan?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>