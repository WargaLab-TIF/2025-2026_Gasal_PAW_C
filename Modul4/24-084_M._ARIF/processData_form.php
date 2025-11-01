<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Data Form</title>
</head>
<body>
<?php
require 'validate.inc';
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validasi field
    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');
    validateAddress($errors, $_POST, 'address');
    validateState($errors, $_POST, 'state');
    validateGender($errors, $_POST, 'gender');
    validateAge($errors, $_POST, 'age');
    validateDateOfBirth($errors, $_POST, 'date_of_birth');

    if ($errors) {
        echo "<h2>Terjadi Kesalahan!</h2><ul>";
        foreach ($errors as $field => $error) {
            if ($error == 'required') echo "<li><b>$field</b> wajib diisi!</li>";
            elseif ($error == 'invalid') echo "<li><b>$field</b> format tidak valid!</li>";
            elseif ($error == 'too_short') echo "<li><b>$field</b> minimal 8 karakter!</li>";
            elseif ($error == 'not_number') echo "<li><b>$field</b> harus berupa angka!</li>";
            elseif ($error == 'invalid_date') echo "<li><b>$field</b> bukan tanggal valid!</li>";
            elseif ($error == 'invalid_format') echo "<li><b>$field</b> format tanggal salah (harus YYYY-MM-DD)!</li>";
        }
        echo "</ul>";
        include 'form.inc'; // di sini PHP dalam form.inc akan dijalankan
    } else {
        echo "<h2 style='color: green;'>Data OK!</h2>";
        echo "<table border='1' cellpadding='8'>";
        foreach ($_POST as $key => $value) {
            echo "<tr><td><b>" . htmlspecialchars($key) . "</b></td><td>" . htmlspecialchars($value) . "</td></tr>";
        }
        echo "</table>";
    }

} else {
    include 'form.inc'; // pertama kali tampil
}
?>
</body>
</html>