<?php
require 'validate1.inc'; // panggil fungsi validasi
$errors = array();
validateName($errors, $_POST, 'surname');
if ($errors)
{
    echo 'Errors : <br/>';
    foreach ($errors as $field => $error)
        echo "$field $error</br>";
}
else
    echo 'Data OK!';
?>
