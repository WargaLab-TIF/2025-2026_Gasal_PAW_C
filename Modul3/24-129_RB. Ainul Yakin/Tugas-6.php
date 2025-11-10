<?php
// 3.6.1 array_push()
$fruits = ["Apple", "Banana"]; 
array_push($fruits, "Cherry", "Durian");
echo $fruits[0] . ", " . $fruits[1] . ", " . $fruits[2] . ", and " . $fruits[3] . ".<br>";

// 3.6.2 array_merge()
$colors = array_merge(["Red", "Green"], ["Blue", "Yellow"]);
echo $colors[0] . ", " . $colors[1] . ", " . $colors[2] . ", and " . $colors[3] . ".<br>";

// 3.6.3 array_values()
$values = array_values(["a" => "Red", "b" => "Green", "c" => "Blue"]);
echo $values[0] . ", " . $values[1] . ", and " . $values[2] . ".<br>";

// 3.6.4 array_search()
$index = array_search("Barry", ["Andy", "Barry", "Charlie"]);
echo "Index of Barry is: " . $index . ".<br>";

// 3.6.5 array_filter()
$filtered = array_filter([10, 25, 30, 5, 40], fn($n) => $n > 20);
echo "Filtered values greater than 20: " . implode(", ", $filtered) . ".<br>";

// 3.6.6 Sorting functions
$nums = [5, 2, 8, 1]; sort($nums); rsort($nums); $ages = ["Andy" => 30, "Barry" => 25, "Charlie" => 35]; asort($ages); arsort($ages); ksort($ages); krsort($ages);
echo "Sorted numbers: " . implode(", ", $nums) . ".<br>";
echo "Ages sorted by value ascending: " . implode(", ", $ages) . ".<br>";

?>