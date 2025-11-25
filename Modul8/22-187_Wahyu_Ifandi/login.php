<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Sistem Penjualan</title>
    <style>
        body {
            background-color: #f0f2f5; /* Latar belakang abu-abu muda */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        .login-title {
            color: #4a90e2; /* Biru terang untuk judul */
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 500;
        }
        .form-control {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #007bff; /* Biru utama untuk tombol */
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            /* Memberi efek gradien halus agar mirip gambar */
            background-image: linear-gradient(to top, #007bff, #2e90ff); 
            box-shadow: 0 2px 4px rgba(0, 123, 255, 0.4);
        }
        .btn-login:hover {
            background-color: #0056b3;
            background-image: linear-gradient(to top, #0056b3, #007bff);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="login-title">Login Admin</h2>
        <form action="proses_login.php" method="POST">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</body>
</html>