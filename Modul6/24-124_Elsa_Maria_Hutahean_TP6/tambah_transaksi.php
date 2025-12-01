<?php
require "koneksi.php";

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl = $_POST['tgl'];
    $ket = trim($_POST['ket']);
    $pelanggan = $_POST['pelanggan'];
    $user_id = 1;
    $hari_ini = date('Y-m-d');

    if ($tgl < $hari_ini) {
        $pesan = "Tanggal tidak boleh sebelum hari ini!";
    } elseif (strlen($ket) < 3) {
        $pesan = "Keterangan minimal 3 karakter!";
    } elseif (empty($pelanggan)) {
        $pesan = "Pelanggan wajib dipilih!";
    } else {
        $simpan = mysqli_query($conn, "
            INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id, user_id)
            VALUES ('$tgl', '$ket', 0, '$pelanggan', '$user_id')
        ");

        if ($simpan) {
            $pesan = "Transaksi berhasil ditambahkan!";
        } else {
            $pesan = "Gagal menambah data!";
        }
    }
}

$pelangganQ = mysqli_query($conn, "SELECT * FROM pelanggan");
?>
<center>
<h3>Form Tambah Transaksi</h3>

<?php if($pesan != "") echo $pesan . "<br><br>"; ?>

<form method="POST">
    <table cellpadding="5">
        <tr>
            <td>Tanggal</td>
            <td><input type="date" name="tgl" required></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td><input type="text" name="ket" required></td>
        </tr>
        <tr>
            <td>Total</td>
            <td><input type="number" value="0" readonly></td>
        </tr>
        <tr>
            <td>Pelanggan</td>
            <td>
                <select name="pelanggan" required>
                    <option value="">-- Pilih --</option>
                    <?php while($p = mysqli_fetch_assoc($pelangganQ)) { ?>
                        <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit">Simpan</button></td>
        </tr>
    </table>
</form>
</center>