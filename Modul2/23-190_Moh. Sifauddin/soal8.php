<?php
// Array warna
$colors = array("red", "green", "blue", "yellow");

// Menampilkan setiap warna dan menggunakan switch-case
foreach ($colors as $value) {
    switch ($value) {
        case "green":
            echo "Your favorite color is green!<br>";
            break;
        default:
            echo "Your favorite color is neither red, blue, nor green!<br>";
            break;
    }
}

// Loop angka 0 sampai 10
for ($x = 0; $x <= 10; $x++) {
    echo "The number is: $x <br>";
}
?>
