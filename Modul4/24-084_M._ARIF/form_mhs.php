<?php
require 'validate.inc';

$errors = array();

if (isset($_POST['nama'])) {

    validateName($errors, $_POST, 'nama');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');

    if ($errors) {
        echo "<h2>Terjadi Kesalahan!</h2><ul>";
        foreach ($errors as $field => $error) {
            if ($error == 'required') echo "<li><b>$field</b> wajib diisi!</li>";
            elseif ($error == 'invalid') echo "<li><b>$field</b> format tidak valid!</li>";
            elseif ($error == 'too_short') echo "<li><b>$field</b> minimal 8 karakter!</li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>Data Mahasiswa Tersimpan</h2>";
        echo "<table border='1' cellpadding='8'>";
        foreach ($_POST as $key => $value) {
            echo "<tr><td><b>" . htmlspecialchars($key) . "</b></td><td>" . htmlspecialchars($value) . "</td></tr>";
        }
        echo "</table>";
    }
}
?>

<form method="POST" action="">
    <h2>Form Input Data Mahasiswa</h2>
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '' ?>"><br><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" value="<?= isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>"><br><br>

    <label>Alamat:</label><br>
    <textarea name="alamat"><?= isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : '' ?></textarea><br><br>

    <input type="submit" value="Kirim">
</form>
