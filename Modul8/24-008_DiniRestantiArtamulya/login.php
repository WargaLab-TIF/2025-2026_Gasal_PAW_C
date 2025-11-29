<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<style>
body {
    background: #e9f2f9;
    font-family: Arial, sans-serif;
}

.login-container {
    width: 320px;
    margin: 90px auto;
    padding: 25px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.15);
    text-align: center;
}

.login-container h2 {
    margin-bottom: 20px;
    color: #0b5fa4;
}

.login-container input {
    width: 90%;
    padding: 10px;
    margin-bottom: 12px;
    border-radius: 5px;
    border: 1px solid #aaa;
}

.login-container button {
    width: 95%;
    padding: 10px;
    background: #0b5fa4;
    border: none;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    cursor: pointer;
}

.login-container button:hover {
    background: #094e88;
}
</style>

</head>
<body>

<div class="login-container">
    <h2>Silahkan Login</h2>

    <form action="proses_login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
