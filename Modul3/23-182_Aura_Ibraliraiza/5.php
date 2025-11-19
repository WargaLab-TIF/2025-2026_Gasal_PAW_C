<?php 
// 3.5.1 Tambahkan 5 data baru dalam array $students! 
$students = array 
( 
        array("Alex", "240401", "0812345678"), 
        array("Bianca", "240402", "0812345687"), 
        array("Candice", "240403", "0812345665"), 
        array("Aril", "240404", "0812345612"), 
        array("Dia", "240405", "0812345634"), 
        array("Uum", "240406", "0812345670"), 
        array("Cilla", "240407", "0812345615"), 
        array("Bastian", "240408", "0812345602"), 
    ); 
    for ($row = 0; $row < 8; $row++) { 
        echo "<p><b>Row number $row</b></p>"; 
        echo "<ul>"; 
         
        for ($col = 0; $col < 3; $col++) { 
            echo "<li>".$students[$row][$col]."</li>"; 
        } 
        echo "</ul>"; 
    } 
    echo "<hr>"; 
    // 3.5.2 Tampilkan data dalam array $students dalam bentuk 
tabel! 
    echo "Bentuk tabelnya adalah: "; 
    echo "<table border='1'>"; 
    echo "<tr>"; 
    echo "<th>Name</th>"; 
    echo "<th>NIM</th>"; 
    echo "<th>Mobile</th>"; 
    echo "</tr>"; 
    for ($row = 0; $row < 8; $row++) { 
    echo "<tr>"; 
    for ($col = 0; $col < 3; $col++) { 
    echo "<td>"; 
    echo $students[$row][$col]; 
    echo "</td>"; 
    } 
    echo "</tr>"; 
    } 
    echo "</table>"; 
?> 
