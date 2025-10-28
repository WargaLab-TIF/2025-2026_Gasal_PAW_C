<!DOCTYPE html>
<html>
<body>

<?php
$color = "red";     // membuat variabel bernama $color yg berisi "red"
echo "My car is " . $color . "<br>";    // menampilkan "my car is red"
echo "My house is " . $COLOR . "<br>";  // yg tampil hanya "my house is" dan outputnya "undefined variable"
echo "My boat is " . $coLOR . "<br>";   // yg muncul "my boat is"
                                        // variabel di php bersifat case-sensitive maka variabel dianggap berbeda
?> 

</body>
</html>
