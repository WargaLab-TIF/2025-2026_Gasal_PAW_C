<?php
session_start();

// Hapus semua session
session_unset();

// Destroy session
session_destroy();

// Redirect ke halaman login
header("Location: login.php");
exit();
?>