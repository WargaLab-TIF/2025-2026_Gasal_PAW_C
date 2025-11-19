<!DOCTYPE html>
<html>
<head>
    <title>Sistem Kasir Sederhana (Tanpa Session)</title>
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f3f6;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 420px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        select, input[type="number"], input[type="submit"], input[type="reset"] {
            width: 100%;
            padding: 8px;
            margin: 6px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"], input[type="reset"] {
            background: #007bff;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: center;
        }
        th {
            background: #007bff;
            color: white;
        }
        .total {
            text-align: center;
            font-size: 20px;
            margin-top: 20px;
            font-weight: bold;
        }
    </style> -->
</head>
<body>
    <h2>Sistem Kasir Sederhana</h2>

    <?php
    // Daftar menu dan harga
    $menu = [
        "Nasi Goreng" => 15000,
        "Mie Goreng" => 12000,
        "Ayam Bakar" => 20000,
        "Es Teh" => 5000,
        "Es Jeruk" => 7000
    ];

    // Ambil data keranjang dari form (hidden input)
    $keranjang = [];
    if (isset($_POST['namaMenu'])) {
        for ($i = 0; $i < count($_POST['namaMenu']); $i++) {
            $keranjang[] = [
                "nama" => $_POST['namaMenu'][$i],
                "harga" => $_POST['hargaMenu'][$i],
                "jumlah" => $_POST['jumlahMenu'][$i],
                "subtotal" => $_POST['subtotalMenu'][$i]
            ];
        }
    }

    // Jika form disubmit untuk menambah item baru
    if (isset($_POST['tambah'])) {
        $pilihan = $_POST['menu'];
        $jumlah = $_POST['jumlah'];
        $harga = $menu[$pilihan];
        $subtotal = $harga * $jumlah;

        // Tambahkan item baru ke keranjang
        $keranjang[] = [
            "nama" => $pilihan,
            "harga" => $harga,
            "jumlah" => $jumlah,
            "subtotal" => $subtotal
        ];
    }

    // Jika tombol "Selesai" ditekan
    if (isset($_POST['selesai'])) {
        $total = 0;
        echo "<table>";
        echo "<tr><th>Nama Menu</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr>";
        foreach ($keranjang as $item) {
            echo "<tr>
                    <td>{$item['nama']}</td>
                    <td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>
                    <td>{$item['jumlah']}</td>
                    <td>Rp " . number_format($item['subtotal'], 0, ',', '.') . "</td>
                  </tr>";
            $total += $item['subtotal'];
        }
        echo "</table>";
        echo "<div class='total'>Total Bayar: Rp " . number_format($total, 0, ',', '.') . "</div>";
        exit; // Hentikan eksekusi setelah menampilkan total
    }
    ?>

    <!-- Form Input Menu -->
    <form method="POST">
        <label for="menu">Pilih Menu:</label>
        <select name="menu" id="menu" >
            <option value="">-- Pilih Menu --</option>
            <?php
            foreach ($menu as $nama => $harga) {
                echo "<option value='$nama'>$nama - Rp " . number_format($harga, 0, ',', '.') . "</option>";
            }
            ?>
        </select>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" min="1" >

        <!-- Hidden input agar data sebelumnya tidak hilang -->
        <?php
        if (!empty($keranjang)) {
            foreach ($keranjang as $item) {
                echo "<input type='hidden' name='namaMenu[]' value='{$item['nama']}'>";
                echo "<input type='hidden' name='hargaMenu[]' value='{$item['harga']}'>";
                echo "<input type='hidden' name='jumlahMenu[]' value='{$item['jumlah']}'>";
                echo "<input type='hidden' name='subtotalMenu[]' value='{$item['subtotal']}'>";
            }
        }
        ?>

        <input type="submit" name="tambah" value="Tambahkan ke Keranjang">
        <input type="submit" name="selesai" value="Selesai & Hitung Total">
        <!-- <input type="reset" value="Reset"> -->
    </form>

    <!-- Tabel Keranjang -->
    <?php
    if (!empty($keranjang)) {
        echo "<table>";
        echo "<tr><th>Nama Menu</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr>";
        foreach ($keranjang as $item) {
            echo "<tr>
                    <td>{$item['nama']}</td>
                    <td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>
                    <td>{$item['jumlah']}</td>
                    <td>Rp " . number_format($item['subtotal'], 0, ',', '.') . "</td>
                  </tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
