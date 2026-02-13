<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $waktu_transaksi = $_POST['waktutransaksi'];
    $keterangan = $_POST['keterangan'];
    $total = $_POST['total'];
    $pelanggan_id = $_POST['idpelanggan'];

    $sql = "INSERT INTO transaksi 
        (waktu_transaksi, keterangan, total, pelanggan_id) 
        VALUES ('$waktu_transaksi', '$keterangan', '$total', '$pelanggan_id')";

    $hasil = mysqli_query($koneksi, $sql);

    if ($hasil) {
        header("Location: datatransaksi.php");
    } else {
        echo "Data gagal disimpan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Transaksi</title>
    <link rel="stylesheet" href="style.css">
    <!-- <style>
        h1 { color: #699AC0; }
        button { border: none; padding: 10px 15px; }
        .tambah { border-radius: 3px; background-color: #74BF48; color: white; }
        .batal { border-radius: 3px; background-color: #C32626; color: white; }
        td { padding: 5px; }
        input, .idpelanggan { width: 200px; border-radius: 3px; height: 25px; }
    </style> -->
</head>
<body>
    <h1>Form Data Transaksi</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td><label>Waktu Transaksi</label></td>
                <td><input type="date" name="waktutransaksi" required></td>
            </tr>
            <tr>
                <td><label>Keterangan</label></td>
                <td><input type="text" name="keterangan" required></td>
            </tr>
            <tr>
                <td><label>Total</label></td>
                <td><input type="number" name="total" required></td>
            </tr>
            <tr>
                <td><label>Id Pelanggan</label></td>
                <td>
                    <select name="idpelanggan" class="idpelanggan" required>
                        <option value="" disabled selected>---- Pilih Id Pelanggan ----</option>
                        <?php
                        $query = "SELECT * FROM pelanggan";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_assoc($hasil)) {
                            echo "<option value='{$row['id']}'>{$row['id']} - {$row['nama']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button class="tambah" type="submit" name="submit">Simpan</button>
                    <button class="batal" type="reset">Batal</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>