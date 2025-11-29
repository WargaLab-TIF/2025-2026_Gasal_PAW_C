<div class="navbar">

    <div class="nav-left">
        <b>Sistem Penjualan</b>

        <?php if ($_SESSION['level'] == 1) { ?>
            <a href="home_admin.php">Home</a>
            <a href="data_master.php">Data Master</a>
            <a href="transaksi.php">Transaksi</a>
            <a href="laporan.php">Laporan</a>

        <?php } else { ?>
            <a href="home_user.php">Home</a>
            <a href="transaksi.php">Transaksi</a>
            <a href="laporan.php">Laporan</a>
        <?php } ?>
    </div>

    <div class="nav-right">
        <?php echo $_SESSION['username']; ?>
    </div>

</div>