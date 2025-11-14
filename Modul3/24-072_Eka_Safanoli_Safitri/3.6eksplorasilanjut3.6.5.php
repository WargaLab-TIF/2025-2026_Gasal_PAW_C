<?php
$numbers = array(1, 2, 3, 4, 5, 6);
$even = array_filter($numbers, function($n){
    return $n % 2 == 0; // hanya ambil genap
});

print_r($even);
?>