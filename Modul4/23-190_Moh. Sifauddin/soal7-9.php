<?php 
$errors = array();

if (isset($_POST['surname']) || isset($_POST['email']) || isset($_POST['password'])) 
{
    require 'validate.inc.php';

    // Jalankan semua validasi
    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');

    if ($errors)
    {
        echo '<h1>Invalid, correct the following errors:</h1>';
        foreach ($errors as $field => $error) {
            echo "<b>$field</b>: $error<br>";
        }
        echo "<hr>";
        include 'form.inc'; // tampilkan kembali form dengan data lama
    }
    else
    {
        echo '<h1>Form submitted successfully with no errors</h1>';
        echo "<b>Data yang dikirim:</b><br>";
        echo "Surname: " . htmlspecialchars($_POST['surname']) . "<br>";
        echo "Email: " . htmlspecialchars($_POST['email']) . "<br>";
        echo "Password: " . htmlspecialchars($_POST['password']) . "<br>";
    }
}
else
{
    include 'form.inc'; // tampilkan form awal
}
?>
