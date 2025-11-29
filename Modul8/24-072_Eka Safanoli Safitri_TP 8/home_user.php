<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['level'] != 2) {
    header("Location: login.php");
}
?>
<link rel="stylesheet" href="style.css">
<?php include "navbar.php"; ?>

<h2>Home Kasir</h2>
<p>Selamat datang kasir, silakan lakukan transaksi.</p>

<center><a href="logout.php" class="btn-logout">Logout</a></center>