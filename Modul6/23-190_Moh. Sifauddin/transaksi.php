<?php
include 'koneksi.php';

$waktuTransaksiError = $keteranganError = "";
$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");

if (isset($_POST['pelanggan_id'])) {
    $pelanggan_id = $_POST['pelanggan_id'];
} else {
    $pelanggan_id = null; // Default value if not set
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $waktu_transaksi = $_POST['waktu_transaksi'];
    $keterangan = $_POST['keterangan'];

    $valid = true;

    if (strtotime($waktu_transaksi) < strtotime(date("Y-m-d"))) {
        $waktuTransaksiError = "Tanggal transaksi tidak boleh sebelum hari ini.";
        $valid = false;
    }

    if (strlen($keterangan) < 3) {
        $keteranganError = "Keterangan minimal 3 karakter.";
        $valid = false;
    }

    if ($valid && $pelanggan_id) {
        $query = "INSERT INTO transaksi (waktu_transaksi, keterangan, pelanggan_id) 
                  VALUES ('$waktu_transaksi', '$keterangan', '$pelanggan_id')";
        if (mysqli_query($conn, $query)) {
            echo "<script>
                alert('Transaksi berhasil ditambahkan.');
            </script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <style>
        body {
            background-color: #f5f5f5;
            justify-content: center;
            display: flex;
            margin: 0;
        }

        h2 {
            text-align: center;
        }

        .form-card {    
            width: 100vw;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(1,1,1,0.1);
            display: flex;
            height: 100vh;
        }

        form {
            display: block;
            margin: auto;
            background-color: #ffffff;
            padding: 2rem;
            width: 30vw;
            height: 80vh;
            border-radius: 10px;
        }

        .form {
            margin-bottom: 20px;
        }

        .form label {
            display: block;
            color: #5b5959;
            margin-bottom: 5px;
        }

        .form input {
            width: 100%;
            padding: 10px;
            border: 1px solid black;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
        }

        textarea, select {
            display: block;
            width: 100%;        
            font-size: 1rem;
            padding: 10px 8px;
        }

        .submit {
            width: 100%;
            padding: 10px;
            background-color: #ff00eeff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .submit:hover {
            background-color: #6a196cff;
        }
    </style>
</head>
<body> 
    <div class="form-card">
        <form method="POST">
            <h2>Tambah Data Transaksi</h2>
            <div class="form">
                <label for="waktu_transaksi">Waktu Transaksi</label>
                <input type="date" name="waktu_transaksi" required><br>
                <p class="error-message"><?= $waktuTransaksiError ?></p>
            </div>
            <div class="form">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" placeholder="Masukkan keterangan transaksi" required></textarea><br>
                <p class="error-message"><?= $keteranganError ?></p>
            </div>
            <div class="form">
                <label for="total">Total</label>
                <input type="number" name="total" id="total" value="0" readonly>
            </div>
            <div class="form">
                <label for="pelanggan_id">Pelanggan</label> 
                <select name="pelanggan_id" required>
                    <?php while($row = mysqli_fetch_assoc($pelanggan)) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                    <?php } ?>
                </select><br>
            </div>
            <div>
                <input class="submit" type="submit" value="Tambah Transaksi">
            </div>
        </form>
    </div>
</body>
</html>


<!-- -- 1. Tambahkan Pelanggan ID 11
INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) 
VALUES (11, 'Santi', 'P', '089987654321', 'Bandung');

-- 2. Tambahkan Transaksi ID 11 (milik pelanggan ID 11)
INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) 
VALUES (11, '2025-11-12', 'Pembayaran Tagihan', 95000, 11); -->
