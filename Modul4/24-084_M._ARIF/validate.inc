<?php
// Validasi nama (hanya alfabet, tanda petik, dan tanda hubung)
function validateName(&$errors, $field_list, $field_name){
    $pattern = "/^[a-zA-Z'-]+$/"; // format surname (alfabet)
    if (!isset($field_list[$field_name]) ||
        empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } else if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'invalid';
    }
}

// Validasi email
function validateEmail(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } 
    else if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'invalid';
    }
}

// Validasi password (minimal 8 karakter)
function validatePassword(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } 
    else if (strlen($field_list[$field_name]) < 8) {
        $errors[$field_name] = 'too_short';
    }
}

// Validasi address
function validateAddress(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'required';
    }
}

// Validasi state
function validateState(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || $field_list[$field_name] == "-1") {
        $errors[$field_name] = 'required';
    }
}

// Validasi gender
function validateGender(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    }
}

// Validasi umur (contoh: harus angka)
function validateAge(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } 
    else if (!is_numeric($field_list[$field_name])) {
        $errors[$field_name] = 'not_number';
    }
}

// Validasi tanggal lahir (contoh: format yyyy-mm-dd)
function validateDateOfBirth(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } 
    else {
        $parts = explode('-', $field_list[$field_name]);
        if (count($parts) == 3) {
            list($year, $month, $day) = $parts;
            if (!checkdate((int)$month, (int)$day, (int)$year)) {
                $errors[$field_name] = 'invalid_date';
            }
        } else {
            $errors[$field_name] = 'invalid_format';
        }
    }
}
?>