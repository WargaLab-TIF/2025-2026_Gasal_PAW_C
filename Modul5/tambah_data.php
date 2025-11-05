<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Tambah Data Supplier Baru</title>
    </head>
    <body>
        <h2 class="header">Tambah Data Master Supplier Baru</h2>
        <?php
            include "koneksi.php";
            $nama = $telepon = $alamat = "";
            $error_message = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nama = trim($_POST['nama']);
                $telepon = trim($_POST['telepon']);
                $alamat = trim($_POST['alamat']);

                if (empty($nama)) {
                    $error_message .= "Harap isikan Nama.<br>";
                }elseif (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
                    $error_message .= "Nama hanya boleh huruf.<br>";
                }

                if (empty($telepon)) {
                    $error_message .= "Harap isikan telp.<br>";
                }elseif (!preg_match("/^[0-9]+$/", $telepon)) {
                    $error_message .= "Telp hanya boleh angka.<br>";
                }

                if (empty($alamat)) {
                    $error_message .= "Harap isikan alamat.<br>";
                }elseif (!preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9]).+$/", $alamat)) {
                    $error_message .= "Alamat harus mengandung minimal 1 angka dan 1 huruf.<br>";
                }

                if (empty($error_message)) {
                    $query = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telepon', '$alamat')";
                    mysqli_query($koneksi, $query);
                    header("Location: index.php");
                } else {
                    echo "Gagal menyimpan data.";
                }
            }
        ?>
        <form action="" method="post" class="form-container">
            <table>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><input type="text" name="nama" id="nama" placeholder="--Masukkan Nama--" value="<?php echo htmlspecialchars($nama); ?>"></td>
                </tr>
                <tr>
                    <td><label for="telepon">Telp</label></td>
                    <td><input type="text" name="telepon" id="telepon" placeholder="--Masukkan No.telp--" value="<?php echo htmlspecialchars($telepon); ?>"></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td><input type="text" name="alamat" id="alamat" placeholder="--Masukkan Alamat--" value="<?php echo htmlspecialchars($alamat); ?>"></td>
                </tr>
            </table>
            <br>
            <div class="error-message">
                <?php if (!empty($error_message)): ?>
                    <p style="color:red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
            </div>
            <div class="button-group">
                <button type="submit" name="simpan" class="tambah">Simpan</button>
                <button type="button" onclick="kembali()" class="hapus">Batal</button>
            </div>
        </form>

        <script>
            function kembali() {
                window.location = "index.php";
            }
        </script>
    </body>
</html>
