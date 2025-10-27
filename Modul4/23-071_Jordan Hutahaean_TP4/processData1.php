<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" >
    <input type="text" name="surname" />
    <input type="submit" value="Submit" />
</form>

<?php
require 'validate1.inc.php';
$errors = [];

if (validateName($_POST, 'surname', $errors)) {
    echo 'Data OK!';
} else {
    echo $errors['surname']; 
}
?>
</body>
</html>
