<?php
require "koneksi.php";

$info = "";

$transaksiQ = mysqli_query($conn, "SELECT id FROM transaksi");
$barangQ = mysqli_query($conn, "SELECT * FROM barang");

if (isset($_POST['simpan'])) {
    $idT = $_POST['idT'];
    $idB = $_POST['idB'];
    $qty = $_POST['qty'];

    if (!$idT || !$idB || !$qty) {
        $info = "Semua field harus diisi!";
    } else {
        $cek = mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE transaksi_id='$idT' AND barang_id='$idB'");
        if (mysqli_num_rows($cek) > 0) {
            $info = "Barang sudah ada dalam transaksi!";
        } else {
            $getH = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga FROM barang WHERE id='$idB'"));
            $sub = $getH['harga'] * $qty;

            mysqli_query($conn, "INSERT INTO transaksi_detail VALUES('', '$idT', '$idB', '$qty', '$sub')");
            mysqli_query($conn, "UPDATE transaksi SET total=(SELECT SUM(harga) FROM transaksi_detail WHERE transaksi_id='$idT') WHERE id='$idT'");

            $info = "Detail berhasil ditambahkan!";
        }
    }
}
?>
<center>
<h3>Form Tambah Transaksi Detail </h3>

<?php if($info != "") echo $info . "<br><br>"; ?>

<form method="POST">
    <table cellpadding="5">
        <tr>
            <td>ID Transaksi</td>
            <td>
                <select name="idT">
                    <option value="">-- Pilih --</option>
                    <?php while($t = mysqli_fetch_assoc($transaksiQ)) { ?>
                        <option><?= $t['id'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Barang</td>
            <td>
                <select name="idB">
                    <option value="">-- Pilih --</option>
                    <?php while($b = mysqli_fetch_assoc($barangQ)) { ?>
                        <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?> - Rp<?= number_format($b['harga']) ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Qty</td>
            <td><input type="number" name="qty" min="1" required></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="simpan">Simpan</button></td>
        </tr>
    </table>
</form>
</center>