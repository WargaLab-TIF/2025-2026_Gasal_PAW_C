<?php
$arr1 = ["apel", "jeruk"];
$arr2 = ["pisang", "mangga", "melon"];

// array_push
array_push($arr1, "pepaya");
print_r($arr1);
echo "<br>";

// array_merge
$merged = array_merge($arr1, $arr2);
print_r($merged);
echo "<br>";

// array_values
$vals = array_values($merged);
print_r($vals);
echo "<br>";

// array_search
echo "Index 'mangga': " . array_search("mangga", $merged) . "<br>";

// array_filter
$filtered = array_filter($merged, function($item){
    return strlen($item) > 5;
});
print_r($filtered);
echo "<br>";

// sorting
sort($merged);
echo "Setelah sort:<br>";
print_r($merged);
?>
