<?php
include('../koneksi.php'); 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$error = '';
$nama = $jenis_kelamin = $telp = $alamat = '';

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
        // Ambil ID terakhir yang ada di tabel pelanggan
        $query = "SELECT MAX(id) AS last_id FROM pelanggan";
        $result = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_assoc($result);
        $last_id = $data['last_id'];

        // Tentukan ID baru berdasarkan ID terakhir yang ada
        $new_id = $last_id + 1;

        // Query untuk memasukkan data pelanggan baru
$query_insert = "INSERT INTO pelanggan (id, nama, jenis_kelamin, no_hp, alamat) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $query_insert);
        mysqli_stmt_bind_param($stmt, "issss", $new_id, $nama, $jenis_kelamin, $telp, $alamat);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header("Location: data_pelanggan.php");
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
    <title>Tambah Data Pelanggan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Data Pelanggan</h2>
    <?php if ($error): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="tambah_datapelanggan.php" method="POST">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>" placeholder="Nama" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="L" <?php echo ($jenis_kelamin == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="P" <?php echo ($jenis_kelamin == 'P') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
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
            <button type="button" class="btn-cancel" onclick="window.location.href='data_pelanggan.php'">Batal</button>
        </div>
    </form>
</body>
</html>
