<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Gaya dasar untuk navigasi */
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            background-color: #007bff;
        }

        nav ul li {
            position: relative;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            display: block;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #0056b3;
        }

        /* Dropdown menu */
        nav ul li ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #007bff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            z-index: 1000;
        }

        nav ul li ul li {
            width: 200px;
        }

        nav ul li:hover ul {
            display: block;
        }

        nav ul li ul li a {
            padding: 8px 15px;
        }

        nav ul li ul li a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li>
            <a href="#">Data Master</a>
            <ul>
                <li><a href="data_master/data_barang.php">Data Barang</a></li>
                <li><a href="data_master/data_supplier.php">Data Supplier</a></li>
                <li><a href="data_master/data_pelanggan.php">Data Pelanggan</a></li>
                <li><a href="data_master/data_user.php">Data User</a></li>
            </ul>
        </li>
        <li><a href="transaksi.php">Transaksi</a></li>
        <li><a href="laporan.php">Laporan</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></li>
    </ul>
</nav>
</body>
</html>
