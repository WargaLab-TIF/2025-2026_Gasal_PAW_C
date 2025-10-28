<?php
// Menyertakan file fungsi validasi
require 'validate.inc';

// Mengecek apakah input surname valid
if (validateName($_POST, 'surname')) {
    echo "Data OK!";
} else {
    echo "Data invalid!";
}
?>
