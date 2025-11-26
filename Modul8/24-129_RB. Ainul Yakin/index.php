<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Beranda Penjualan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<style>
    .content {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 80vh;
    width: 200vh;
    margin: 10px;
    padding-top: 80px;
    }

    h1 {
    text-align: center;
    color: #3596B5;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 50vh;
    width: 100vh;
    background-color: #ecf0f1;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.7);
    }
</style>
</head>
<body>
<?php include "navbar.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<div class="content">
    <h1>WELCOME TO DASHBOARD</h1>
</div>
</body>
</html>