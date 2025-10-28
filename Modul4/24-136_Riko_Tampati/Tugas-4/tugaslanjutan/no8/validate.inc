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
    } else {
        $email = trim($field_list[$field_name]);
        $pattern = "/^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i"; // regex email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match($pattern, $email)) {
            $errors[$field_name] = 'Format email tidak valid';
        }
    }
}

function validatePassword(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === '') {
        $errors[$field_name] = 'Password wajib diisi';
    } else if (strlen(trim($field_list[$field_name])) < 6) {
        $errors[$field_name] = 'Password minimal 6 karakter';
    }
}

function validateJurusan(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || $field_list[$field_name] === '') {
        $errors[$field_name] = 'Jurusan wajib dipilih';
    }
}
?>
