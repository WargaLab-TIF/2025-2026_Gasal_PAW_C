<?php
$errors = array();
if (isset($_POST['surname'])) {
require 'validate.php';
validateName($errors, $_POST, 'surname');
validateEmail($errors, $_POST, 'email');
validatePassword($errors, $_POST, 'password');

if ($errors) {
        echo '<h1>Invalid, correct the following errors:</h1>';
        foreach ($errors as $field => $error) {
                echo "$field $error<br/>";
}
        include 'form_form.php';
        } else {
                echo 'Form submitted successfully with no errors';
        }
} 
else {
        include 'form_form.php';
}
?>