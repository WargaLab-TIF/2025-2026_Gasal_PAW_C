<?php
// 1. Definisikan Menu dan Harga
$menu = [
    1 => 15000, // Kode 1: Nasi Goreng
    2 => 12000, // Kode 2: Mie Ayam
    3 => 5000,  // Kode 3: Es Teh
    4 => 7000   // Kode 4: Es Jeruk
];
$nama_menu = [
    1 => 'Nasi Goreng',
    2 => 'Mie Ayam',
    3 => 'Es Teh',
    4 => 'Es Jeruk'
];

// 2. Inisialisasi Total Harga
$total_harga = 0;
$pesanan_sebelumnya_teks = ""; // Variabel untuk menyimpan riwayat pesanan
$pesanan_sebelumnya_harga = 0; // Variabel untuk menyimpan harga riwayat pesanan

// 3. Cek data POST (Data dikirim saat tombol "Tambahkan" ditekan)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari hidden field untuk melanjutkan transaksi (simulasi perulangan)
    $pesanan_sebelumnya_teks = isset($_POST['riwayat_pesanan']) ? $_POST['riwayat_pesanan'] : "";
    $pesanan_sebelumnya_harga = isset($_POST['total_sebelumnya']) ? (int)$_POST['total_sebelumnya'] : 0;

    // Tambahkan harga sebelumnya ke total saat ini
    $total_harga = $pesanan_sebelumnya_harga;
    
    // Ambil input menu dan jumlah
    $pilihan_kode = isset($_POST['pilihan_menu']) ? (int)$_POST['pilihan_menu'] : 0;
    $jumlah = isset($_POST['jumlah']) ? (int)$_POST['jumlah'] : 0;

    // 4. Logika IF/ELSE untuk Validasi dan Perhitungan
    // Cek apakah kode menu valid (menggunakan array_key_exists atau if)
    if (array_key_exists($pilihan_kode, $menu) && $jumlah > 0) {
        $harga_satuan = $menu[$pilihan_kode];
        $nama = $nama_menu[$pilihan_kode];
        $subtotal = $harga_satuan * $jumlah;

        // Hitung total harga
        $total_harga = $total_harga + $subtotal; 
        
        // Simpan rincian pesanan saat ini ke riwayat
        $rincian_pesanan = $nama . " (" . $jumlah . "x) = Rp " . number_format($subtotal, 0, ',', '.') . "\n";
        $pesanan_sebelumnya_teks .= $rincian_pesanan;

    } else {
        // Tampilkan pesan error jika input tidak valid, tapi hanya jika ada input yang dikirim
        if ($pilihan_kode > 0 || $jumlah > 0) {
            echo "<script>alert('Kode menu atau jumlah tidak valid! Silakan cek daftar menu.');</script>";
        }
    }
}
// 5. Tampilkan Halaman HTML dan Formulir
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kasir Sederhana - Praktikum</title>
</head>
<body>

    <h1>Program Kasir Sederhana</h1>
    <hr>

    <h2>Daftar Menu</h2>
    <p>
        1. Nasi Goreng: Rp 15.000 <br>
        2. Mie Ayam: Rp 12.000 <br>
        3. Es Teh: Rp 5.000 <br>
        4. Es Jeruk: Rp 7.000
    </p>

    <hr>

    <h2>Input Pesanan</h2>
    <form method="POST" action="">
        <input type="hidden" name="riwayat_pesanan" value="<?php echo htmlspecialchars($pesanan_sebelumnya_teks); ?>">
        <input type="hidden" name="total_sebelumnya" value="<?php echo $total_harga; ?>">

        <label for="pilihan_menu">Kode Menu (1-4):</label><br>
        <input type="number" id="pilihan_menu" name="pilihan_menu" min="1" max="4" required><br><br>
        
        <label for="jumlah">Jumlah Beli:</label><br>
        <input type="number" id="jumlah" name="jumlah" min="1" required><br><br>
        
        <input type="submit" value="Tambahkan Item Pesanan">
    </form>
    
    <hr>

    <h2>Rincian & Total Harga</h2>
    <?php if (!empty($pesanan_sebelumnya_teks)): ?>
        <pre><?php echo $pesanan_sebelumnya_teks; ?></pre>
        <p>-----------------------------------------------------</p>
        <h3>Total Akhir yang Harus Dibayar: 
            <strong>Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></strong>
        </h3>
    <?php else: ?>
        <p>Belum ada item yang dipesan. Silakan masukkan pesanan Anda di atas.</p>
    <?php endif; ?>

</body>
</html>