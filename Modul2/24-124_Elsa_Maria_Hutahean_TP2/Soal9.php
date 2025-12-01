<!DOCTYPE html>
<html>
<head>
    <title>Penentuan Grade Nilai Mahasiswa</title>
</head>
<body>

<h2 align="center">Program Penentuan Grade Nilai Mahasiswa</h2>

<form method="post" action="">
    <table align="center" cellpadding="5">
        <tr>
            <td>Masukkan Nilai Anda:</td>
            <td><input type="number" name="nilai" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Lihat Grade"></td>
        </tr>
    </table>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = $_POST["nilai"];
    
    if ($nilai >= 85) {
        $grade = "A";
    } elseif ($nilai >= 75) {
        $grade = "B";
    } elseif ($nilai >= 60) {
        $grade = "C";
    } elseif ($nilai >= 50) {
        $grade = "D";
    } else {
        $grade = "E";
    }

    echo "<h3 align='center'>Nilai Anda: $nilai <br> Grade: $grade</h3>";
}
?>

</body>
</html>
