<!DOCTYPE html>
<html>
<head>
    <title>Form Biodata</title>
</head>
<body>

<h2 align="center">Form Input Biodata</h2>

<form method="post" action="">
    <table align="center" cellpadding="5">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td><input type="text" name="nim"></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td><input type="text" name="jurusan"></td>
        </tr>
        <tr>
            <td>Fakultas</td>
            <td><input type="text" name="fakultas"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Tampilkan">
            </td>
        </tr>
    </table>
</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama     = $_POST['nama'];
    $nim      = $_POST['nim'];
    $jurusan  = $_POST['jurusan'];
    $fakultas = $_POST['fakultas'];

    echo "<h2 align='center'>Biodata Mahasiswa</h2>";
    echo "<table border='1' cellspacing='0' cellpadding='8' align='center'>";
    echo "<tr><td><b>Nama</b></td><td>$nama</td></tr>";
    echo "<tr><td><b>NIM</b></td><td>$nim</td></tr>";
    echo "<tr><td><b>Jurusan</b></td><td>$jurusan</td></tr>";
    echo "<tr><td><b>Fakultas</b></td><td>$fakultas</td></tr>";
    echo "</table>";
}
?>

</body>
</html>
