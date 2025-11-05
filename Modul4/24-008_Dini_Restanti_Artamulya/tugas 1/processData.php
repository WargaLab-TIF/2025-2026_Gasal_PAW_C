<?php
require 'validate.php';

$errors = array();

// Jalankan validasi
validateName($errors, $_POST, 'surname');

if ($errors) {
    echo 'Errors:<br/>';
    foreach($errors as $field => $error)
        echo "$field : $error<br/>";
} else {
    echo 'Data OK!';
}
?>
