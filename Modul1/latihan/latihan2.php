<!DOCTYPE html>
<html>
<head>
    <title>Tugas II - Menu Fungsi PHP</title>
</head>
<body>
<h2>Menu Perhitungan</h2>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>Pilih Fungsi:</label><br>
    <input type="radio" name="menu" value="faktorial" 
        <?php if(isset($_POST['menu']) && $_POST['menu']=="faktorial") echo "checked";?>> Faktorial<br>
    <input type="radio" name="menu" value="fibonacci" 
        <?php if(isset($_POST['menu']) && $_POST['menu']=="fibonacci") echo "checked";?>> Fibonacci<br>
    <input type="radio" name="menu" value="konversi" 
        <?php if(isset($_POST['menu']) && $_POST['menu']=="konversi") echo "checked";?>> Konversi Suhu<br><br>

    <label>Masukkan Angka (C untuk suhu):</label><br>
    <input type="number" name="angka" value="<?php echo isset($_POST['angka']) ? $_POST['angka'] : ''; ?>"><br><br>

    <input type="submit" name="proses" value="Hitung">
</form>

<hr>
<?php
function faktorial($m){
    if ($m == 0) return 1;
    else return $m * faktorial($m-1);
}

function fibonacci($n){
    if ($n == 1 || $n == 2) return 1;
    else return fibonacci($n-1) + fibonacci($n-2);
}

if (isset($_POST['proses'])) {
    $menu = $_POST['menu'];
    $angka = (int)$_POST['angka'];

    if ($menu == "faktorial") {
        echo "<h3>Hasil Faktorial</h3>";
        echo "$angka! = " . faktorial($angka);

    } elseif ($menu == "fibonacci") {
        echo "<h3>Deret Fibonacci</h3>";
        for ($i=1; $i<=$angka; $i++){
            echo fibonacci($i) . " ";
        }

    } elseif ($menu == "konversi") {
        $c = $angka;
        $f = (9/5 * $c) + 32;
        $r = (4/5 * $c);
        $k = 273 + $c;
        echo "<h3>Konversi Suhu dari $c &deg;C</h3>";
        echo "Fahrenheit : $f &deg;F<br>";
        echo "Reamur    : $r &deg;R<br>";
        echo "Kelvin    : $k K<br>";

    } else {
        echo "Silakan pilih menu terlebih dahulu.";
    }
}
?>
</body>
</html>
