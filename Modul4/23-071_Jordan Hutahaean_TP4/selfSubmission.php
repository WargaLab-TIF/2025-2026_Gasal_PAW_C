<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['surname'])) {
        $errors['surname'] = "Field is missing";
    } else {
        $pattern = "/^[a-zA-Z'-]+$/";
        if (!preg_match($pattern, $_POST['surname'])) {
            $errors['surname'] = "Invalid format, only letters allowed";
        }
    }

    if (empty($errors)) {
        echo "Form submitted successfully with no errors!";
    } else {
        require 'form.inc.php';  
        echo $errors['surname']; 
    }
} else {
    require 'form.inc.php';  
}
?>

</body>
</html>
