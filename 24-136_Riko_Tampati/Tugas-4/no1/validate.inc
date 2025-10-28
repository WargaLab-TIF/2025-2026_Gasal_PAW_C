<?php
function validateName($field_list, $field_name)
{
    // Cek apakah field dengan nama tersebut ada di data input (misal $_POST)
    if (!isset($field_list[$field_name]))
        return false;

    // Pola regex untuk huruf alfabet, tanda petik tunggal, dan tanda hubung
    $pattern = "/^[a-zA-Z'-]+$/"; // format nama (alfabet)

    // Cek apakah input sesuai pola
    if (!preg_match($pattern, $field_list[$field_name]))
        return false;

    // Jika semua kondisi lolos, kembalikan true
    return true;
}
?>
