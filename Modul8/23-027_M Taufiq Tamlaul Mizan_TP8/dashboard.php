<?php
session_start();

// cek sudah login atau tidak
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
    exit;
}

// Ambil data dari session
$level = $_SESSION['level'];
$nama  = $_SESSION['username'];


if ($level == 1) {
    $judul_sistem = "Sistem Penjualan"; 

    $menu_html = '
        <a href="dashboard.php" class="active">Home</a>
        <a href="#">Data Master</a>
        <a href="#">Transaksi</a>
        <a href="#">Laporan</a>
    ';

} elseif ($level == 2) {
    $judul_sistem = "Sistem Penjualan"; 

    $menu_html = '
        <a href="dashboard.php" class="active">Home</a>
        <a href="#">Transaksi</a>
        <a href="#">Laporan</a>
    ';

} else {
    $judul_sistem = "Sistem";
    $menu_html = '<a href="dashboard.php">Home</a>';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - <?php echo $judul_sistem; ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background: linear-gradient(to bottom, #0d47a1, #1565c0); /* Gradasi Biru Tua */
            height: 50px;
            display: flex;
            align-items: center;
            padding: 0 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            color: white;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 16px;
            margin-right: 30px;
            display: flex;
            align-items: center;
            text-transform: capitalize; 
        }
        
        .navbar-brand::before {
            content: "📄"; 
            margin-right: 8px;
            font-size: 18px;
        }

        .navbar-menu {
            flex-grow: 1;
            display: flex;
        }

        .navbar-menu a {
            color: #e3f2fd; 
            text-decoration: none;
            padding: 15px 15px;
            font-size: 14px;
            transition: background 0.3s;
        }

        .navbar-menu a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .navbar-menu a.active {
            font-weight: bold;
            color: white;
        }

        .navbar-right {
            position: relative;
            cursor: pointer;
            font-size: 14px;
            padding: 15px;
        }

        .navbar-right:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .caret {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: 5px;
            vertical-align: middle;
            border-top: 4px solid white;
            border-right: 4px solid transparent;
            border-left: 4px solid transparent;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 50px;
            background-color: white;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 0 0 4px 4px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 13px;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .navbar-right:hover .dropdown-content {
            display: block;
        }

        .container {
            padding: 20px;
            background-color: white;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <div class="navbar">
        
        <div class="navbar-brand">
            <?php echo $judul_sistem; ?>
        </div>

        <div class="navbar-menu">
            <?php echo $menu_html; ?>
        </div>

        <div class="navbar-right">
            <?php echo $nama; ?> <span class="caret"></span>

            <div class="dropdown-content">
                <a href="logout.php">Logout</a>
            </div>
        </div>

    </div>

    <div class="container">
        <h2>Selamat Datang</h2>
        <p>Anda Login sebagai : <b><?php echo $nama; ?></b></p>
        <p>Hak Akses Level : <?php echo $level; ?></p>
        <hr>
        <p>Silakan pilih menu di atas untuk bekerja.</p>
    </div>

</body>
</html>