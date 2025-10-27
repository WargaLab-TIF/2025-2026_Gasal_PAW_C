<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menghapus spasi di awal dan akhir input menggunakan trim
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $age = trim($_POST['age']);
    
    // Mengubah input name menjadi lowercase menggunakan strtolower
    $name = strtolower($name);

    // Validasi name menggunakan preg_match
    if (empty($name) || !preg_match("/^[a-zA-Z'-]+$/", $name)) {
        $errors['name'] = "Invalid name format";
    }

    // Validasi email menggunakan filter_var
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    // Validasi angka menggunakan is_numeric
    if (!is_numeric($age)) {
        $errors['age'] = "Age must be a number";
    }

    // Validasi tanggal menggunakan checkdate
    $month = trim($_POST['month']);
    $day = trim($_POST['day']);
    $year = trim($_POST['year']);
    
    if (!checkdate($month, $day, $year)) {
        $errors['date'] = "Invalid date";
    }

    // Jika tidak ada error, proses data
    if (empty($errors)) {
        // Mengubah name menjadi uppercase untuk tujuan demonstrasi
        $name = strtoupper($name);
        echo "Form submitted successfully!<br>";
        echo "Name: " . $name . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Age: " . $age . "<br>";
        echo "Date of Birth: " . $day . "/" . $month . "/" . $year . "<br>";
    } else {
        // Tampilkan error
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>

<form method="POST">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Age: <input type="text" name="age"><br>
    Date of Birth:<br>
    Month: <input type="text" name="month"><br>
    Day: <input type="text" name="day"><br>
    Year: <input type="text" name="year"><br>
    <input type="submit" value="Submit">
</form>
