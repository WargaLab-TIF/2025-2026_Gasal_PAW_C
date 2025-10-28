<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Validasi Server-side</title>
</head>
<body>

<h2>Form Pendaftaran</h2>

<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'validate.inc';

    // Jalankan semua validasi
    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'passwd'); // perbaiki typo
    validateAddress($errors, $_POST, 'address');
    validateState($errors, $_POST, 'state');
    validateGender($errors, $_POST, 'gender');

    if ($errors) {
        echo '<h3>Data yang anda masukan salah:</h3>';
        echo '<ul>';
        foreach ($errors as $field => $error) {
            echo "<li><strong>$field:</strong> $error</li>";
        }
        echo '</ul>';

        include 'form.inc';
    } else {
        echo '<h1>Form submitted successfully with no errors</h1>';
    }
} else {
    include 'form.inc';
}
?>




</body>
</html>
