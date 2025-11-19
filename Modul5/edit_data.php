<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Edit Data Supplier</title>
    </head>
    <body>
        <h2 class="header">Edit Data Master Supplier</h2>

        <?php
        include "koneksi.php";

        $nama = $telp = $alamat = "";
        $error_message = "";

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM supplier WHERE id = $id";
            $result = mysqli_query($koneksi, $query);
            $data = mysqli_fetch_assoc($result);
            
            $nama = $data['nama'];
            $telp = $data['telp'];
            $alamat = $data['alamat'];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = trim($_POST['nama']);
            $telp = trim($_POST['telepon']);
            $alamat = trim($_POST['alamat']);

            if (empty($nama)) {
                $error_message .= "Harap isikan nama.<br>";
            }elseif (!preg_match("/^[a-zA-Z\s]+$/", $nama)){
                $error_message .= "Nama hanya boleh huruf.<br>";
            }

            if (empty($telp)) {
                $error_message .= "Harap isikan telp.<br>";
            }elseif (!preg_match("/^[0-9]+$/", $telp)) {
                $error_message .= "Telp hanya boleh angka.<br>";                
            }

            if (empty($alamat)) {
                $error_message .= "Harap isikan alamat.<br>";
            }elseif (!preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9]).+$/", $alamat)){
                $error_message .= "Alamat harus mengandung minimal 1 angka dan 1 huruf.<br>";
            }

            if (empty($error_message)) {
                $update = "UPDATE supplier SET nama = '$nama', telp = '$telp', alamat = '$alamat' WHERE id = $id";
                mysqli_query($koneksi, $update);
                header("Location: index.php");
            } else {
                echo "Gagal mengupdate data.";
            }
        }
        ?>

        <form method="POST" action="edit_data.php?id=<?php echo $id; ?>" class="form-container">
            <table>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($nama); ?>" placeholder="--Masukkan Nama--"></td>
                </tr>
                <tr>
                    <td><label for="telepon">Telp</label></td>
                    <td><input type="tel" name="telepon" id="telepon" value="<?php echo htmlspecialchars($telp); ?>" placeholder="--Masukkan No.telp--"></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td><input type="text" name="alamat" id="alamat" value="<?php echo htmlspecialchars($alamat); ?>" placeholder="--Masukkan Alamat--"></td>
                </tr>
            </table>
            <br>
            <div class="error-message">
                <?php if (!empty($error_message)): ?>
                    <p style="color:red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
            </div>

            <div class="button-group">
                <button type="submit" class="tambah">Update</button>
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
