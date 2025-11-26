
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navbar Penjualan</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style1.css">

</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
    <a class="navbar-brand" href="index.php">SISTEM PENJUALAN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="data_transaksi.php">Transaksi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="filter.php">Laporan</a>
        </li>

        <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1) : ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Data Master
            </a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="data_user.php">Data User</a></li>
            <li><a class="dropdown-item" href="data_barang.php">Data Barang</a></li>
            <li><a class="dropdown-item" href="data_supplier.php">Data Supplier</a></li>
            <li><a class="dropdown-item" href="data_pelanggan.php">Data Pelanggan</a></li>
            </ul>
        </li>
        <?php endif; ?>
        </ul>

        <ul class="nav justify-content-end">
        <div class="d-flex justify-content-end">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                <?php if (isset($_SESSION['nama'])) { echo $_SESSION['nama']; } ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="proses_logout.php">Logout</a></li>
            </ul>
            </li>
        </div>
        </ul>
    </div>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>