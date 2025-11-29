<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Data Supplier</title>
<style>
table {
    border-collapse: collapse;
    width: 90%;
    margin: 40px auto;
}
table, th, td {
    border: 1px solid #888;
}
th {
    background: #0b5fa4;
    color: white;
    padding: 10px;
}
td {
    padding: 8px;
}
</style>
</head>
<body>

<?php include "navbar.php"; ?>
<h2>Filter Laporan</h2>


<?php include "../24-124_Elsa Maria Hutahean_TP7/chart.php"; ?>
</body>
</html>

