<?php
session_start();

// Cek apakah pengguna sudah login. Jika belum, arahkan kembali ke login.
if (!isset($_SESSION['level'])) {
    header("Location: login.php");
    exit();
}

$level = $_SESSION['level'];
$nama_user = $_SESSION['nama_user'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistem Penjualan</title>
    <style>
        /* Gaya untuk Navigasi (mirip di gambar) */
        .navbar {
            background-color: #2c3e50; /* Warna biru gelap/navy */
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }
        .navbar-brand {
            font-size: 18px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }
        .navbar-menu a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            margin-right: 5px;
            border-radius: 4px;
            transition: background-color 0.2s;
        }
        .navbar-menu a:hover {
            background-color: #34495e;
        }
        .user-info {
            display: flex;
            align-items: center;
        }
        .user-info span {
            margin-right: 15px;
            font-weight: 600;
        }
        .btn-logout {
            color: white;
            text-decoration: none;
            background-color: #e74c3c;
            padding: 6px 12px;
            border-radius: 4px;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>

    <div class="navbar">
        
        <span class="navbar-brand">Sistem Penjualan</span>
        
        <div class="navbar-menu">
            <a href="home.php">Home</a>

            <?php if ($level == 1): // LEVEL 1: Admin ?>
                <a href="data_master.php">Data Master</a>
                <a href="transaksi.php">Transaksi</a>
                <a href="laporan.php">Laporan</a>
            
            <?php elseif ($level == 2): // LEVEL 2: Kasir/User Terbatas ?>
                <a href="transaksi.php">Transaksi</a>
                <a href="laporan.php">Laporan</a>
            <?php endif; ?>
        </div>
        
        <div class="user-info">
            <span><?php echo htmlspecialchars($nama_user); ?></span>
            <a href="logout.php" class="btn-logout">Logout</a>
        </div>
    </div>
    <div class="content">
        <h2>Selamat Datang, <?php echo htmlspecialchars($nama_user); ?>!</h2>
        <p>Anda login sebagai **Level <?php echo $level; ?>**.</p>
    </div>

</body>
</html>