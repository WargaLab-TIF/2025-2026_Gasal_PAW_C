<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['level'] != 1) {
    header("Location: login.php");
}
?>
<link rel="stylesheet" href="style.css">
<?php include "navbar.php"; ?>

<h2>Home Admin</h2>
<p>Selamat datang admin, Anda memiliki akses penuh.</p>

<center><a href="logout.php" class="btn-logout">Logout</a></center>