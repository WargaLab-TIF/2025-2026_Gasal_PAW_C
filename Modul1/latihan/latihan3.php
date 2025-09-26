<!DOCTYPE html>
<html>
<head>
    <title>Pemilihan Tampilan Text</title>
</head>
<body>
<h1>Pemilihan Tampilan Text</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <table>
        <tr>
            <td>Teks :</td>
            <td>
                <input type="text" name="teks" placeholder="Mingyu"
                    value="<?php echo isset($_POST['teks']) ? $_POST['teks'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td>Ditampilkan sebanyak :</td>
            <td>
                <select name="jumlah">
                    <option value="5"  <?php if(isset($_POST['jumlah']) && $_POST['jumlah']==5) echo 'selected';?>>5</option>
                    <option value="10" <?php if(isset($_POST['jumlah']) && $_POST['jumlah']==10) echo 'selected';?>>10</option>
                    <option value="15" <?php if(isset($_POST['jumlah']) && $_POST['jumlah']==15) echo 'selected';?>>15</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Lakukan :</td>
            <td>
                <input type="radio" name="aksi" value="break" 
                    <?php if(isset($_POST['aksi']) && $_POST['aksi']=="break") echo "checked";?>> Break
                <input type="radio" name="aksi" value="continue"
                    <?php if(isset($_POST['aksi']) && $_POST['aksi']=="continue") echo "checked";?>> Continue
            </td>
        </tr>
        <tr>
            <td>Pada Hitungan ke :</td>
            <td>
                <select name="hitungan">
                    <?php
                    for($i=1;$i<=15;$i++){
                        $sel = (isset($_POST['hitungan']) && $_POST['hitungan']==$i) ? "selected":"";
                        echo "<option value='$i' $sel>$i</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="proses" value="Proses"></td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['proses'])) {
    $teks     = $_POST['teks'];
    $jumlah   = (int)$_POST['jumlah'];
    $aksi     = $_POST['aksi'];
    $hitungan = (int)$_POST['hitungan'];

    echo "<hr>";
    for ($i = 1; $i <= $jumlah; $i++) {
        if ($i == $hitungan) {
            if ($aksi == "break") {
                echo "hitungan ke-$i : break<br>";
                break;
            } elseif ($aksi == "continue") {
                echo "hitungan ke-$i : continue<br>";
                continue;
            }
        }
        echo "hitungan ke-$i : $teks<br>";
    }
}
?>
</body>
</html>
