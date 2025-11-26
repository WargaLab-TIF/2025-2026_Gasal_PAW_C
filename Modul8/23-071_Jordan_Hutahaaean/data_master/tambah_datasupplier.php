<?php
require '../koneksi.php'; // Koneksi ke database
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';
$nama = $telp = $alamat = '';

if (isset($_POST['submit'])) {
    $nama = trim($_POST['nama']);
    $telp = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);

    // Validasi nama
    if (empty($nama) || !preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $error .= "Nama tidak boleh kosong dan hanya boleh huruf.<br>";
    }

    // Validasi telepon
    if (empty($telp) || !preg_match("/^08[0-9]{10}+$/", $telp)) {
        $error .= "Telepon tidak boleh kosong dan hanya boleh angka.<br>";
    }

    // Validasi alamat
    if (empty($alamat) || !preg_match("/[a-zA-Z].*[0-9]/", $alamat)) {
        $error .= "Alamat tidak boleh kosong dan harus mengandung minimal 1 huruf dan 1 angka.<br>";
    }

    if (empty($error)) {
        $query = "INSERT INTO supplier (nama, telp, alamat) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "sss", $nama, $telp, $alamat);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header("Location: data_supplier.php");
            exit();
        } else {
            $error .= "Gagal menyimpan data. Silakan coba lagi.<br>";
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
    <title>Tambah Data Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Data Supplier</h2>
    <?php if ($error): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="tambah_datasupplier.php" method="POST">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>" placeholder="Nama" required>
        </div>
        <div class="form-group">
            <label for="telp">Telepon:</label>
            <input type="text" id="telp" name="telp" value="<?php echo htmlspecialchars($telp); ?>" placeholder="No Telepon" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" placeholder="Alamat" required><?php echo htmlspecialchars($alamat); ?></textarea>
        </div>
        <div class="form-buttons">
            <button type="submit" name="submit" class="btn-submit">Simpan</button>
            <button type="button" class="btn-cancel" onclick="window.location.href='data_supplier.php'">Batal</button>
        </div>
    </form>
</body>
</html>
