<?php
function sum ($x, $y) { // sum() utk mengembalikan return nilai,
                //  jdi bs pakai operasi lain (*,+) atau disimpan ke variabel
                
    $z = $x + $y;   // sum($x, $y) menerima 2 angka, 
    return $z;      // menjumlahkanya lalu return hasilnya
}

echo "5 + 10 = " . sum (5, 10) . "<br>";    // saat dipanggil hasilnya 15
echo "7 + 13 = " . sum (7, 13) . "<br>";    // 20
echo "2 + 4 = " . sum (2, 4);               // 6
?>