<?php
require '../koneksi.php'; // Koneksi ke database
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';
$username = $password = $nama = $alamat = $hp = $level = '';

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password = mysqli_real_escape_string($koneksi, trim($_POST['password']));
    $nama = mysqli_real_escape_string($koneksi, trim($_POST['nama']));
    $alamat = mysqli_real_escape_string($koneksi, trim($_POST['alamat']));
    $hp = mysqli_real_escape_string($koneksi, trim($_POST['hp']));
    $level = mysqli_real_escape_string($koneksi, trim($_POST['level']));

    // Validasi
    if (empty($username) || empty($password) || empty($nama) || empty($level)) {
        $error .= "Semua field wajib diisi.<br>";
    }

    if (empty($error)) {
        // Enkripsi password
        $password_encrypted = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk insert data user (tanpa kolom id_user)
        $query = "INSERT INTO user (username, password, nama, alamat, hp, level) 
                  VALUES ('$username', '$password_encrypted', '$nama', '$alamat', '$hp', '$level')";

        if (mysqli_query($koneksi, $query)) {
            // Data berhasil disimpan
            header("Location: data_user.php");
            exit();
        } else {
            // Query gagal
            $error .= "Gagal menyimpan data. Error: " . mysqli_error($koneksi) . "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
</head>
<body>
    <h2>Tambah Data User</h2>
    <?php if ($error): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="tambah_datauser.php" method="POST">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required>
        </div>
        <div>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($alamat); ?>">
        </div>
        <div>
            <label for="hp">No. HP:</label>
            <input type="text" id="hp" name="hp" value="<?php echo htmlspecialchars($hp); ?>">
        </div>
        <div>
            <label for="level">Level:</label>
            <select id="level" name="level" required>
                <option value="1" <?php if ($level == 1) echo 'selected'; ?>>Admin</option>
                <option value="2" <?php if ($level == 2) echo 'selected'; ?>>User</option>
            </select>
        </div>
        <div>
            <button type="submit" name="submit">Simpan</button>
            <button type="button" onclick="window.location.href='data_user.php'">Batal</button>
        </div>
    </form>
</body>
</html>
