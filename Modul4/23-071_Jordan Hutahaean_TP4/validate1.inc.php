<?php
function validateName($field_list, $field_name, &$errors) {
    if (!isset($field_list[$field_name])) {
        $errors[$field_name] = 'Field is missing';
        return false;
    }

    $pattern = "/^[a-zA-Z'-]+$/";
    if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'Invalid format, only letters allowed';
        return false;
    }

    return true;
}
?>
