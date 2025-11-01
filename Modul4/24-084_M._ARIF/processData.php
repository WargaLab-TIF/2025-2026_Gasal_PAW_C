<?php
echo "<h2>Hasil Isian Form</h2>";
// Cek apakah form dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'validate.inc';    // Tambahkan file validasi
    $errors = array();  // Siapkan array untuk menampung error
    validateName($errors, $_POST, 'surname');   // Lakukan validasi pada field 'surname'
    validateEmail($errors, $_POST, 'email');     // Lakukan validasi pada field 'email'
    validatePassword($errors, $_POST, 'password'); // Lakukan validasi pada field 'password'
    validateAddress($errors, $_POST, 'address');   // Lakukan validasi pada field 'address'
    validateState($errors, $_POST, 'state');       // Lakukan validasi pada field 'state'
    validateGender($errors, $_POST, 'gender');     // Lakukan validasi pada field 'gender'
    validateAge($errors, $_POST, 'age');           // Lakukan validasi pada field 'age'
    validateDateOfBirth($errors, $_POST, 'date_of_birth'); // Lakukan validasi pada field 'date_of_birth'

    // Jika ada error, tampilkan pesan error
    if ($errors) {
        echo "<h3>Terjadi kesalahan:</h3>";
        echo "<ul>";
        foreach ($errors as $field => $error) {
            if ($error == 'required') {
                echo "<li><b>$field</b> harus diisi!</li>";
            } else if ($error == 'invalid') {
                echo "<li><b>$field</b> hanya boleh berisi huruf!</li>";
            }
        }
        echo "</ul>";
    } 
    // Jika tidak ada error, tampilkan hasil data form
    else {
        echo "<table border='1' cellpadding='8'>";
        foreach ($_POST as $key => $value) {
            echo "<tr>";
            echo "<td><b>" . htmlspecialchars($key) . "</b></td>";
            echo "<td>" . htmlspecialchars($value) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<p style='color:green;'><b>Data OK!</b></p>";
    }
} 
else {
    echo "Tidak ada data yang dikirimkan!";
}
?>
