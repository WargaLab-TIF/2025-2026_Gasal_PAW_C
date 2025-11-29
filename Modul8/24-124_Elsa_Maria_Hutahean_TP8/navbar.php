<style>
.navbar-custom {
    background: #0b5fa4;
    padding: 12px 20px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: Arial, sans-serif;
}

/* Kiri */
.nav-left {
    display: flex;
    gap: 16px;
    align-items: center;
}

.nav-left a, .nav-right a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.nav-left a:hover,
.nav-right a:hover {
    text-decoration: underline;
}

/* Dropdown */
.dropdown {
    position: relative;
}

.dropdown-toggle {
    cursor: pointer;
    font-weight: bold;
}

.dropdown-menu {
    position: absolute;
    top: 30px;
    left: 0;
    background: white;
    min-width: 160px;
    border-radius: 6px;
    padding: 6px 0;
    display: none;
    box-shadow: 0 6px 16px rgba(0,0,0,0.15);
    z-index: 100;
}

.dropdown-menu a {
    color: #0b5fa4;
    padding: 8px 14px;
    display: block;
    text-decoration: none;
    font-weight: bold;
}

.dropdown-menu a:hover {
    background: #edf6ff;
}

/* Saat dropdown dibuka */
.dropdown.show .dropdown-menu {
    display: block;
}

/* Kanan */
.nav-right {
    font-weight: bold;
}
.nav-right a {
    margin-left: 8px;
}
</style>

<div class="navbar-custom">
    <div class="nav-left">
        <a href="index.php">Sistem Penjualan</a>
        <a href="index.php">Home</a>
        <a href="transaksi.php">Transaksi</a>
        <a href="laporan.php">Laporan</a>

        <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1): ?>
        <div class="dropdown" id="dropdown-master">
            <span class="dropdown-toggle">Data Master ▾</span>

            <div class="dropdown-menu">
                <a href="data_user.php">Data User</a>
                <a href="data_barang.php">Data Barang</a>
                <a href="data_supplier.php">Data Supplier</a>
                <a href="data_pelanggan.php">Data Pelanggan</a>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <div class="nav-right">
        <?= $_SESSION['nama']; ?> |
        <a href="logout.php">Logout</a>
    </div>
</div>

<script>
// klik untuk buka dropdown
document.addEventListener('click', function(e) {
    const dropdown = document.getElementById('dropdown-master');

    if (dropdown.contains(e.target)) {
        dropdown.classList.toggle('show');
    } else {
        dropdown.classList.remove('show');
    }
});
</script>
