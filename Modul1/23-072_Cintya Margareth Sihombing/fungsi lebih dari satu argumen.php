<?php
function familyName ($fname, $year) {   // fungsi bernama familyname
                    // dua parameter yaitu $fname (nama depan) dan $year (tahun lahir)
    echo "$fname Refsnes. Born in $year <br>";
    // menampilkan kombinasi nama depan + kata Refsnes + tahn lahir 
}

familyName ("Hege", "1975"); // menghasilkan Hege Refsnes, Born in 1975
familyName ("Stale", "1978");
familyName ("Kai Jim", "1983");
?>