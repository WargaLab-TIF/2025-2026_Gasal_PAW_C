<?php
require 'koneksi.php';

$id_transaksi = $_GET['id'] ?? null;

if (!$id_transaksi) {
    die("ID Transaksi tidak ditemukan.");
}

// Ambil data transaksi
$stmt = $pdo->prepare("SELECT * FROM transaksi WHERE id_transaksi = ?");
$stmt->execute([$id_transaksi]);
$transaksi = $stmt->fetch();

if (!$transaksi) {
    die("Transaksi tidak ditemukan.");
}

// Ambil barang yang SUDAH ada di transaksi ini
$stmt_ada = $pdo->prepare("SELECT id_barang FROM transaksi_detail WHERE id_transaksi = ?");
$stmt_ada->execute([$id_transaksi]);
$barang_ada = $stmt_ada->fetchAll(PDO::FETCH_COLUMN);

// Ambil semua barang
$stmt_barang = $pdo->query("SELECT id_barang, nama_barang, harga FROM barang");
$semua_barang = $stmt_barang->fetchAll();

// Filter barang yang belum ada
$barang_tersedia = [];
foreach ($semua_barang as $b) {
    if (!in_array($b['id_barang'], $barang_ada)) {
        $barang_tersedia[] = $b;
    }
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_barang'])) {
    $id_barang = $_POST['id_barang'];
    $jumlah = (int)$_POST['jumlah'];

    // Ambil harga barang
    $stmt_harga = $pdo->prepare("SELECT harga FROM barang WHERE id_barang = ?");
    $stmt_harga->execute([$id_barang]);
    $harga = $stmt_harga->fetchColumn();

    $subtotal = $jumlah * $harga;

    // Simpan ke transaksi_detail
    $stmt_simpan = $pdo->prepare("
        INSERT INTO transaksi_detail (id_transaksi, id_barang, jumlah, subtotal) 
        VALUES (?, ?, ?, ?)
    ");
    $stmt_simpan->execute([$id_transaksi, $id_barang, $jumlah, $subtotal]);

    header("Location: detail_transaksi.php?id=" . $id_transaksi . "&msg=Barang%20berhasil%20ditambahkan");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Transaksi #<?= htmlspecialchars($id_transaksi) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Detail Transaksi #<?= htmlspecialchars($id_transaksi) ?></h2>
    <p>Tanggal: <?= htmlspecialchars($transaksi['tanggal']) ?></p>
    <p>Total: Rp <?= number_format($transaksi['total'], 0, ',', '.') ?></p>

    <h3>Tambah Barang</h3>
    <?php if (empty($barang_tersedia)): ?>
        <p style="color: red;">Semua barang sudah ditambahkan ke transaksi ini.</p>
    <?php else: ?>
        <form method="POST">
            <label>Barang:</label>
            <select name="id_barang" required>
                <option value="">-- Pilih Barang --</option>
                <?php foreach ($barang_tersedia as $b): ?>
                    <option value="<?= $b['id_barang'] ?>">
                        <?= htmlspecialchars($b['nama_barang']) ?> (Rp <?= number_format($b['harga'], 0, ',', '.') ?>)
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <label>Jumlah:</label>
            <input type="number" name="jumlah" min="1" value="1" required><br><br>

            <button type="submit">Tambahkan ke Transaksi</button>
        </form>
    <?php endif; ?>

    <h3>Daftar Barang dalam Transaksi</h3>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt_detil = $pdo->prepare("
                SELECT td.*, b.nama_barang, b.harga 
                FROM transaksi_detail td 
                JOIN barang b ON td.id_barang = b.id_barang 
                WHERE td.id_transaksi = ?
            ");
            $stmt_detil->execute([$id_transaksi]);
            while ($detil = $stmt_detil->fetch()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($detil['nama_barang']) . "</td>";
                echo "<td>Rp " . number_format($detil['harga'], 0, ',', '.') . "</td>";
                echo "<td>" . htmlspecialchars($detil['jumlah']) . "</td>";
                echo "<td>Rp " . number_format($detil['subtotal'], 0, ',', '.') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <br><a href="index.php">Kembali ke Daftar Transaksi</a>
</body>
</html>