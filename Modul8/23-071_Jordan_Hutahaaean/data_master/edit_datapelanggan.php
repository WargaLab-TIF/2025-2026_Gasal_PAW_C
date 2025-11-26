<?php
require '../koneksi.php'; // Koneksi ke database
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah id dikirim melalui URL
if (!isset($_GET['id'])) {
    header("Location: data_pelanggan.php");
    exit();
}

$id_pelanggan = $_GET['id'];

// Ambil data pelanggan berdasarkan id
$query = "SELECT * FROM pelanggan WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id_pelanggan);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Data pelanggan tidak ditemukan!";
    exit;
}

$data_pelanggan = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

// Proses update data
$error = '';
if (isset($_POST['submit'])) {
    $nama = trim($_POST['nama']);
    $jenis_kelamin = trim($_POST['jenis_kelamin']);
    $telp = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);

    // Validasi nama
    if (empty($nama) || !preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $error .= "Nama tidak boleh kosong dan hanya boleh huruf.<br>";
    }

    // Validasi jenis kelamin
    if (empty($jenis_kelamin) || !in_array($jenis_kelamin, ['L', 'P'])) {
        $error .= "Jenis kelamin harus L (Laki-laki) atau P (Perempuan).<br>";
    }

    // Validasi telepon
    if (empty($telp) || !preg_match("/^08[0-9]{10}$/", $telp)) {
        $error .= "Telepon tidak boleh kosong dan harus sesuai format (08xxxxxxxxxx).<br>";
    }

    // Validasi alamat
    if (empty($alamat)) {
        $error .= "Alamat tidak boleh kosong.<br>";
    }

    if (empty($error)) {
        $query_update = "UPDATE pelanggan SET nama = ?, jenis_kelamin = ?, no_hp = ?, alamat = ? WHERE id = ?";
        $stmt = mysqli_prepare($koneksi, $query_update);
        mysqli_stmt_bind_param($stmt, "ssssi", $nama, $jenis_kelamin, $telp, $alamat, $id_pelanggan);
        if (mysqli_stmt_execute($stmt)) {
            header('Location: data_pelanggan.php');
            exit;
        } else {
            $error .= "Gagal mengupdate data: " . mysqli_error($koneksi);
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pelanggan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Data Pelanggan</h1>
    <a href="data_pelanggan.php">Kembali</a>
    <br><br>

    <?php if ($error): ?>
        <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= htmlspecialchars($data_pelanggan['nama']) ?>" required><br>

        <label>Jenis Kelamin:</label><br>
        <select name="jenis_kelamin" required>
            <option value="L" <?= ($data_pelanggan['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
            <option value="P" <?= ($data_pelanggan['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
        </select><br>

        <label>Telepon:</label><br>
        <input type="text" name="telp" value="<?= htmlspecialchars($data_pelanggan['no_hp']) ?>" required><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required><?= htmlspecialchars($data_pelanggan['alamat']) ?></textarea><br><br>

        <button type="submit" name="submit">Simpan</button>
        <button type="button" onclick="window.location.href='data_pelanggan.php'">Batal</button>
    </form>
</body>
</html>
