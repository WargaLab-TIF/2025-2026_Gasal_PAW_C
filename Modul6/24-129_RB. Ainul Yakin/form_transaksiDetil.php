<?php
include'koneksi.php';

if (isset($_POST['submit'])){
    $transaksi_id = $_POST['idtransaksi'];
    $barang_id = $_POST['idbarang'];
    $harga = $_POST['harga'];
    $qty = $_POST['qty'];


    $sql = "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) VALUES ('$transaksi_id', '$barang_id', '$harga', '$qty')";


    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil){
        header ("Location: data_transaksi_detail.php");
    }else {
        echo "data gagal disimpan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form detail transaksi</title>
    <style>
        h1 {
            color:#699AC0;
        }
        button{
            border: none;
            padding: 10px 15px;
        }
        .tambah{
            border-radius: 3px;
            background-color: #74BF48;
            color: white;
        }
        .batal{
            border-radius: 3px;
            background-color: #C32626;
            color: white;
        }
        td{
            padding: 5px;
        }
        input{
            width: 200px;
            border-radius: 3px;
            height:25px ;  
        }
        .idsupplier{
            width: 200px;
            border-radius: 3px;
            height:25px ;  
        }

    </style>
</head>
<body >
    <h1>Form Data Detail Transaksi</h1>
    <form action="" method="post">
        <table style="padding:0px 80px ">
            <tr>
                <td><label>Id Transaksi</label></td>
                <?php 
                $query="SELECT * FROM `transaksi`";
                $hasil = mysqli_query($koneksi, $query);                
                ?>
                <td>
                    <select name="idtransaksi" id="idtransaksi" class="idtransaksi">
                    <option value="" disabled selected>----Pilih Id Transaksi----</option>
                    <?php while ($row = mysqli_fetch_assoc($hasil)) : ?>
                        <option value="<?= $row["id"] ?>"><?= $row["id"] ?></option>
                    <?php endwhile ?>    
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Id Barang</label></td>
                <?php 
                $query="SELECT * FROM `barang`";
                $hasil = mysqli_query($koneksi, $query);                
                ?>
                <td>
                    <select name="idbarang" id="idbarang" class="idbarang">
                    <option value="" disabled selected>----Pilih Id Barang----</option>
                    <?php while ($row = mysqli_fetch_assoc($hasil)) : ?>
                        <option value="<?= $row["id"] ?>"><?= $row["id"] ?></option>
                    <?php endwhile ?>    
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>harga</label></td>
                <td><input type="text" name="harga" placeholder="harga"></td>
            </tr>
            <tr>
                <td><label>qty</label></td>
                <td><input type="text" name="qty" placeholder="qty"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button class="tambah" type="submit" name="submit">Simpan</button>
                    <button class="batal" type="batal" name="batal">Batal</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
