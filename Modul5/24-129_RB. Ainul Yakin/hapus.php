<?php
include 'koneksi.php';

$id = $_GET['id'];
$mysqli->query("DELETE FROM supplier WHERE id = $id");
header("Location: index.php");
?>