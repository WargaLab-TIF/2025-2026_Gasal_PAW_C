<?php 
    $height = array("Andy" => "176", "Barry" => "165", "Charlie" => 
"170"); 
    echo "Andy is " . $height["Andy"] . " cm tall."; 
    echo "<hr>"; 
    // 3.3.1 Tambahkan 5 data baru dalam array $height 
    $height["Dea"] = "175"; 
    $height["Uum"] = "160"; 
    $height["Putri"] = "152"; 
    $height["Aril"] = "168"; 
    $height["Retha"] = "150"; 
    echo "Nilai dengan indeks terakhir sekarang adalah: " 
.end($height) . " cm tall<br>"; 
    echo "<hr>"; 
    // 3.3.2 Hapus 1 data tertentu dari array $height 
    unset($height["Retha"]); 
    echo "Nilai dengan indeks terakhir sekarang adalah: " 
.end($height) . " cm tall<br>"; 
    echo "<hr>"; 
    // 3.3.3 Buat array baru dengan nama $weight yang memiliki 3 
buah data 
    $weight = array("Andy" => "60", "Barry" => "70", "Charlie" => 
"75"); 
    echo "Data ke-2 adalah: " . $weight["Barry"] . " kg"; 
?> 
