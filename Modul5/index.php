<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Data Master Supplier</title>
    </head>
    <body>
        <div class="header-container">
            <h1>Data Master Supplier</h1>
            <button onclick="tambahData()" class="tambah">Tambah Data</button>
        </div>
        
        <table border="1">
            <tr class="row">
                <th>No</th>
                <th>Nama</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Tindakan</th>
            </tr>

            <?php
                include "koneksi.php";
                $hasil = mysqli_query($koneksi, "SELECT * FROM supplier");
                $no = 1;
                while ($show = mysqli_fetch_array($hasil)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $show['nama']; ?></td>
                        <td><?php echo $show['telp']; ?></td>
                        <td><?php echo $show['alamat']; ?></td>
                        <td>
                            <a href="edit_data.php?id=<?php echo $show['id']; ?>"><button class="edit" type="button">Edit</button></a>
                            <a href="hapus.php?id=<?php echo $show['id']; ?>" onclick="return konfirmHapus();"><button class="hapus" type="button">Hapus</button></a>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
        </table>

        <script>
            function tambahData() {
                window.location = "tambah_data.php";
            }

            function konfirmHapus() {
                return confirm("Apakah Anda yakin ingin menghapus data ini?");
            }
        </script>
    </body>
</html>
