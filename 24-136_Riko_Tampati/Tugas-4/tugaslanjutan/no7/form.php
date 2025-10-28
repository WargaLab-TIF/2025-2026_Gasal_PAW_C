<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Input Mahasiswa</title>
</head>
<body>

<h2>Form Input Data Mahasiswa</h2>

<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'validate.inc';

    validateNama($errors, $_POST, 'nama');
    validateNIM($errors, $_POST, 'nim');
    validateEmail($errors, $_POST, 'email');
    validateJurusan($errors, $_POST, 'jurusan');

    if ($errors) {
        echo '<h3>Terdapat kesalahan pada form:</h3>';
        echo '<ul>';
        foreach ($errors as $field => $error) {
            echo "<li><strong>$field:</strong> $error</li>";
        }
        echo '</ul>';

        include 'form.inc';
    } else {
        echo '<h3>Data mahasiswa berhasil disubmit!</h3>';
        echo '<p>Nama: ' . htmlspecialchars($_POST['nama']) . '</p>';
        echo '<p>NIM: ' . htmlspecialchars($_POST['nim']) . '</p>';
        echo '<p>Email: ' . htmlspecialchars($_POST['email']) . '</p>';
        echo '<p>Jurusan: ' . htmlspecialchars($_POST['jurusan']) . '</p>';
    }
} else {
    include 'form.inc';
}
?>

</body>
</html>
