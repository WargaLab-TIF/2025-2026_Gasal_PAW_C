<?php
function validateName(&$errors, $field_list, $field_name){
    $pattern = "/^[a-zA-Z'-]+$/"; // format surname (alfabet)

    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])){
        $errors[$field_name] = "Field $field_name harus diisi";
    }
    else if (!preg_match($pattern, $field_list[$field_name])){
        $errors[$field_name] = "Field $field_name hanya boleh berisi huruf";
    }
}
function validateEmail(&$errors, $field_list, $field_name){
    $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/"; // format email

    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])){
        $errors[$field_name] = "Field $field_name harus diisi";
    }
    else if (!preg_match($pattern, $field_list[$field_name])){
        $errors[$field_name] = "Field $field_name harus berisi alamat email yang valid";
    }
}
function validatePassword(&$errors, $field_list, $field_name){
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])){
        $errors[$field_name] = "Field $field_name harus diisi";
    }
    else if (strlen($field_list[$field_name]) < 6){
        $errors[$field_name] = "Field $field_name harus memiliki panjang minimal 6 karakter";
    }
}
?>