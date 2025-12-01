<?php
require_once "./koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Cek apakah user adalah admin
$username = $_SESSION['username'];
if ($username !== 'admin') {
    header("Location: home.php");
    exit();
}

// Proses Tambah Data
if (isset($_POST['tambah'])) {
    $nama = htmlspecialchars($_POST['nama_pelanggan']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telepon = htmlspecialchars($_POST['telepon']);
    
    if (tambahPelanggan($nama, $alamat, $telepon)) {
        $success_message = "Data pelanggan berhasil ditambahkan!";
    } else {
        $error_message = "Gagal menambahkan data pelanggan!";
    }
}

// Proses Update Data
if (isset($_POST['update'])) {
    $id = htmlspecialchars($_POST['id']);
    $nama = htmlspecialchars($_POST['nama_pelanggan']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telepon = htmlspecialchars($_POST['telepon']);
    
    if (updatePelanggan($id, $nama, $alamat, $telepon)) {
        $success_message = "Data pelanggan berhasil diupdate!";
    } else {
        $error_message = "Gagal mengupdate data pelanggan!";
    }
}

// Proses Hapus Data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if (hapusPelanggan($id)) {
        $success_message = "Data pelanggan berhasil dihapus!";
    } else {
        $error_message = "Gagal menghapus data pelanggan!";
    }
}

// Ambil semua data pelanggan
$dataPelanggan = getAllPelanggan();

// Untuk mode edit
$editMode = false;
$dataEdit = null;
if (isset($_GET['edit'])) {
    $editMode = true;
    $id_edit = $_GET['edit'];
    $dataEdit = getPelangganById($id_edit);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Data Pelanggan</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Penjualan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data Master
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./barang.php">Data Barang</a></li>
                            <li><a class="dropdown-item" href="./supplier.php">Data Supplier</a></li>
                            <li><a class="dropdown-item" href="./pelanggan.php">Data Pelanggan</a></li>
                            <li><a class="dropdown-item" href="./users.php">Data User</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./transaksi.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./report_transaksi.php">Laporan</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, <?= htmlspecialchars($username); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        <h4 class="h4 bg-primary text-white py-3 ps-4 mb-0">Data Master Pelanggan</h4>
        
        <!-- Alert Messages -->
        <?php if (isset($success_message)): ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <?= $success_message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>
        
        <?php if (isset($error_message)): ?>
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <?= $error_message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>
        
        <!-- Form Tambah/Edit -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title"><?= $editMode ? 'Edit Pelanggan' : 'Tambah Pelanggan' ?></h5>
                <form action="" method="post">
                    <?php if ($editMode): ?>
                    <input type="hidden" name="id" value="<?= $dataEdit['id'] ?>">
                    <?php endif; ?>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" 
                                   value="<?= $editMode ? $dataEdit['nama_pelanggan'] : '' ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control" name="telepon" id="telepon" 
                                   value="<?= $editMode ? $dataEdit['telepon'] : '' ?>" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" required><?= $editMode ? $dataEdit['alamat'] : '' ?></textarea>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <?php if ($editMode): ?>
                        <button type="submit" name="update" class="btn btn-warning">
                            <i class="fas fa-save"></i> Update
                        </button>
                        <a href="pelanggan.php" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                        <?php else: ?>
                        <button type="submit" name="tambah" class="btn btn-success">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> Reset
                        </button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Tabel Data -->
        <div class="card mt-3 mb-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($dataPelanggan) > 0): ?>
                                <?php foreach ($dataPelanggan as $nomor => $pelanggan): ?>
                                <tr>
                                    <td><?= $nomor + 1 ?></td>
                                    <td><?= htmlspecialchars($pelanggan['nama_pelanggan']) ?></td>
                                    <td><?= htmlspecialchars($pelanggan['alamat']) ?></td>
                                    <td><?= htmlspecialchars($pelanggan['telepon']) ?></td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="?edit=<?= $pelanggan['id'] ?>" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="?hapus=<?= $pelanggan['id'] ?>" class="btn btn-sm btn-danger" 
                                               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data pelanggan</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>