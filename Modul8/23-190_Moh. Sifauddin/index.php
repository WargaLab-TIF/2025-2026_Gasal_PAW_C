<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
        }
        .navbar {
            background: #004a99;
            padding: 12px;
            color: white;
            font-size: 18px;
        }
        .menu {
            background: #0066cc;
            padding: 10px;
            color: white;
        }
        .menu a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
            font-weight: bold;
        }
        .right {
            float: right;
        }
    </style>
</head>
<body>

<div class="navbar">
    Sistem Penjualan
</div>

<div class="menu">
    <a href="index.php">Home</a>

    <?php if ($_SESSION['level'] == 'Admin') { ?>
        <a href="#">Data Master</a>
    <?php } ?>

    <a href="#">Transaksi</a>
    <a href="#">Laporan</a>

    <span class="right">Halo, <?= $_SESSION['nama']; ?> | <a href="logout.php" style="color:yellow;">Logout</a></span>
</div>

</body>
</html>
