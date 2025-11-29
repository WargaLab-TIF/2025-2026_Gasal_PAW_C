<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
    <body>
        <?php
        session_start();

    // Jika sudah login, langsung ke index
    if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
        header("Location: index.php");
        exit;
    }
        ?>
        <div class="container">
            <div id="registrasi-form">
            <h2>Silahkan Login</h2>
            <form action="proses_login.php" method="post">
                <label for="username" class="login-username">Username</label>
                <br>
                <input type="text" id="username" name="username" placeholder="Username" class="username" required>
                <br><br>
                <label for="password" class="login-password">Password</label>
                <br>
                <input type="password" id="password" name="password" placeholder="Password" class="password" required>
                <br><br>
                <button type="submit" class="submit">Login</button>
            </form>
            </div>
        </div>
    </body>
</html>