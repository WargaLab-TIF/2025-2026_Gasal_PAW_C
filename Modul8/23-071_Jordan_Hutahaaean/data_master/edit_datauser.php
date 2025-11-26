<?php
include '../koneksi.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    $query = "SELECT * FROM user WHERE id_user = '$id_user'";
    $result = mysqli_query($koneksi, $query);

    if (!$result || mysqli_num_rows($result) == 0) {
        echo "Data user tidak ditemukan!";
        exit;
    }

    $data_user = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $level = $_POST['level'];

    // Enkripsi password jika diubah
    $password_encrypted = $password ? password_hash($password, PASSWORD_DEFAULT) : $data_user['password'];

    $query_update = "UPDATE user 
                     SET username = '$username', 
                         password = '$password_encrypted', 
                         nama_lengkap = '$nama_lengkap', 
                         alamat = '$alamat', 
                         hp = '$hp', 
                         level = '$level' 
                     WHERE id_user = '$id_user'";

    if (mysqli_query($koneksi, $query_update)) {
        header('Location: data_user.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data User</title>
</head>
<body>
<h1>Edit Data User</h1>
<a href="data_user.php">Kembali</a>
<br><br>

<form method="POST">
    <label>Username:</label><br>
    <input type="text" name="username" value="<?= $data_user['username'] ?>" required><br>

    <label>Password:</label><br>
    <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti"><br>

    <label>Nama Lengkap:</label><br>
    <input type="text" name="nama_lengkap" value="<?= $data_user['nama_lengkap'] ?>" required><br>

    <label>Alamat:</label><br>
    <input type="text" name="alamat" value="<?= $data_user['alamat'] ?>"><br>

    <label>HP:</label><br>
    <input type="text" name="hp" value="<?= $data_user['hp'] ?>"><br>

    <label>Level:</label><br>
    <select name="level" required>
        <option value="admin" <?php if ($data_user['level'] == 'admin') echo 'selected'; ?>>Admin</option>
        <option value="kasir" <?php if ($data_user['level'] == 'kasir') echo 'selected'; ?>>Kasir</option>
    </select><br>

    <button type="submit" name="submit">Simpan</button>
</form>
</body>
</html>
