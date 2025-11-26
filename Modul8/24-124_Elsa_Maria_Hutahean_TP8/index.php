<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Beranda Penjualan</title>

<style>
.content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70vh;
}

h1 {
    padding: 40px;
    background: #ecf0f1;
    color: #0b5fa4;
    border-radius: 10px;
    box-shadow: 0 0 6px rgba(0,0,0,0.2);
}
</style>

</head>
<body>

<?php include "navbar.php"; ?>

<div class="content">
    <h1>WELCOME TO DASHBOARD</h1>
</div>

</body>
</html>
