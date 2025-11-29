<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Halaman Login</h2>

<form method="POST" action="proses_login.php">
    <label>Username :</label><br>
    <input type="text" name="username"><br><br>

    <label>Password :</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit" class="btn-login">Login</button>
</form>
</body>
</html>