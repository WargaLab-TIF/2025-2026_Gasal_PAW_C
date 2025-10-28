<?php
function validateNama(&$errors, $field_list, $field_name) {
    $pattern = "/^[a-zA-Z ]+$/";
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === '') {
        $errors[$field_name] = 'Nama wajib diisi';
    } else if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'Nama hanya boleh huruf dan spasi';
    }
}

function validateNIM(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === '') {
        $errors[$field_name] = 'NIM wajib diisi';
    } else if (!is_numeric($field_list[$field_name])) {
        $errors[$field_name] = 'NIM harus angka';
    }
}

function validateEmail(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === '') {
        $errors[$field_name] = 'Email wajib diisi';
    } else if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'Email tidak valid';
    }
}

function validateJurusan(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || $field_list[$field_name] === '') {
        $errors[$field_name] = 'Jurusan wajib dipilih';
    }
}
?>
