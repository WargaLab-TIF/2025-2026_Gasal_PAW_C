<?php
session_start(); // WAJIB di awal sebelum HTML

// === Daftar menu dan harga ===
$menu = [
  1 => ["nama" => "Nasi Goreng", "harga" => 10000],
  2 => ["nama" => "Mie Ayam", "harga" => 10000],
  3 => ["nama" => "Ayam Geprek", "harga" =>  10000],
  4 => ["nama" => "Es Teh", "harga" => 3000],
  5 => ["nama" => "Kopi Hitam", "harga" => 7000],
  6 => ["nama" => "Jus Alpukat", "harga" => 5000],
  7 => ["nama" => "Bubur", "harga" => 10000],
  8 => ["nama" => "Air Mineral", "harga" => 3000]
];

// === Buat session keranjang jika belum ada ===
if (!isset($_SESSION['keranjang']) || !is_array($_SESSION['keranjang'])) {
  $_SESSION['keranjang'] = [];
}

// === Reset keranjang jika tombol RESET ditekan ===
if (isset($_POST['reset'])) {
  $_SESSION['keranjang'] = [];
}

// === Jika tombol TAMBAH ditekan ===
if (isset($_POST['tambah'])) {
  $kode = (int) $_POST['kode'];
  $jumlah = (int) $_POST['jumlah'];

  if (isset($menu[$kode]) && $jumlah > 0) {
    $item = $menu[$kode];
    $nama = $item['nama'];
    $harga = $item['harga'];
    $subtotal = $harga * $jumlah;

    // Cek apakah item sudah ada di keranjang
    $found = false;
    foreach ($_SESSION['keranjang'] as &$barang) {
      if ($barang['nama'] === $nama) {
        $barang['jumlah'] += $jumlah;
        $barang['subtotal'] = $barang['harga'] * $barang['jumlah'];
        $found = true;
        break;
      }
    }
    unset($barang);

    // Jika belum ada, tambahkan item baru
    if (!$found) {
      $_SESSION['keranjang'][] = [
        "nama" => $nama,
        "harga" => $harga,
        "jumlah" => $jumlah,
        "subtotal" => $subtotal
      ];
    }
  }
}

// === Jika tombol SELESAI ditekan ===
$struk = "";
if (isset($_POST['selesai'])) {
  if (!empty($_SESSION['keranjang'])) {
    $total = 0;
    $struk .= "<div class='hasil'>
                <h3>🧾 Struk Pembelian</h3>
                <table>
                  <tr><th>Menu</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr>";
    foreach ($_SESSION['keranjang'] as $beli) {
      $struk .= "<tr>
                  <td>{$beli['nama']}</td>
                  <td>Rp " . number_format($beli['harga'], 0, ',', '.') . "</td>
                  <td>{$beli['jumlah']}</td>
                  <td>Rp " . number_format($beli['subtotal'], 0, ',', '.') . "</td>
                </tr>";
      $total += $beli['subtotal'];
    }
    $struk .= "</table>
              <h3>Total Bayar: Rp " . number_format($total, 0, ',', '.') . "</h3>
              <p>Terima kasih telah berbelanja 🙏</p>
              </div>";

    // Reset keranjang setelah selesai
    $_SESSION['keranjang'] = [];
  } else {
    echo "<script>alert('Keranjang masih kosong!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Sistem Kasir Sederhana</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 650px; margin: 40px auto; }
    input, select { padding: 6px; margin: 6px 0; width: 100%; }
    button { margin-top: 10px; padding: 8px 12px; cursor: pointer; border: 1px solid #ccc; border-radius: 6px; background: #f4f4f4; }
    button:hover { background: #ddd; }
    .hasil { background: #f9f9f9; padding: 15px; border-radius: 8px; margin-top: 20px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
    th { background: #eee; }
    h2 { display: flex; align-items: center; gap: 6px; }
  </style>
</head>
<body>

<h2> Sistem Kasir Sederhana</h2>

<!-- Form Pilih Menu -->
<form method="post">
  <label>Pilih Menu:</label>
  <select name="kode" required>
    <option value="">-- Pilih --</option>
    <?php
    foreach ($menu as $kode => $item) {
      echo "<option value='$kode'>{$item['nama']} - Rp " . number_format($item['harga'], 0, ',', '.') . "</option>";
    }
    ?>
  </select>

  <label>Jumlah:</label>
  <input type="number" name="jumlah" min="1" required>

  <button type="submit" name="tambah">Tambah ke Keranjang</button>
  <button type="submit" name="selesai" formnovalidate>Selesai & Hitung Total</button>
  <button type="submit" name="reset" formnovalidate>Reset Keranjang</button>

</form>

<!-- Tampilkan Keranjang Sementara -->
<?php
if (isset($_SESSION['keranjang']) && count($_SESSION['keranjang']) > 0) {
  echo "<div class='hasil'>
          <h3>🛒 Keranjang Belanja</h3>
          <table>
            <tr><th>Menu</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr>";
  $total = 0;
  foreach ($_SESSION['keranjang'] as $beli) {
    echo "<tr>
            <td>{$beli['nama']}</td>
            <td>Rp " . number_format($beli['harga'], 0, ',', '.') . "</td>
            <td>{$beli['jumlah']}</td>
            <td>Rp " . number_format($beli['subtotal'], 0, ',', '.') . "</td>
          </tr>";
    $total += $beli['subtotal'];
  }
  echo "</table>
        <p><strong>Total sementara: Rp " . number_format($total, 0, ',', '.') . "</strong></p>
        </div>";
}

// tampilkan struk jika ada
if (!empty($struk)) {
  echo $struk;
}
?>

</body>
</html>
