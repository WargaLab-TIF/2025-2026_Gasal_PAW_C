<?php
session_start();
require 'koneksi.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['logged_in'] = true;
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['level'] = $row['level'];

        header("Location: home.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Reset CSS */
        body, h2, p, form, input, button {
            margin: 0;
            padding: 0;
        }

        /* Gaya untuk body */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc); /* Gradien */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-size: cover;
            overflow: hidden;
        }

        /* Gaya untuk kotak formulir */
        form {
            background: rgba(255, 255, 255, 0.9); /* Warna transparan */
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Bayangan */
            width: 350px;
            text-align: center;
            animation: fadeIn 1.5s ease-in-out; /* Animasi muncul */
        }

        /* Gaya judul */
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        /* Gaya untuk input */
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #6a11cb; /* Warna fokus */
        }

        /* Gaya tombol */
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        button:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            transform: scale(1.05); /* Sedikit membesar */
        }

        /* Gaya untuk pesan kesalahan */
        p.error {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* Animasi fade in */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Masukkan username Anda" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
